<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visa;
use App\Models\GlobalInfo;
use App\Models\TraitementVisa;
use Arr;
use Auth;
use PDF;

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
            'visas/planes_tickets',$user_id . ' - billet avion'
        );

        $files['path_passport'] = $request->file('passport')->storeAs(
            'visas/passports', $user_id . ' - passeport'
        );

        $files['path_letter_invatation_or_hotel_reservation'] = $request->file('letter_invatation_or_hotel_reservation')->storeAs(
            'visas/invitations-letters',$user_id . ' - lettre invitation'
        );

        $files['path_picture'] = $request->file('picture')->storeAs(
            'visas/pictures',$user_id . '-photo.png'
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
        
        return redirect('/citizen')->withSuccess("Demande de visa prise en compte avec succès, nous vous reviendrons dans quelques jours");
    }

    public function payment(){
        $amount = GlobalInfo::first()->price_visa;
        $redirectionUrl = "/citizen/visa/request/store/";
        return view('citizen.payment',compact('amount','redirectionUrl'));
        
    }

    public function show($demandeId){
        $demande = Visa::where('id',$demandeId)->first();
        return view('secretary.detailVisa',compact('demande'));
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
        $data = $request->input();
        $demande = Visa::where('id',$data['demandeId'])->first();
        $pdf = PDF::loadView('secretary.visa.template', compact('demande'));
        $path = "storage/visas/documents/" . $demande->user->id ."-visa.pdf";
        $pdf->save(public_path($path));
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
