<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalInfo;
use App\Models\TraitementCarteConsulaire;
use App\Models\CarteConsulaire;
use Arr;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Str;
use File;
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
            'carteConsulaires/attestation_residence',Str::random() . '-attestation-residence.' . $request->file('attestation_residence')->extension()
        );

        $files['path_picture'] = $request->file('picture')->storeAs(
            'carteConsulaires/pictures',Str::random() . '-photo.' . $request->file('picture')->extension()
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
        
        return redirect()->route('citizen.dashboard')->withSuccess("Demande de carte consulaire prise en compte avec succès, nous vous reviendrons dans quelques jours");
    }


    public function show($demandeId){
        $demande = CarteConsulaire::where('id',$demandeId)->first();
        return view('secretary.detail',compact('demande'));
    }

    public function showForCitizen($demandeId){
        $demande = CarteConsulaire::where('id',$demandeId)->first();
        return view('citizen.carteConsulaire.show',compact('demande'));
    }

    public function showRequestReject($demandeId){
        $demande = CarteConsulaire::where('id',$demandeId)->first();
        return view('secretary.carteConsulaire.reject',compact('demande'));
    }

    public function preview($demandeId){
        $demande = CarteConsulaire::where('id',$demandeId)->first();
        return view('secretary.carteConsulaire.preview',compact('demande'));
    }

    public function download($demandeId){
        $demande = CarteConsulaire::where('id',$demandeId)->first();
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('secretary.carteConsulaire.template', compact('demande'))->setWarnings(false);
        return $pdf->download("visa.pdf");
    }

    public function reject(Request $request){
       
        $traitement = new TraitementCarteConsulaire();
        $traitement->status = "reject";
        $traitement->comment = $request->input()['comment'];
        $traitement->user_id = Auth::user()->id;
        $traitement->carte_consulaire_id = $request->input()['demandeId'];
        $traitement->save();
        return redirect()->route("carteConsulaire.show",$request->input()['demandeId'])->withDanger('Demande rejetée avec succès'); 
    }

    public function generate(Request $request){
        $directory = 'storage/carteConsulaire/documents';
       if(!File::isDirectory($directory))
            File::makeDirectory($directory, 0777, true, true);
        $data = $request->input();
        $demande = CarteConsulaire::where('id',$data['demandeId'])->first();

        Pdf::setOption(['defaultFont' => 'sans-serif']);
        $customPaper = array(0,0,260,450);
        $pdf = PDF::loadView('secretary.carteConsulaire.template', compact('demande','data'))->setWarnings(false)->setPaper($customPaper, 'landscape');

        //$pdf = PDF::loadView('secretary.carteConsulaire.template', compact('demande','data'));
        $path = $directory . $demande->user->id ."-carteConsulaire.pdf";
        $pdf->save(public_path($path));
        $traitement = new TraitementCarteConsulaire();
        $traitement->status = "accept";
        $traitement->document = $path;
        $traitement->start_at = $data['start_at'];
        $traitement->user_id = Auth::user()->id;
        $traitement->carte_consulaire_id = $demande->id;
        $traitement->save();
        return redirect()->route("carteConsulaire.show",$demande->id)->withSucces('Document généré avev succès');
    }
}
