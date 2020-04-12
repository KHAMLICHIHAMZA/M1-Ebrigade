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
//URL /AllIntervention fait appel a la methode listeIntervention du controller InterventionController
Route::get('/AllIntervention', 'InterventionController@listeAllInterventions')->name('listeAllInterventions');
//
Route::post('/AjoutIntervention', 'InterventionController@addInterventionEngins')->name('AddIntervention');
//
Route::get('/SupprimerIntervention/{id}', 'InterventionController@deleteInterventionEngins')->name('deleteInterventionEngins');
//
Route::get('/AjoutIntervention', function () {
    return view('AddIntervention');
});
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

