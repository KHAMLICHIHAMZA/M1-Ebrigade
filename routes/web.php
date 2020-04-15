<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Route::get('/Rapport', function () {
    return view('RedactionRapport');
});

Auth::routes();
Route::resource('/users','UserController');
//Route::resource('/interventions','InterventionController');


//URL /home fait appel a la methode Index du controller HomeController
Route::get('/home', 'HomeController@index')->name('home');
//URL /AllIntervention fait appel a la methode listeIntervention du controller InterventionController
Route::get('/AllIntervention', 'InterventionController@listeAllInterventions')->name('listeAllInterventions');
//Redirection vers la page d'ajout intervention
Route::get('/AjoutIntervention', function () {
    return view('AddIntervention');
});
//Redirection vers la page de modification 
Route::get('/DetailsIntervention/{id}','InterventionController@DetailsIntervention');
//Redirection vers le controlleur qui traitera les infos saisie
Route::name('AddInfoIntervention')->post('/AjoutIntervention/{request?}','InterventionController@addInterventionEngins');
//Redirection vers la page de modification 
Route::get('/ModifierIntervention/{id}','InterventionController@ShowDataIntervention');
//Traitement de la modification des champs saisie
Route::name('UpdateIntervention')->post('/ModifierIntervention/{request?}','InterventionController@UpdateInterventionEngins');
//Redirection de la demande de suppression d'une intervention 
Route::get('/SupprimerIntervention/{id}', 'InterventionController@deleteInterventionEngins')->name('deleteInterventionEngins');
//URL /php permet l'usage et le fonctionnement du code ajax qui se trouve dans la View AddIntervention
Route::get('/php', function () {
    return view('php.page');
});

Route::post('/AjoutIntervention', 'HomeController@index')->name('home');

Route::put('users/updat', 'UserController@updat')->name('users.updat');

Route::get('/parametres', function () {
    return view('parametres.parametres');
});

Route::get('user/{us}', 'UserController@delete')->name('user.delete');

