<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visa;
use App\Models\GlobalInfo;
use App\Models\TraitementVisa;
use App\Models\User;
use App\Models\Price;
use Arr;
use Auth;
use PDF;
use Str;
use File;

class VisaController extends Controller
{
    
    public function createStep1(Request $request){
    
        if($request->session()->has('step1Data'))
            return view('citizen.visa.step1',[
                "data" => $request->session()->get('step1Data')
            ]);
        return view('citizen.visa.step1'); 
    }

    public function storeStep1(Request $request){
        
        $request->session()->put('step1Data',$request->input());
        $data = $request->input();
        return redirect()->route('visa.createStep2');
    }

    public function createStep2(Request $request){
        if($request->session()->has('step2Data'))
            return view('citizen.visa.step2',[
                "data" => $request->session()->get('step2Data')
            ]);
        return view('citizen.visa.step2'); 
    }

    public function storeStep2(Request $request){
        
        $request->session()->put('step2Data',$request->input());
        return redirect()->route('visa.createStep3');
    }

    public function createStep3(){
        return view('citizen.visa.step3'); 
    }

    public function storeStep3(Request $request){

        $user_id = Auth::user()->id;
        $files = [];

        $files['path_plane_ticket'] = $request->file('plane_ticket')->storeAs(
            'visas/planes_tickets',Str::random() .'-' . $user_id . '-billet-avion.' . $request->file('plane_ticket')->extension()
        );

        $files['path_passport'] = $request->file('passport')->storeAs(
            'visas/passports',Str::random() . '-' . $user_id . '-passeport.' . $request->file('passport')->extension()
        );

        $files['path_letter_invatation_or_hotel_reservation'] = $request->file('letter_invatation_or_hotel_reservation')->storeAs(
            'visas/invitations-letters',Str::random() . '-' . $user_id . '-lettre-invitation.' . $request->file('letter_invatation_or_hotel_reservation')->extension()
        );

        $files['path_picture'] = $request->file('picture')->storeAs(
            'visas/pictures',Str::random() . '-' . $user_id . '-photo.' . $request->file('picture')->extension()
        );
      
        $request->session()->put('step3Data',$files);

        return redirect()->route('visa.payment');
       
    }

    public function store(Request $request,$transactionId){
        if(!$request->session()->get('step1Data') || !$request->session()->get('step2Data') || !$request->session()->get('step3Data'))
            return redirect()->route('visa.createStep1');
        $data = Arr::collapse([$request->session()->get('step1Data'),$request->session()->get('step2Data'),$request->session()->get('step3Data')]);
        $data = Arr::except($data,['_token']);
        $data['transactionId'] = $transactionId;
        $data['user_id'] = Auth::user()->id;

        $visa = Visa::create($data);

        $visa->save();

        $request->session()->pull('step1Data');
        $request->session()->pull('step2Data');
        $request->session()->pull('step3Data');
        
        return redirect('/citizen/dashboard')->withSuccess("Demande de visa prise en compte avec succès, nous vous reviendrons dans quelques jours");
    }

    public function payment(){
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $amount = Price::where('nationality_id', $user->nationality_id)
                  ->where('document_type', 'carteConsulaire')
                  ->first();
        if(!$amount){
            $amount = GlobalInfo::first()->price_visa;
        }
        else
            $amount = $amount->price;
        $redirectionUrl = "/citizen/visa/request/store/";
        return view('citizen.payment',compact('amount','redirectionUrl'));
        
    }

    public function show($demandeId){
        $demande = Visa::where('id',$demandeId)->first();

        $menu = "visa";
        return view('secretary.visa.detail',compact('demande', 'menu'));
    }

    public function showForCitizen($demandeId){
        $demande = Visa::where('id',$demandeId)->first();
        return view('citizen.visa.show',compact('demande'));
    }

    public function showRequestReject($demandeId){
        $demande = Visa::where('id',$demandeId)->first();
        return view('secretary.detailVisaError',compact('demande'));
    }

    public function preview($demandeId){
        $demande = Visa::where('id',$demandeId)->first();
        return view('secretary.visa.preview',compact('demande'));
    }

    public function download($demandeId){
        $demande = Visa::where('id',$demandeId)->first();
        
        $pdf = PDF::loadView('secretary.visa.template', compact('demande'));
        return $pdf->download("visa.pdf");
    }

    public function reject(Request $request){
        $traitement = new TraitementVisa();
        $traitement->status = "reject";
        $traitement->comment = $request->input()['comment'];
        $traitement->user_id = Auth::user()->id;
        $traitement->visa_id = $request->input()['demandeId'];
        $traitement->save();
        return redirect()->route("visa.show",$request->input()['demandeId'])->withDanger('Demande rejetée avec succès'); 
    }

    public function generate(Request $request){
        
        $directory =  'visas' . DIRECTORY_SEPARATOR . 'documents';
        $saveDirectory = 'app' . DIRECTORY_SEPARATOR  . $directory;

        if(!File::isDirectory(storage_path($saveDirectory)))
            File::makeDirectory(storage_path($saveDirectory), 0777, true, true);

        $data = $request->input();
        $demande = Visa::where('id',$data['demandeId'])->first();
        $customPaper = array(0,0,200,160);
        $pdf = PDF::loadView('secretary.visa.template', compact('demande','data'))->setPaper($customPaper,'landscape');
        
        $path = $directory .  DIRECTORY_SEPARATOR .  $demande->user->id ."-visas.pdf";
        $savePath = storage_path($saveDirectory . DIRECTORY_SEPARATOR. $demande->user->id ."-visas.pdf");

        // Sauvegarder le PDF
        $pdf->save($savePath);
        
        $traitement = new TraitementVisa();
        $traitement->status = "accept";
        $traitement->document = $path;
        $traitement->expiry_at = $data['expiry_at'];
        $traitement->entry_at = $data['entry_at'];
        $traitement->user_id = Auth::user()->id;
        $traitement->visa_id = $demande->id;
        $traitement->save();
        return redirect()->route("visa.show",$demande->id)->withSucces('Document généré avev succès');
    }
}
