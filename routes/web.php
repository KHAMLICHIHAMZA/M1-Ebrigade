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

Route::resource('/rapport','RapportController');


//URL /home fait appel a la methode Index du controller HomeController
Route::get('/home', 'HomeController@index')->name('home');
//URL /AllArchive fait appel a la methode listeArchive du controller ArchiveController
Route::get('/FindSearchVehicule', 'ArchiveController@listeArchives')->name('FindSearchVehicule');
//URL /AllArchive fait appel a la methode listeArchive du controller ArchiveController
Route::get('/AllArchive', 'ArchiveController@listeArchives')->name('listeArchives');
//Redirection vers le controlleur qui traitera la recherche demander
Route::name('Search')->post('/AllArchive/{request?}','ArchiveController@findArchive');
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

//rapport Routes

Route::get('lang/{locale}', 'LocalizationController@index');






Route::get('/Rapports/listeRapportsNR','InterventionController@listeIRapportnonrediger')->name('listeIRapportnonrediger');
Route::get('/Rapports/listeAllrapportresponsable','RapportController@listeAllrapportresponsable')->name('listeAllrapportresponsable');
Route::get('/Rapports/listeallrapportchef','InterventionController@listeallrapportchef')->name('listeallrapportchef');
Route::get('/Rapports/rediger/{id}','InterventionController@detailredactionrapport')->name('rediger');
Route::get('/Rapports/valider/{id}','InterventionController@detailvalidationrapport');
Route::get('/Rapport/ConsulterRapport/{id}','InterventionController@detailintervention');
Route::get('/Rapport/validationRapport/{id}','InterventionController@detailvalidationrapport');
Route::get('/Rapport/CorrigerRapport/{id}','InterventionController@detailscorrectionrapport');
Route::put('/Rapport/Modificationrapport/{id}','RapportController@Modificationrapport')->name('modificationrapport');
Route::post('/Rapports/ajoutRapport/{id}','InterventionController@ajoutRapport')->name('ajoutRapport');
Route::post('/Rapports/chefvaliderapport/{id}','InterventionController@validerapport')->name('validerapport');









