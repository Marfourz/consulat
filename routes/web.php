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




// Route::get('/register/{uri?}',function($uri=null){
//     return view('citizen.register',['uri'=>$uri]);
// })->name('register')->where('uri', '.*');

Route::get('/register/{uri?}',[App\Http\Controllers\UserController::class, 'get_register_form'])->name('register')->where('uri', '.*');


Route::post('/register',[App\Http\Controllers\UserController::class, 'register'])->name('users.store');

Route::get('/login/{uri?}',function($uri=null){
    return view('citizen.login',['uri'=>$uri]);
})->name('login')->where('uri', '.*');

Route::post('/login',[App\Http\Controllers\UserController::class, 'login'])->name('verifyLogin');



Route::get('/',[App\Http\Controllers\CitizenDashboardController::class, 'eservice'])->name('eservice');
Route::get('/detail/{eserviceName}', [App\Http\Controllers\CitizenDashboardController::class,'detail'])->name('eservice.detail');


Route::get('/citizen/eservice',[App\Http\Controllers\CitizenDashboardController::class, 'eservice'])->name('eservice');

Route::get('/citizen/visa/request',function(){
    return view('citizen.visa.create');
});


Route::get('/file/{filePath}', function ($filePath) {

    // Construire le chemin complet vers le fichier dans le stockage public
    $path = 'app' . DIRECTORY_SEPARATOR . $filePath; 

    // Vérifier si le fichier existe
    if (Storage::disk('local')->exists($filePath)) {
        // Retourner le fichier pour l'affichage
        return response()->file(storage_path($path));
    }

    // Si le fichier n'existe pas, renvoyer une erreur 404
    return abort(404, 'File not found.');
})->where('filePath', '.*');


Route::middleware(['isAuthenticate'])->group(function(){
    Route::get('/citizen/dashboard', [App\Http\Controllers\CitizenDashboardController::class,'index'])->name('citizen.dashboard');


    Route::get('/citizen/visa/{demandeId}', [App\Http\Controllers\VisaController::class, 'showForCitizen'])->name('citizen.visa.show');
    Route::get('visa/payment', [App\Http\Controllers\VisaController::class, 'payment'])->name('visa.payment');
    Route::get('/citizen/visa/request/step1',[App\Http\Controllers\VisaController::class, 'createStep1'])->name('visa.createStep1');
    Route::post('/citizen/visa/request/step1',[App\Http\Controllers\VisaController::class, 'storeStep1'])->name('visa.storeStep1');
    Route::get('/citizen/visa/request/step2',[App\Http\Controllers\VisaController::class, 'createStep2'])->name('visa.createStep2');
    Route::post('/citizen/visa/request/step2',[App\Http\Controllers\VisaController::class, 'storeStep2'])->name('visa.storeStep2');
    Route::get('/citizen/visa/request/step3',[App\Http\Controllers\VisaController::class, 'createStep3'])->name('visa.createStep3');
    Route::post('/citizen/visa/request/step3',[App\Http\Controllers\VisaController::class, 'storeStep3'])->name('visa.storeStep3');
    Route::get('/citizen/visa/request/store/{transactionId}', [App\Http\Controllers\VisaController::class, 'store']);


    Route::get('/citizen/carteConsulaire/{demandeId}', [App\Http\Controllers\CarteConsulaireController::class, 'showForCitizen'])->name('citizen.carteConsulaire.show');
    Route::get('carte-consulaire/payment', [App\Http\Controllers\CarteConsulaireController::class, 'payment'])->name('carteConsulaire.payment');
    Route::get('/citizen/carte-consulaire/request/step1',[App\Http\Controllers\CarteConsulaireController::class, 'createStep1'])->name('carteConsulaire.createStep1');
    Route::post('/citizen/carte-consulaire/request/step1',[App\Http\Controllers\CarteConsulaireController::class, 'storeStep1'])->name('carteConsulaire.storeStep1');
    Route::get('/citizen/carte-consulaire/request/step2',[App\Http\Controllers\CarteConsulaireController::class, 'createStep2'])->name('carteConsulaire.createStep2');
    Route::post('/citizen/carte-consulaire/request/step2',[App\Http\Controllers\CarteConsulaireController::class, 'storeStep2'])->name('carteConsulaire.storeStep2');
    Route::get('/citizen/carte-consulaire/request/step3',[App\Http\Controllers\CarteConsulaireController::class, 'createStep3'])->name('carteConsulaire.createStep3');
    Route::post('/citizen/carte-consulaire/request/step3',[App\Http\Controllers\CarteConsulaireController::class, 'storeStep3'])->name('carteConsulaire.storeStep3');
    Route::get('/citizen/carte-consulaire/request/store/{transactionId}', [App\Http\Controllers\CarteConsulaireController::class, 'store']);


    Route::get('/citizen/laissezPassez/{demandeId}', [App\Http\Controllers\LaissezPasserController::class, 'showForCitizen'])->name('citizen.laissezPasser.show');
    Route::get('laissez-passser/payment', [App\Http\Controllers\LaissezPasserController::class, 'payment'])->name('laissezPasser.payment');
    Route::get('/citizen/laissez-passer/request/step1',[App\Http\Controllers\LaissezPasserController::class, 'createStep1'])->name('laissezPasser.createStep1');
    Route::post('/citizen/laissez-passer/request/step1',[App\Http\Controllers\LaissezPasserController::class, 'storeStep1'])->name('laissezPasser.storeStep1');
    Route::get('/citizen/laissez-passer/request/step2',[App\Http\Controllers\LaissezPasserController::class, 'createStep2'])->name('laissezPasser.createStep2');
    Route::post('/citizen/laissez-passer/request/step2',[App\Http\Controllers\LaissezPasserController::class, 'storeStep2'])->name('laissezPasser.storeStep2');
    Route::get('/citizen/laissez-passer/request/step3',[App\Http\Controllers\LaissezPasserController::class, 'createStep3'])->name('laissezPasser.createStep3');
    Route::post('/citizen/laissez-passer/request/step3',[App\Http\Controllers\LaissezPasserController::class, 'storeStep3'])->name('laissezPasser.storeStep3');
    Route::get('/citizen/laissez-passer/request/store/{transactionId}', [App\Http\Controllers\LaissezPasserController::class, 'store']);



    
});

Route::middleware(['isSecretary'])->group(function(){

   
    
    Route::get('/secretary/dashboard', [App\Http\Controllers\SecretaryDashboardController::class,'index'])->name('secretary.dashboard');
    Route::get('/secretary/dashboard/carteConsulaires', [App\Http\Controllers\SecretaryDashboardController::class,'carteConsulaire'])->name('secretary.dashboard.carteConsulaire');
    Route::get('/secretary/dashboard/visas', [App\Http\Controllers\SecretaryDashboardController::class,'visa'])->name('secretary.dashboard.visa');

    Route::get('/secretary/dashboard/laissezPassers', [App\Http\Controllers\SecretaryDashboardController::class,'laissezPasser'])->name('secretary.dashboard.laissezPasser');


    Route::get('/carteConsulaire/{demandeId}', [App\Http\Controllers\CarteConsulaireController::class, 'show'])->name('carteConsulaire.show');
    Route::get('/carteConsulaire/{demandeId}/preview', [App\Http\Controllers\CarteConsulaireController::class, 'preview'])->name('carteConsulaire.preview');
    Route::get('/carteConsulaire/{demandeId}/download', [App\Http\Controllers\CarteConsulaireController::class, 'download'])->name('carteConsulaire.download');
    Route::get('/carteConsulaire/{demandeId}/reject',[App\Http\Controllers\CarteConsulaireController::class, 'showRequestReject'])->name('carteConsulaire.showWithError');
    Route::post('/carteConsulaire/reject', [App\Http\Controllers\CarteConsulaireController::class, 'reject'])->name('carteConsulaire.reject');
    Route::post('/citizen/carte-consulaire/generate',[App\Http\Controllers\CarteConsulaireController::class, 'generate'])->name('carteConsulaire.generate');

    

    Route::get('/visa/{demandeId}', [App\Http\Controllers\VisaController::class, 'show'])->name('visa.show');
    Route::get('/visa/{demandeId}/preview', [App\Http\Controllers\VisaController::class, 'preview'])->name('visa.preview');
    Route::get('/visa/{demandeId}/download', [App\Http\Controllers\VisaController::class, 'download'])->name('visa.download');
    Route::get('/visa/{demandeId}/reject',[App\Http\Controllers\VisaController::class, 'showRequestReject'])->name('visa.showWithError');
    Route::post('/visa/reject', [App\Http\Controllers\VisaController::class, 'reject'])->name('visa.reject');
    Route::post('/visa/generate',[App\Http\Controllers\VisaController::class, 'generate'])->name('visa.generate');



    Route::get('/laissezPasser/{demandeId}', [App\Http\Controllers\LaissezPasserController::class, 'show'])->name('laissezPasser.show');
    Route::get('/laissezPasser/{demandeId}/preview', [App\Http\Controllers\LaissezPasserController::class, 'preview'])->name('laissezPasser.preview');
    Route::get('/laissezPasser/{demandeId}/download', [App\Http\Controllers\LaissezPasserController::class, 'download'])->name('laissezPasser.download');
    Route::get('/laissezPasser/{demandeId}/reject',[App\Http\Controllers\LaissezPasserController::class, 'showRequestReject'])->name('laissezPasser.showWithError');
    Route::post('/laissezPasser/reject', [App\Http\Controllers\LaissezPasserController::class, 'reject'])->name('laissezPasser.reject');
    Route::post('/laissezPasser/generate',[App\Http\Controllers\LaissezPasserController::class, 'generate'])->name('laissezPasser.generate');


  

});







