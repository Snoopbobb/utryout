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

	  	 $date = date('Y-m-d');

		 $tryouts = Tryout::orderBy('date')->where('date', '>=', $date)->where('sport', '=', $sport)->get();
	  }

	  if (Input::has('age'))
	  {
	  	$sport = Input::get('sport');

	  	$age = Input::get('age');
	  	$age = intval($age); 

	  	$date = date('Y-m-d');
	  	 
	    $tryouts = Tryout::orderBy('date')->where('date', '>=', $date)->where('sport', '=', $sport)->where('age', '=', $age)->get();

	  	// $tryouts = Tryout::searchAge($age, $sport)->where('date', '>=', $date)->orderBy('date')->get();

	  }

	  if (Input::has('zip'))
	  {
	  	$zip = $request->zip;
	  	$rad = $request->radius;

	  	$gmap = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $zip. '&key=AIzaSyAJMBpWUA3EtmSMeZPOMdLYlHhGbyQ5Er4');
	  	
	  	$obj = json_decode($gmap);
		$lat = $obj->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
		$lng = $obj->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

		$date = date('Y-m-d');

		$tryouts = Tryout::searchRadius(Input::get('age'), Input::get('sport'), $lat, $lng, $rad, $date);

	  }
			
	  return view('search.results', compact('tryouts'));

	}
}