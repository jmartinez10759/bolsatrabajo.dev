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
Route::get('/login', [
        'uses'      => 'Auth\AuthController@showLogin'
        ,'as'       => 'login'
    ]);

Route::get('/register/verify/{code}', [
        'uses'      => 'Auth\AuthController@verify_code'
        ,'as'       => 'register.verify'
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

######################################## MIDDLEWARE SESSION  ################################################
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

########################################## RUTAS DEL CURRICULUM  #################################################
   
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

    Route::post('/study/insert', [
        'uses'      => 'Curriculum\StudyController@store'
        ,'as'       => 'study.insert'
    ]);

    Route::put('study/update', [
        'uses'      => 'Curriculum\StudyController@update'
        ,'as'       => 'study.update'
    ]);

    Route::delete('study/delete/{id}', [
        'uses'      => 'Curriculum\StudyController@destroy'
        ,'as'       => 'study.delete'
    ]);

    Route::post('/jobs/insert', [
        'uses'      => 'Curriculum\JobController@store'
        ,'as'       => 'jobs.insert'
    ]);

    Route::put('jobs/update', [
        'uses'      => 'Curriculum\JobController@update'
        ,'as'       => 'jobs.update'
    ]);
    
    Route::delete('jobs/delete/{id}', [
        'uses'      => 'Curriculum\JobController@destroy'
        ,'as'       => 'jobs.delete'
    ]);

    Route::post('/skills/insert', [
        'uses'      => 'Curriculum\SkillController@store'
        ,'as'       => 'skills.insert'
    ]);
    
    Route::put('skills/update', [
        'uses'      => 'Curriculum\SkillController@update'
        ,'as'       => 'skills.update'
    ]);

    Route::delete('skills/delete/{id}', [
        'uses'      => 'Curriculum\SkillController@destroy'
        ,'as'       => 'skills.delete'
    ]);
     
});

###################################### GRUPO DE RUTAS SIN AUTH ############################

Route::get('/', function () {
    return view('listados.listado_busqueda');
})->name('/');

Route::get('/listado', 'ListadoController@index')->name('carga');
//Route::get('/index', 'ListadoController@listado')->name('get_list');
############################ Busqueda de vacantes ##################################
Route::post('vacantes', 'BusquedaController@scope')->name('get_search');
Route::get('vacantes', 'BusquedaController@scope')->name('get_searchh');
Route::get('detalle/{id}', 'BusquedaController@show')->where(['id' => '[0-9]+'])->name('get_detalle');
Route::get('busqueda', 'BusquedaController@index')->name('get_list_busqueda');
