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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Static Pages Routes
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

// Tryout Pages Routes
Route::get('tryouts', 'TryoutsController@index');
Route::post('tryouts', 'TryoutsController@store');
Route::get('tryouts/create', 'TryoutsController@create');
Route::get('tryouts/baseball', 'TryoutsController@getAllBaseball');
