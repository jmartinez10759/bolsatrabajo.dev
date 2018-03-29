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
    return view('index');
    #return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Llamadas al controlador Candidate*/
/*Route::get('login', 'Candidatos\CandidatosController@get_login')->name('login'); // Mostrar login
Route::post('login', 'Candidatos\CandidatosController@store')->name('login'); // Verificar datos
#Route::get('logout', 'AuthController@logOut'); // Finalizar sesión

//Rutas privadas solo para usuarios autenticados
Route::group(['before' => 'auth'], function(){

    Route::get('/home', [
    	'uses' 		=> 'HomeController@index'
    	,'as' 		=> 'home'
	]);

});*/

################################# Se crea un grupo de rutas que se necesita estar loggeado ######################################
/*Route::group(['middleware' => 'auth'], function () {

    Route::get('home', [
    	'uses' 		=> 'HomeController@index'
    	,'as' 		=> 'home'
	]);



});*/

###################################### GRUPO DE RUTAS SIN AUTH ############################

Route::get('/index', 'ListadoController@index')->name('carga');
Route::get('/listado', 'ListadoController@listado')->name('get_list');

###########################  Registro de Candidatos ##############################
Route::post('register/insert', 'Candidatos\CandidatosController@create')->name('create');
Route::post('candidate/login', 'Candidatos\CandidatosController@store')->name('store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
