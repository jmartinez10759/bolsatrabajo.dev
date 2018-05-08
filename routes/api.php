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


Route::get('bolsa/token{?}','Api\TokenApiController@index');
Route::get('bolsa/token','Api\TokenApiController@index');
Route::post('bolsa/token','Api\TokenApiController@index');
Route::put('bolsa/token','Api\TokenApiController@index');
Route::delete('bolsa/token','Api\TokenApiController@index');

