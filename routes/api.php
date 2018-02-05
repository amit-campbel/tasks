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

Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function() {
	Route::get('tasks', 'TaskController@index');
	Route::get('tasks/{task}', 'TaskController@show');
	Route::post('tasks', 'TaskController@store');
	Route::put('tasks/{task}', 'TaskController@update');
	Route::delete('tasks/{task}', 'TaskController@delete');

	Route::get('tasks/{task}/comments', 'CommentController@index');
	Route::get('tasks/{task}/comments/{comment}', 'CommentController@show');
	Route::post('tasks/{task}/comments', 'CommentController@store');
	Route::put('tasks/{task}/comments/{comment}', 'CommentController@update');
	Route::delete('tasks/{task}/comments/{comment}', 'CommentController@delete');
});

