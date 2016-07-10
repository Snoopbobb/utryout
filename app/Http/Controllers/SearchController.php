<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tryout;
use App\Search;
use Redirect;
use Auth;
use App\Http\Helpers;
use Illuminate\Http\Request;
use DB;
use Input;
use Validator;

class SearchController extends Controller {

	public function index() {

		$title = "Browse Upcoming Tryouts";	

		return view('search.index', compact('title'));
	}

	public function browse(Request $request) {

	  $this->validate($request, [
        'zip' => 'required|regex:/\b\d{5}\b/'
      ]);

      $input = $request->all();

	  Search::create($input);

	  if (Input::has('sport'))
	  {
	  	 $sport = Input::get('sport');

	  	 $date = date('Y-m-d');

		 $tryouts = Tryout::orderBy('date')->where('date', '>=', $date)->where('sport', '=', $sport)->get();

		 $count = count($tryouts);
	  }

	  if (Input::has('age'))
	  {
	  	$sport = Input::get('sport');

	  	$age = Input::get('age');
	  	$age = intval($age); 

	  	$date = date('Y-m-d');
	  	 
	    $tryouts = Tryout::orderBy('date')->where('date', '>=', $date)->where('sport', '=', $sport)->where('age', '=', $age)->get();

	    $count = count($tryouts);

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

		$count = count($tryouts);

	  }
	  
	  if(count($tryouts) > 0) {

	  	$title = "We Found $count Upcoming Tryouts";

	  	return view('search.results', compact('tryouts', 'count', 'title'));
	  }
	  
	  $notFound = 'Please try again or signup and receive an alert for new tryout posts in this area by filling out the form below.';

	  return redirect('alerts')->with('notFound', $notFound);
	}
}