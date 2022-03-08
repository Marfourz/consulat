<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.template-kit.homepage.index');
});

Route::get('/citizen/dashboard', [App\Http\Controllers\CitizenDashboardController::class,'index'])->name('citizen.dashboard');


Route::get('/register/{uri?}',function($uri=null){
    return view('citizen.register',['uri'=>$uri]);
})->name('register')->where('uri', '.*');


Route::post('/register',[App\Http\Controllers\UserController::class, 'register'])->name('users.store');

Route::get('/login/{uri?}',function($uri=null){
    return view('citizen.login',['uri'=>$uri]);
})->name('login')->where('uri', '.*');

Route::post('/login',[App\Http\Controllers\UserController::class, 'login'])->name('verifyLogin');

Route::get('/citizen',function(){
    return view('citizen.index');
});

Route::get('/citizen/visa/request',function(){
    return view('citizen.visa.create');
});

Route::get('visa/payment', [App\Http\Controllers\VisaController::class, 'payment'])->name('visa.payment');

Route::get('/citizen/visa/request/step1',[App\Http\Controllers\VisaController::class, 'createStep1'])->name('visa.createStep1');


Route::middleware(['isAuthenticate'])->group(function(){
    Route::get('/citizen/visa/request/step1',[App\Http\Controllers\VisaController::class, 'createStep1'])->name('visa.createStep1');
    Route::post('/citizen/visa/request/step1',[App\Http\Controllers\VisaController::class, 'storeStep1'])->name('visa.storeStep1');


    Route::get('/citizen/visa/request/step2',[App\Http\Controllers\VisaController::class, 'createStep2'])->name('visa.createStep2');
    Route::post('/citizen/visa/request/step2',[App\Http\Controllers\VisaController::class, 'storeStep2'])->name('visa.storeStep2');

    Route::get('/citizen/visa/request/step3',[App\Http\Controllers\VisaController::class, 'createStep3'])->name('visa.createStep3');
    Route::post('/citizen/visa/request/step3',[App\Http\Controllers\VisaController::class, 'storeStep3'])->name('visa.storeStep3');

    Route::get('/citizen/visa/request/store/{transactionId}', [App\Http\Controllers\VisaController::class, 'store']);
});

Route::middleware(['isSecretary'])->group(function(){
    Route::get('/visa/{demandeId}/preview', [App\Http\Controllers\VisaController::class, 'preview'])->name('visa.preview');
    Route::get('/visa/{demandeId}/download', [App\Http\Controllers\VisaController::class, 'download'])->name('visa.download');
    Route::post('/visa/generate', [App\Http\Controllers\VisaController::class, 'generate'])->name('visa.generate');

    Route::get('/secretary/dashboard', [App\Http\Controllers\SecretaryDashboardController::class,'index'])->name('secretary.dashboard');
    Route::get('/visa/{demandeId}', [App\Http\Controllers\VisaController::class, 'show'])->name('visa.show');
    Route::get('/visa/{demandeId}/reject',[App\Http\Controllers\VisaController::class, 'showRequestReject'])->name('visa.showWithError');
    Route::post('/visa/reject', [App\Http\Controllers\VisaController::class, 'reject'])->name('visa.reject');


});







