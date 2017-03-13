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
//Route::put($uri, $callback);
//Route::patch($uri, $callback);
//Route::delete($uri, $callback);
//Route::options($uri, $callback);

// Route::post('authenticate', 'UserController@authenticate')->name('api.v1.users.authenticate');

//students
Route::get('students','StudentController@index')->name('api.v1.students.index');
Route::post('students', 'StudentController@create')->name('api.v1.students.create');
Route::get('students/{id}','StudentController@show')->name('api.v1.student.show');
Route::patch('students/{id}','StudentController@update')->name('api.v1.students.patch');
Route::delete('students/{id}','StudentController@destroy')->name('api.v1.students.delete');
//interests

//auth
//Route::post('users/login', 'Api\v1\UserController@login');

Route::post('users/register', 'Api\v1\UserController@register');

