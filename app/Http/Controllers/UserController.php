<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class UserController extends Controller
{
    
    public function register(Request $request){
        
        $redirectionUrl = $request->input()['redirectionUrl'];
        $data = $request->input();
        $validated = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'birthday' => 'required|max:255',
            'birthplace' => 'required|max:255',
            'nationality' => 'required|max:255',
            'adress' => 'required|max:255',
            'profession' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|max:255|same:confirmPassword|min:8'
        ]);

        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'birthday' => $data['birthday'],
            'birthplace' => $data['birthplace'],
            'nationality' => $data['nationality'],
            'adress' => $data['adress'],
            'profession' => $data['profession'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);



        if($user){
            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials)){
                if($redirectionUrl)
                    return redirect($redirectionUrl);
                return redirect('');
            }

            
        }

    }

    public function login(Request $request){
        $redirectionUrl = $request->input()['redirectionUrl'];
        $validated = $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);
        $user = User::where('email',$request->input()['email'])->first();
        
    
        if($user){
            if(Hash::check($request->input()['password'],$user->password))
            {
                Auth::login($user);
                if($redirectionUrl)
                    return redirect($redirectionUrl);
                if(Auth::user()->role == "secretary")
                    return redirect()->route('secretary.dashboard');
            }
        }
        return redirect()->route('login')->withDanger('Identifiants incorrectes');
    }

    
}
