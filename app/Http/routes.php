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

Route::get('/utryout/', 'WelcomeController@index');

Route::get('utryout/home', function(){
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
Route::get('utryout/how-it-works', 'PagesController@how');
Route::get('utryout/contact', 'PagesController@contact');
Route::post('utryout/contact', 'PagesController@contactSend');

Route::resource('utryout/tryouts', 'TryoutsController');


// Tryout Pages Routes
Route::get('utryout/tryouts', 'TryoutsController@index');
Route::post('utryout/tryouts', 'TryoutsController@store');

Route::get('utryout/tryouts/create', 'TryoutsController@create');

// User Routes
Route::get('utryout/tryouts/{id}/delete', 'TryoutsController@destroy');
Route::get('utryout/tryouts/{id}/edit', 'TryoutsController@edit');
Route::post('utryout/tryouts/rsvp', 'TryoutsController@rsvp');

Route::get('utryout/tryouts/{sport}', 'TryoutsController@show');

Route::get('utryout/tryouts/{sport}/{state}', 'TryoutsController@showState');
Route::get('utryout/tryouts/{sport}/{state}/{city}', 'TryoutsController@showCity');
Route::get('utryout/tryouts/{sport}/{state}/{city}/{id}/', 'TryoutsController@showId');
Route::get('utryout/tryouts/{sport}/{state}/{city}/{id}/{organization}/', 'TryoutsController@showId');

// Completed Tryout Routes
Route::get('utryout/completed', 'TryoutsController@completed');
Route::get('utryout/completed/{sport}', 'TryoutsController@showCompleted');


// Search or Browse for Tryouts
Route::get('search', 'SearchController@index');
Route::post('browse', 'SearchController@browse');

Route::get('alerts', 'AlertsController@index');
Route::post('alerts', 'AlertsController@store');

// Delete alerts
Route::get('unsubscribe/{email}', 'AlertsController@destroy');

