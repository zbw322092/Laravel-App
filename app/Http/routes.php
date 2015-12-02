<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'RegisterController@showRegister');
Route::post('/register', 'RegisterController@doRegister');

Route::get('/login', function () {
	return view('login');
});

Route::post('/login', function() {
	$credentials = Input::only('username', 'password');
	if(Auth::attempt($credentials)) {
		return Redirect::intended('/');
	}
	return Redirect::to('login');
});

Route::get('/logout', function () {
	Auth::logout();
	return view('logout');
});

Route::get('/spotlight', ['middleware' => 'auth', function() {
	return view('spotlight');
}]);


