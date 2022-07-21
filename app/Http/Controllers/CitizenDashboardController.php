<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Arr;
use App\Models\User;

class CitizenDashboardController extends Controller
{
    public function index(){
        
        $user = Auth::user();
        $demandes = Arr::collapse([$user->visas,$user->laissezPassers,$user->cartesConsulaires]);
        $demandes = Arr::sort($demandes,function($value){
            return $value['created_at'];
        });
        
        return view('citizen.index',compact(['demandes']));
    }

    public function eservice(){
        return view('citizen.eservice');
    }

    public function detail(){
        return view('citizen.detail');
    }

    
}
