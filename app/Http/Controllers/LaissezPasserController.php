<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalInfo;
use App\Models\TraitementLaissezPasser;
use App\Models\LaissezPasser;
use Arr;
use Auth;
use PDF;
use Str;
use File;
class LaissezPasserController extends Controller
{
    
    public function createStep1(Request $request){
    
        if($request->session()->has('step1Data'))
            return view('citizen.laissezPasser.step1',[
                "data" => $request->session()->get('step1Data')
            ]);
        return view('citizen.laissezPasser.step1'); 
    }

    public function storeStep1(Request $request){
        
        $request->session()->put('step1Data',$request->input());
        $data = $request->input();
        return redirect()->route('laissezPasser.createStep2');
    }

    public function createStep2(Request $request){
        if($request->session()->has('step2Data'))
            return view('citizen.laissezPasser.step2',[
                "data" => $request->session()->get('step2Data')
            ]);
        return view('citizen.laissezPasser.step2'); 
    }

    public function storeStep2(Request $request){
        
        $request->session()->put('step2Data',$request->input());
        return redirect()->route('laissezPasser.createStep3');
    }

    public function createStep3(){
        return view('citizen.laissezPasser.step3'); 
    }

    public function storeStep3(Request $request){

        $user_id = Auth::user()->id;
        $files = [];
         
        $files['path_plane_ticket'] = $request->file('plane_ticket')->storeAs(
            'laissezPassers/plane_ticket',Str::random() . '-billet-avion.' . $request->file('plane_ticket')->extension()
        );

        $files['path_passport_expiry'] = $request->file('passport_expiry')->storeAs(
            'laissezPassers/passport_expiry',Str::random() . '-passport.' . $request->file('passport_expiry')->extension()
        );

        $files['path_residence_attestation'] = $request->file('attestation_residence')->storeAs(
            'laissezPassers/residence_attestation',Str::random() . '-attestation-residence.' . $request->file('attestation_residence')->extension()
        );

        $files['path_picture'] = $request->file('picture')->storeAs(
            'laissezPassers/pictures',Str::random() . '-photo.' . $request->file('picture')->extension()
        );

        $request->session()->put('step3Data',$files);

        return redirect()->route('laissezPasser.payment');
       
    }

    
    public function payment(){
        $amount = GlobalInfo::first()->price_laissez_passer;
        $redirectionUrl = "/citizen/laissez-passer/request/store/";
        return view('citizen.payment',compact('amount','redirectionUrl'));
        
    }

    public function store(Request $request,$transactionId){
        if(!$request->session()->get('step1Data') || !$request->session()->get('step2Data') || !$request->session()->get('step3Data'))
            return redirect()->route('visa.createStep1');
        $data = Arr::collapse([$request->session()->get('step1Data'),$request->session()->get('step2Data'),$request->session()->get('step3Data')]);
        $data = Arr::except($data,['_token']);
        
        $data['transactionId'] = $transactionId;
        $data['user_id'] = Auth::user()->id;

        $laissezPasser = LaissezPasser::create($data);

        $laissezPasser->save();

        $request->session()->pull('step1Data');
        $request->session()->pull('step2Data');
        $request->session()->pull('step3Data');
        
        return redirect()->route('citizen.dashboard')->withSuccess("Demande de carte consulaire prise en compte avec succès, nous vous reviendrons dans quelques jours");
    }


    public function show($demandeId){
        $demande = LaissezPasser::where('id',$demandeId)->first();
        $menu = "carteConsulaire";
        return view('secretary.detail',compact('demande', 'menu'));
    }

    public function showForCitizen($demandeId){
        $demande = LaissezPasser::where('id',$demandeId)->first();
        return view('citizen.laissezPasser.show',compact('demande'));
    }

    public function showRequestReject($demandeId){
        $demande = LaissezPasser::where('id',$demandeId)->first();
        return view('secretary.laissezPasser.reject',compact('demande'));
    }

    public function preview($demandeId){
        $demande = LaissezPasser::where('id',$demandeId)->first();
        return view('secretary.laissezPasser.preview',compact('demande'));
    }

    public function download($demandeId){
        $demande = LaissezPasser::where('id',$demandeId)->first();
        
        $pdf = PDF::loadView('secretary.laissezPasser.template', compact('demande'));
        return $pdf->download("visa.pdf");
    }

    public function reject(Request $request){
       
        $traitement = new TraitementLaissezPasser();
        $traitement->status = "reject";
        $traitement->comment = $request->input()['comment'];
        $traitement->user_id = Auth::user()->id;
        $traitement->laissez_passer_id = $request->input()['demandeId'];
        $traitement->save();
        return redirect()->route("laissezPasser.show",$request->input()['demandeId'])->withDanger('Demande rejetée avec succès'); 
    }

    public function generate(Request $request){
       
        $directory =  'laissezPasser' . DIRECTORY_SEPARATOR . 'documents';
        $saveDirectory = 'app' . DIRECTORY_SEPARATOR  . $directory;

        if(!File::isDirectory(storage_path($saveDirectory)))
            File::makeDirectory(storage_path($saveDirectory), 0777, true, true);
        $data = $request->input();
        $demande = LaissezPasser::where('id',$data['demandeId'])->first();

        $demande->size = $data['size'];
        $demande->hair_color = $data['hair_color'];
        $demande->eye_color = $data['eye_color'];
        $demande->particular_sign = $data['particular_sign'];
        $demande->save();
        
        $pdf = PDF::loadView('secretary.laissezPasser.template', compact('demande','data'));

        $path = $directory .  DIRECTORY_SEPARATOR .  $demande->user->id ."-laissezPasser.pdf";
        $savePath = storage_path($saveDirectory . DIRECTORY_SEPARATOR. $demande->user->id ."-laissezPasser.pdf");

        set_time_limit(0);
        $pdf->save($savePath);
        $traitement = new TraitementLaissezPasser();
        $traitement->status = "accept";
        $traitement->document = $path;
        $traitement->reference = $data['reference'];
        $traitement->user_id = Auth::user()->id;
        $traitement->laissez_passer_id = $demande->id;
        $traitement->save();
        return redirect()->route("laissezPasser.show",$demande->id)->withSucces('Document généré avec succès');
    }
}
