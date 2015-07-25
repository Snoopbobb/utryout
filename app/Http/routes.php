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

Route::get('home', function(){
	return redirect('profile');
});

Route::get('profile', 'TryoutsController@profile');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Static Pages Routes
Route::get('how-it-works', 'PagesController@how');
Route::get('contact', 'PagesController@contact');

Route::resource('tryouts', 'TryoutsController');

// Tryout Pages Routes
Route::get('tryouts', 'TryoutsController@index');
Route::post('tryouts', 'TryoutsController@store');
Route::get('tryouts/create', 'TryoutsController@create');
Route::get('tryouts/{sport}', 'TryoutsController@show');
Route::get('tryouts/{sport}/{state}', 'TryoutsController@showState');
Route::get('tryouts/{sport}/{state}/{city}', 'TryoutsController@showCity');
Route::get('tryouts/{sport}/{state}/{city}/{id}', 'TryoutsController@showId');
Route::get('tryouts/{id}/edit', 'TryoutsController@edit');
Route::get('tryouts/{id}/delete', 'TryoutsController@destroy');
Route::post('tryouts/{id}/rsvp', 'TryoutsController@rsvp');

Route::get('search', 'SearchController@index');

Route::post('browse', 'SearchController@browse');

