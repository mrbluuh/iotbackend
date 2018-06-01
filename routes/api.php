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
Route::resource('user', 'Api\UserController');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'Api\Auth\LoginController@logout');
    Route::get('user', 'Api\UserController@getUser');
    Route::get('subject', 'Api\UserController@getSubject');
    Route::get('adwards', 'Api\UserController@getAdwards');
    Route::post('addadward', 'Api\UserController@addAdward');
    Route::get('autoanswer', 'Api\UserController@getAutoAnswers');
    Route::get('studentgroup/{id}', 'Api\UserController@getStudentbyGroup');
    Route::get('studentadward/{id}', 'Api\UserController@getStudentAward');
    Route::get('studentuser', 'Api\UserController@getStudentbyUser');
    Route::get('message', 'Api\MessageController@getMessage');
    Route::get('sentmessages', 'Api\MessageController@getSentMessages');
    Route::post('messagestatus', 'Api\MessageController@changeStatus');
    Route::post('createmesg', 'Api\MessageController@createMessage');
    Route::get('deletemessage/{id}', 'Api\MessageController@deleteMessage');
});


