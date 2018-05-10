<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('bolsa/token/{email}','Api\TokenApiController@show');
Route::get('bolsa/token','Api\TokenApiController@all');
Route::post('bolsa/token','Api\TokenApiController@create');
Route::put('bolsa/token','Api\TokenApiController@update');
Route::delete('bolsa/token','Api\TokenApiController@destroy');

#SERVICIOS DE AUTH 

Route::get('bolsa/auth{?}','Api\AuthApiController@index');
Route::get('bolsa/auth','Api\AuthApiController@index');
Route::post('bolsa/auth','Api\AuthApiController@index');
Route::put('bolsa/auth','Api\AuthApiController@index');
Route::delete('bolsa/auth','Api\AuthApiController@index');

Route::get('bolsa/nss{?}','Api\NssApiController@index');
Route::get('bolsa/nss','Api\NssApiController@index');
Route::post('bolsa/nss','Api\NssApiController@index');
Route::put('bolsa/nss','Api\NssApiController@index');
Route::delete('bolsa/nss','Api\NssApiController@index');

Route::get('bolsa/candidate{?}','Api\CandidateApiController@index');
Route::get('bolsa/candidate','Api\CandidateApiController@index');
Route::post('bolsa/candidate','Api\CandidateApiController@index');
Route::put('bolsa/candidate','Api\CandidateApiController@index');
Route::delete('bolsa/candidate','Api\CandidateApiController@index');

Route::get('bolsa/study{?}','Api\StudyApiController@index');
Route::get('bolsa/study','Api\StudyApiController@index');
Route::post('bolsa/study','Api\StudyApiController@index');
Route::put('bolsa/study','Api\StudyApiController@index');
Route::delete('bolsa/study','Api\StudyApiController@index');

Route::get('bolsa/skills{?}','Api\SkillsApiController@index');
Route::get('bolsa/skills','Api\SkillsApiController@index');
Route::post('bolsa/skills','Api\SkillsApiController@index');
Route::put('bolsa/skills','Api\SkillsApiController@index');
Route::delete('bolsa/skills','Api\SkillsApiController@index');

Route::get('bolsa/jobs{?}','Api\JobsApiController@index');
Route::get('bolsa/jobs','Api\JobsApiController@index');
Route::post('bolsa/jobs','Api\JobsApiController@index');
Route::put('bolsa/jobs','Api\JobsApiController@index');
Route::delete('bolsa/jobs','Api\JobsApiController@index');