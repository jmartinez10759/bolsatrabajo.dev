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

#Auth::routes();

####################################SE CREA LAS RUTAS PARA INICIAR SESION #######################################################
Route::get('/login', 'Auth\AuthController@showLogin')->name('login');
Route::post('/login', 'Auth\AuthController@authLogin')->name('login');
Route::post('/logout', 'Auth\AuthController@logout')->name('logout');
Route::get('/password', 'Auth\AuthController@password')->name('password.request');
Route::get('/register', 'Candidatos\CandidatosController@index')->name('register');

Route::post('register/insert', 'Candidatos\CandidatosController@create')->name('create');


Route::group(['middleware' => ['auth.session']], function() {

	Route::get('/home', 'HomeController@index')->name('home');

});
	#Route::get('/home', 'HomeController@index')->name('home');

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
Route::get('listado', 'ListadoController@index')->name('get_list');
###########################  Registro de Candidatos ##############################
#Route::post('candidate/login', 'Candidatos\CandidatosController@store')->name('store');

############################ Busqueda de vacantes ##################################
Route::post('vacantes', 'BusquedaController@scope')->name('get_search');
Route::get('vacantes', 'BusquedaController@scope')->name('get_searchh');
Route::get('detalle/{id}', 'BusquedaController@show')->where(['id' => '[0-9]+'])->name('get_detalle');
Route::get('busqueda', 'BusquedaController@index')->name('get_list_busqueda');
