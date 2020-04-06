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
Route::resource('/interventions','InterventionController');


//URL /home fait appel a la methode Index du controller HomeController
Route::get('/home', 'HomeController@index')->name('home');
//URL /AllIntervention fait appel a la methode listeIntervention du controller InterventionController
Route::get('/AllIntervention', 'InterventionController@listeAllInterventions')->name('listeAllInterventions');

Route::get('/php', function () {
    return view('php.page');
});
Route::get('/AjoutIntervention', function () {
    return view('AddIntervention');
});
Route::post('/AjoutIntervention', 'HomeController@index')->name('home');
