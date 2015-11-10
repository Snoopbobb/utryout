<?php namespace App\Http\Controllers;
use App\Tryout;
use App\Alert;
use App\Search;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tryouts = Tryout::get();
		$alerts = Alert::get();
		$searches = Search::get();
		$tryoutsCount = count($tryouts);
		$alertsCount = count($alerts);
		$searchCount = count($searches);
		return view('welcome', compact('tryoutsCount', 'alertsCount', 'searchCount'));
	}

}
