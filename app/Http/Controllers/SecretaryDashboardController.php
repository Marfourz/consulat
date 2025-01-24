<?php

namespace App\Http\Controllers;

use Storage;


use Illuminate\Http\Request;
use App\Models\CarteConsulaire;
use App\Models\Visa;
use App\Models\LaissezPasser;
use Arr;

class SecretaryDashboardController extends Controller
{


    

    
    public function index(){

        $menu = "dashboard";
       
        $totalVisa = Visa::count();
        $totalLaissezPasser = LaissezPasser::count();
        $totalCarteConsulaire = CarteConsulaire::count();
        $visas = Visa::get();
        $cartesConsulaires = CarteConsulaire::get();
        $laissezPassers = LaissezPasser::get();


        $demandes = Arr::collapse([$visas,$laissezPassers,$cartesConsulaires]);
        $demandes = Arr::sort($demandes,function($value){
            return $value['created_at'];
        });
        
       
        
        return view('secretary.index',compact('totalVisa','totalLaissezPasser','totalCarteConsulaire','demandes', 'menu'));
    }


    public function carteConsulaire(){
       

        $menu = "carteConsulaire";
        $demandes = CarteConsulaire::with('user')->paginate(1);

        
        return view('secretary.carteConsulaire.index',compact('demandes', 'menu'));
    }


    public function visa(){
       

        $menu = 'visa';
        $demandes = Visa::with('user')->paginate(1);

        
        return view('secretary.visa.index',compact('demandes', 'menu'));
    }

    public function laissezPasser(){
       
        $menu = 'laissezPasser';
        $demandes = LaissezPasser::with('user')->paginate(1);
        return view('secretary.laissezPasser.index',compact('demandes', 'menu'));
    }

  
}
