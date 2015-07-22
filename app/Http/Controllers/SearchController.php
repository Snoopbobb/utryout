<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tryout;
use Redirect;
use Auth;
use App\Http\Helpers;
use Request;
use DB;
use Input;

class SearchController extends Controller {

	public function index() {
		return view('search.index');
	}

	public function browse() {

	  if (Input::has('sport'))
	  {
	  	 $sport = Request::input('sport');
	  	 
	     $tryouts = Tryout::all()->where('sport', $sport)->sortBy('date');
	  }

	  if (Input::has('age'))
	  {
	  	$sport = Request::input('sport');
	  	$age = Request::input('age');
	  	$age = intval($age);

	    $tryouts = DB::table('tryouts')->where('age', '=', $age);

	    dd($tryouts);

	  }

	  if (Input::has('zip'))
	  {
	  	$zip = Request::input('zip');
	  	$rad = Request::input('radius');

	  	$gmap = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $zip. '&key=AIzaSyAJMBpWUA3EtmSMeZPOMdLYlHhGbyQ5Er4');
	  	
	  	$obj = json_decode($gmap);
		$lat = $obj->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
		$lng = $obj->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

		// $tryouts = DB::select());

		$tryouts = Tryout::searchRadius(Input::get('age'), Input::get('sport'), $lat, $lng, $rad);

	  }
			
	  return view('search.results', compact('tryouts'));

	}
}