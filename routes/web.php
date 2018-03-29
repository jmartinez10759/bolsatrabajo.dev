<?php

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
    return view('dashboard');
    #return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'ListadoController@index');
Route::get('/listado', 'ListadoController@listado');

###########################  Registro de Candidatos ##############################
Route::post('register/insert', 'Candidatos\CandidatosController@create')->name('create');
Route::post('candidate/login', 'Candidatos\CandidatosController@store')->name('store');
