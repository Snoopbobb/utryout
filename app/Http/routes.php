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

Route::get('sitemap', function(){

    // create new sitemap object
    $sitemap = App::make("sitemap");

    // set cache (key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean))
    // by default cache is disabled
    $sitemap->setCache('laravel.sitemap', 3600);

    // check if there is cached sitemap and build new only if is not
    if (!$sitemap->isCached())
    {
         // add item to the sitemap (url, date, priority, freq)
         $sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
         $sitemap->add(URL::to('page'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');

         // get all posts from db
         $posts = DB::table('posts')->orderBy('created_at', 'desc')->get();

         // add every post to the sitemap
         foreach ($posts as $post)
         {
            $sitemap->add($post->slug, $post->modified, $post->priority, $post->freq);
         }
    }

    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
    return $sitemap->render('xml');

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

Route::get('tryouts/{sport}', 'TryoutsController@show');

Route::get('tryouts/{sport}/{state}', 'TryoutsController@showState');
Route::get('tryouts/{sport}/{state}/{city}', 'TryoutsController@showCity');
Route::get('tryouts/{sport}/{state}/{city}/{id}/', 'TryoutsController@showId');
Route::get('tryouts/{sport}/{state}/{city}/{id}/{organization}/', 'TryoutsController@showId');

// Completed Tryout Routes
Route::get('completed', 'TryoutsController@completed');
Route::get('completed/{sport}', 'TryoutsController@showCompleted');

// User Routes
Route::get('tryouts/{id}/delete', 'TryoutsController@destroy');
Route::get('tryouts/{id}/edit', 'TryoutsController@edit');
Route::post('tryouts/{id}/rsvp', 'TryoutsController@rsvp');

// Search or Browse for Tryouts
Route::get('search', 'SearchController@index');
Route::post('browse', 'SearchController@browse');

Route::get('alerts', 'AlertsController@index');
Route::post('alerts', 'AlertsController@store');

