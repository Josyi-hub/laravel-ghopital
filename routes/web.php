<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnexionController;

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
    return view('welcome');
});
Route::resource('patients','App\Http\Controllers\PatientController');
Route::resource('type_medecin','App\Http\Controllers\TypeMedecinController');
Route::resource('medecin','App\Http\Controllers\MedecinController');
Route::resource('rdv','App\Http\Controllers\RdvController');

Auth::routes();

Route::get('/connexion', 'App\Http\Controllers\ConnexionController@formulaire');
Route::post('/connexion', 'App\Http\Controllers\ConnexionController@traitement');
Route::get('/inscription', function () {
    return view('inscription');
});
Route::post('/inscription', function () {
    return 'Votre num est ' . request('numPatient');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');


