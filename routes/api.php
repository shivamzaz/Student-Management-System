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
// Route::post('students', 'StudentController@create')->name('api.v1.students.create');
 Route::get('students/{id}','StudentController@show')->name('api.v1.student.show');
// Route::patch('students/{id}','StudentController@update')->name('api.v1.students.patch');
// Route::delete('students/{id}','StudentController@destroy')->name('api.v1.students.delete');
// //interests 
 Route::get('interests','InterestController@getinterests')->name('api.v1.interests');

// //auth
//Route::post('users/login', 'Api\v1\UserController@login');
  /* Login user */
  Route::post('login', 'UserController@login')->name('api.v1.user.login');

  /* Register user */
  Route::post('register', 'UserController@register')->name('api.v1.user.register');

  /* Forgot User Password */
  Route::post('forgot-password', 'UserController@forgotPassword')->name('api.v1.user.forgetpassword');

  /* Verify Forgot User Password */
  Route::post('forgot-password/verify', 'UserController@verifyForgotPassword')->name('api.v1.user.forgetpassword');


  /* API Authentication routes */
  Route::group(['middleware'  =>  'api.auth'], function () {
  	Route::group(['middleware'  =>  'auth'], function () {
      //Route::get('students','StudentController@index')->name('api.v1.students.index');
        Route::post('students', 'StudentController@create')->name('api.v1.students.create');
        //Route::get('students/{id}','StudentController@show')->name('api.v1.student.show');
        Route::patch('students/{id}','StudentController@update')->name('api.v1.students.patch');
        Route::delete('students/{id}','StudentController@destroy')->name('api.v1.students.delete');
        //interests
       // Route::get('interests','InterestController@getinterests')->name('api.v1.interests');

      Route::post('reset-password', 'UserController@resetPassword')->name('api.v1.user.reset-password');
  });
});