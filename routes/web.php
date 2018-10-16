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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[
	'as'=>'register',
	'uses'=>'RegistrationController@register'
]);

Route::post('/register',[
	'as'=>'register',
	'uses'=>'RegistrationController@register_data'
]);

Route::get('/login',[
	'as'=>'login',
	'uses'=>'LoginController@login'
]);

Route::post('/login',[
	'as'=>'login',
	'uses'=>'LoginController@check_login'
]);

Route::get('/dashboard',[
	'as'=>'dashboard',
	'uses'=>'DashboardController@index'
]);

Route::get('/logout',[
	'as'=>'logout',
	'uses'=>'LoginController@logout'
]);

