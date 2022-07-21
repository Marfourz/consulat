<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalInfo;
use App\Models\TraitementCarteConsulaire;
use App\Models\CarteConsulaire;
use Arr;
use Auth;
use PDF;

class CarteConsulaireController extends Controller
{
    
    public function createStep1(Request $request){
    
        if($request->session()->has('step1Data'))
            return view('citizen.carteConsulaire.step1',[
                "data" => $request->session()->get('step1Data')
            ]);
        return view('citizen.carteConsulaire.step1'); 
    }

    public function storeStep1(Request $request){
        
        $request->session()->put('step1Data',$request->input());
        $data = $request->input();
        return redirect()->route('carteConsulaire.createStep2');
    }

    public function createStep2(Request $request){
        if($request->session()->has('step2Data'))
            return view('citizen.carteConsulaire.step2',[
                "data" => $request->session()->get('step2Data')
            ]);
        return view('citizen.carteConsulaire.step2'); 
    }

    public function storeStep2(Request $request){
        
        $request->session()->put('step2Data',$request->input());
        return redirect()->route('carteConsulaire.createStep3');
    }

    public function createStep3(){
        return view('citizen.carteConsulaire.step3'); 
    }

    public function storeStep3(Request $request){

        $user_id = Auth::user()->id;
        $files = [];
        
        $files['path_residence_attestation'] = $request->file('attestation_residence')->storeAs(
            'carteConsulaires/attestation_residence',$user_id . '-billet-avion'
        );

        $files['path_picture'] = $request->file('picture')->storeAs(
            'carteConsulaires/pictures',$user_id . '-photo.png'
        );

        $request->session()->put('step3Data',$files);

        return redirect()->route('carteConsulaire.payment');
       
    }

    
    public function payment(){
        $amount = GlobalInfo::first()->price_visa;
        $redirectionUrl = "/citizen/carte-consulaire/request/store/";
        return view('citizen.payment',compact('amount','redirectionUrl'));
        
    }

    public function store(Request $request,$transactionId){
        if(!$request->session()->get('step1Data') || !$request->session()->get('step2Data') || !$request->session()->get('step3Data'))
            return redirect()->route('visa.createStep1');
        $data = Arr::collapse([$request->session()->get('step1Data'),$request->session()->get('step2Data'),$request->session()->get('step3Data')]);
        $data = Arr::except($data,['_token']);
        
        $data['transactionId'] = $transactionId;
        $data['user_id'] = Auth::user()->id;

        $visa = CarteConsulaire::create($data);

        $visa->save();

        $request->session()->pull('step1Data');
        $request->session()->pull('step2Data');
        $request->session()->pull('step3Data');
        
        return redirect()->route('citizen')->withSuccess("Demande de carte consulaire prise en compte avec succès, nous vous reviendrons dans quelques jours");
    }


    public function show($demandeId){
        $demande = CarteConsulaire::where('id',$demandeId)->first();
        return view('secretary.detailCarteConsulaire',compact('demande'));
    }

    public function showForCitizen($demandeId){
        $demande = CarteConsulaire::where('id',$demandeId)->first();
        return view('citizen.carteConsulaire.show',compact('demande'));
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
        $customPaper = array(0,0,200,160);
        $pdf = PDF::loadView('secretary.visa.template', compact('demande','data'))->setPaper($customPaper,'landscape');
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
