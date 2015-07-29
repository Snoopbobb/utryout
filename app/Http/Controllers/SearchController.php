<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tryout;
use Redirect;
use Auth;
use App\Http\Helpers;
use Illuminate\Http\Request;
use DB;
use Input;
use Validator;

class SearchController extends Controller {

	public function index() {
		return view('search.index');
	}

	public function browse(Request $request) {

	  $this->validate($request, [
        'zip' => 'digits:5|integer',
      ]);

	  if (Input::has('sport'))
	  {
	  	 $sport = Input::get('sport');
	  	 
	     $tryouts = Tryout::all()->where('sport', $sport)->sortBy('date');
	  }

	  if (Input::has('age'))
	  {
	  	$sport = Input::get('sport');
	  	$age = Input::get('age');
	  	$age = intval($age);

	    $tryouts = Tryout::all()->where('age', $age)->where('sport', $sport)->sortBy('date');

	  }

	  if (Input::has('zip'))
	  {
	  	$zip = $request->zip;
	  	$rad = $request->radius;

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