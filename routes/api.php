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


Route::post('login', 'Api\Auth\LoginController@login');
Route::post('refresh', 'Api\Auth\LoginController@refresh');

Route::resource('newsfeed', 'Api\NewsfeedController');
Route::get('entrada/obtener', 'Api\EntradaController@getEntradas');
Route::post('entrada/crear', 'Api\EntradaController@createEntrada');
Route::resource('user', 'Api\UserController');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'Api\Auth\LoginController@logout');
    Route::get('user', 'Api\UserController@getUser');
    
});


