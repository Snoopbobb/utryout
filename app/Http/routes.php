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

Route::get('sitemap', function()
{
   return Response::view('pages.sitemap')->header('Content-Type', 'application/xml');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Static Pages Routes
Route::get('how-it-works', 'PagesController@how');
Route::get('contact', 'PagesController@contact');
Route::post('contact', 'PagesController@contactSend');

Route::resource('tryouts', 'TryoutsController');


// Tryout Pages Routes
Route::get('tryouts', 'TryoutsController@index');
Route::post('tryouts', 'TryoutsController@store');

Route::get('tryouts/create', 'TryoutsController@create');

// User Routes
Route::get('tryouts/{id}/delete', 'TryoutsController@destroy');
Route::get('tryouts/{id}/edit', 'TryoutsController@edit');
Route::post('tryouts/rsvp', 'TryoutsController@rsvp');

Route::get('tryouts/{sport}', 'TryoutsController@show');

Route::get('tryouts/{sport}/{state}', 'TryoutsController@showState');
Route::get('tryouts/{sport}/{state}/{city}', 'TryoutsController@showCity');
Route::get('tryouts/{sport}/{state}/{city}/{id}/', 'TryoutsController@showId');
Route::get('tryouts/{sport}/{state}/{city}/{id}/{organization}/', 'TryoutsController@showId');

// Completed Tryout Routes
Route::get('completed', 'TryoutsController@completed');
Route::get('completed/{sport}', 'TryoutsController@showCompleted');


// Search or Browse for Tryouts
Route::get('search', 'SearchController@index');
Route::post('browse', 'SearchController@browse');

Route::get('alerts', 'AlertsController@index');
Route::post('alerts', 'AlertsController@store');

// Delete alerts
Route::get('unsubscribe/{email}', 'AlertsController@destroy');

