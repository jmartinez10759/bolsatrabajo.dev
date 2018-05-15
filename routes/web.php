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

Route::post('login', [
        'uses'      => 'Auth\AuthController@authLogin'
        ,'as'       => 'login'
    ]);

Route::post('/logout', [
        'uses'      => 'Auth\AuthController@logout'
        ,'as'       => 'logout'
    ]);

Route::get('/register', [
        'uses'      => 'Candidatos\CandidatosController@index'
        ,'as'       => 'register'
    ]);

Route::post('register/insert', [
        'uses'      => 'Candidatos\CandidatosController@create'
        ,'as'       => 'register.insert'
    ]);
######################################RUTA PARA OBTENER EL DETALLE DE LA VACANTE ###################################
Route::get('/details/vacante', [
        'uses'      => 'Vacantes\DetailsJobsController@index'
        ,'as'       => 'details.vacante'
    ]);
Route::get('/details/vacante/show', [
        'uses'      => 'Vacantes\DetailsJobsController@show'
        ,'as'       => 'details.vacante.show'
    ]);
######################################RECUPERACION DE LA CONTRASEÑA ###################################
Route::get('/password/request', [
        'uses'      => 'Auth\PasswordController@index'
        ,'as'       => 'password.request'
    ]);
Route::post('/password/verify', [
        'uses'      => 'Auth\PasswordController@store'
        ,'as'       => 'password.verify'
    ]);
/*Route::get('/password/reset/{code}', [
        'uses'      => 'Auth\PasswordController@create'
        ,'as'       => 'password.reset'
    ]);*/


######################################## MIDDLEWARE SESSION  ################################################
Route::group(['middleware' => ['auth.session']], function() {

######################################## RUTAS DE DETALLES DEL CANDIDATO  #################################

    Route::get('/details', [
        'uses'      => 'Candidatos\DetailCandidateController@index'
        ,'as'       => 'details'
    ]);
    
    Route::get('/selection', [
        'uses'      => 'Administracion\SelectionController@index'
        ,'as'       => 'selection'
    ]);
    
    Route::get('/details/show', [
        'uses'      => 'Candidatos\DetailCandidateController@show'
        ,'as'       => 'details.show'
    ]);

    Route::post('/details/insert', [
        'uses'      => 'Candidatos\DetailCandidateController@store'
        ,'as'       => 'details.insert'
    ]);
    Route::post('/details/upload', [
        'uses'      => 'Candidatos\DetailCandidateController@upload_file'
        ,'as'       => 'details.upload_file'
    ]);
    

    Route::post('/nss/insert', [
        'uses'      => 'Candidatos\NssController@store'
        ,'as'       => 'details.insert.nss'
    ]);

    Route::get('/nss/show', [
        'uses'      => 'Candidatos\NssController@show'
        ,'as'       => 'details.nss.show'
    ]);

    Route::put('/nss/update', [
        'uses'      => 'Candidatos\NssController@update'
        ,'as'       => 'details.nss.update'
    ]);

    Route::delete('/nss/detele/{id}', [
        'uses'      => 'Candidatos\NssController@destroy'
        ,'as'       => 'nss.delete'
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

    Route::post('postulacion/insert', [
        'uses'      => 'Postulacion\PostulacionController@store'
        ,'as'       => 'postulacion.insert'
    ]);

     
});

###################################### GRUPO DE RUTAS SIN AUTH ############################

Route::get('/', function () {
    return view('listados.listado_busqueda');
})->name('/');

Route::get('/index', 'ListadoController@index')->name('carga');
Route::get('/listado', 'ListadoController@index')->name('get_list');
############################ Busqueda de vacantes ##################################
Route::post('vacantes', 'BusquedaController@scope')->name('get_search');
Route::get('vacantes', 'BusquedaController@scope')->name('get_searchh');
Route::get('detalle/{id}', 'BusquedaController@show')->where(['id' => '[0-9]+'])->name('get_detalle');
Route::get('busqueda', 'BusquedaController@index')->name('get_list_busqueda');
Route::get('autocomplete','BusquedaController@autocomplete')->name('get_autocomplete');