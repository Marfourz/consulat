<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitizenDashboardController extends Controller
{
    public function index(){
        return view('citizen.index');
    }
}
