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

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

Route::post('login', 'Api\Auth\LoginController@login');
Route::post('refresh', 'Api\Auth\LoginController@refresh');

Route::resource('newsfeed', 'Api\NewsfeedController');
Route::resource('user', 'Api\UserController');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'Api\Auth\LoginController@logout');
    Route::get('user', 'Api\UserController@getUser');
    Route::get('message', 'Api\MessageController@getMessage');
    Route::post('messagestatus', 'Api\MessageController@changeStatus');
    Route::post('createmesg', 'Api\MessageController@createMessage');
    Route::get('deletemessage/{id}', 'Api\MessageController@deleteMessage');
});
