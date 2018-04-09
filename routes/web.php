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
#Auth::routes();
################################### SE CREA LAS RUTAS PARA INICIAR SESION  ####################################################
/*Route::get('login', 'Auth\AuthController@showLogin')->name('login');
Route::post('login', 'Auth\AuthController@authLogin')->name('login');
Route::post('logout', 'Auth\AuthController@logout')->name('logout');
Route::get('password', 'Auth\AuthController@password')->name('password.request');
Route::get('register', 'Candidatos\CandidatosController@index')->name('register');
Route::post('register/insert', 'Candidatos\CandidatosController@create')->name('create');*/

Route::get('/login', [
        'uses'      => 'Auth\AuthController@showLogin'
        ,'as'       => 'login'
    ]);
Route::post('/login', [
        'uses'      => 'Auth\AuthController@authLogin'
        ,'as'       => 'login'
    ]);
Route::post('/logout', [
        'uses'      => 'Auth\AuthController@logout'
        ,'as'       => 'logout'
    ]);
Route::get('/password', [
        'uses'      => 'Auth\AuthController@password'
        ,'as'       => 'password.request'
    ]);
Route::get('/register', [
        'uses'      => 'Candidatos\CandidatosController@index'
        ,'as'       => 'register'
    ]);
Route::post('/register/insert', [
        'uses'      => 'Candidatos\CandidatosController@create'
        ,'as'       => 'create'
    ]);
Route::group(['middleware' => ['auth.session']], function() {


######################################## RUTAS DE DETALLES DEL CANDIDATO  #################################

    Route::get('/details', [
        'uses'      => 'Candidatos\DetailCandidateController@index'
        ,'as'       => 'details'
    ]);

    Route::get('/details/show', [
        'uses'      => 'Candidatos\DetailCandidateController@show'
        ,'as'       => 'details.show'
    ]);

     Route::post('/details/insert', [
        'uses'      => 'Candidatos\DetailCandidateController@store'
        ,'as'       => 'details.insert'
    ]);

######################################## RUTAS DEL CURRICULUM  #########################################
   
    Route::get('/cv', [
        'uses'      => 'Curriculum\CurriculumController@index'
        ,'as'       => 'upload_cv'
    ]);

    Route::get('/cv/show', [
        'uses'      => 'Curriculum\CurriculumController@show'
        ,'as'       => 'cv.show'
    ]);

     Route::post('/cv/insert', [
        'uses'      => 'Curriculum\CurriculumController@store'
        ,'as'       => 'cv.insert'
    ]);
     


});
Route::get('/', function () {
    return view('listados.listado_busqueda');
})->name('/');
###################################### GRUPO DE RUTAS SIN AUTH ############################

Route::get('/index', 'ListadoController@index')->name('carga');
Route::get('/listado', 'ListadoController@listado')->name('get_list');

#Route::get('/api/items', 'ListadoController@index')->name('home');
###########################  Registro de Candidatos ##############################
#Route::post('candidate/login', 'Candidatos\CandidatosController@store')->name('store');
