<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tryout;
use Redirect;
use Auth;
use App\Http\Helpers;
use Illuminate\Http\Request;
use DB;

class TryoutsController extends Controller {

	protected $request;

   	public function __construct(\Illuminate\Http\Request $request)
   	{
    	$this->request = $request;
   	}

	/****************************************************************************************
									 Filters Tryouts by state
	****************************************************************************************/
	public function showState($sport, $state){
		$tryouts = Tryout::all()->where('sport', $sport)->where('state', strtoupper($state));

		return view('tryouts.index', compact('tryouts', 'sport', 'state'));			
	}

	/****************************************************************************************
									 Filters Tryouts by city
	****************************************************************************************/
	public function showCity($sport, $state, $city){
		$tryouts = Tryout::all()->where('sport', $sport)->where('state', strtoupper($state))->where('city', ucwords($city));

		return view('tryouts.index', compact('tryouts', 'sport', 'state', 'city'));			
	}

	/****************************************************************************************
									 Filters Tryouts by id
	****************************************************************************************/
	public function showId($sport, $state, $city, $id){

		$tryouts = DB::table('tryouts')->where('id', $id)->get();
		
		if (count($tryouts) < 1) {
			return Redirect::back()->with('message','Sorry, that post was not found. Please check back later.');
		}
		foreach ($tryouts as $tryout) {
			$location_name = urlencode($tryout->location_name);
			$city = urlencode($tryout->city);
			$state = urlencode($tryout->state);
		}

		return view('tryouts.show', compact('tryouts', 'sport', 'state', 'city', 'id'));			
	}


	/****************************************************************************************
									 Profile Page for User
	****************************************************************************************/
	public function profile(){
		if(Auth::user()){
			$user_id = Auth::user()->id;
			
			$tryouts = Tryout::all()->where('user_id', $user_id);


			return view('tryouts.profile', compact('tryouts'));
			
		} else {

			return redirect('auth/login');

		}
		

	}

	/****************************************************************************************
									 Add RSVPs to Tryout
	****************************************************************************************/
	public function rsvp($id){
		$tryout = Tryout::findOrFail($id);

		$tryout->rsvp++;
		
        $tryout->save();

		return Redirect::back();			
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tryouts = Tryout::orderBy('date')->get();

		return view('tryouts.index', compact('tryouts'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	if(Auth::user()){

			return view('tryouts.create');

		} else {

			return redirect('auth/login');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\TryoutRequest $request)
	{	

		$address = urlencode($request->address);

		$city = urlencode($request->city);

		$state = urlencode($request->state);
		
		$gmap = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . ',+' . $city . ',+' . $state . '&key=AIzaSyAJMBpWUA3EtmSMeZPOMdLYlHhGbyQ5Er4');

		$obj = json_decode($gmap);
		$lat = $obj->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
		$lng = $obj->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

		$request->merge(array('lat' => $lat));

		$request->merge(array('lng' => $lng));

		$input = $request->all();

		Tryout::create($input);


		return redirect('tryouts');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($sport)
	{
		$tryouts = Tryout::all()->where('sport', $sport);

		return view('tryouts.index', compact('tryouts', 'sport'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tryout = Tryout::findOrFail($id);

		if((Auth::user()->id) === ($tryout->user_id)){
			return view('tryouts.edit', compact('tryout'));
		}

		return redirect('profile');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Requests\TryoutRequest $request)
	{
		$tryout = Tryout::findOrFail($id);

		$address = urlencode($request->address);

		$city = urlencode($request->city);

		$state = urlencode($request->state);
		
		$gmap = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . ',+' . $city . ',+' . $state . '&key=AIzaSyAJMBpWUA3EtmSMeZPOMdLYlHhGbyQ5Er4');

		$obj = json_decode($gmap);
		$lat = $obj->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
		$lng = $obj->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

		$request->merge(array('lat' => $lat));

		$request->merge(array('lng' => $lng));

		$tryout->update($request->all());

		return redirect('tryouts/' . $tryout->sport . '/' . $tryout->state . '/' . $tryout->city .'/' . $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tryout = Tryout::findOrFail($id);

		$tryout->delete();

		return redirect('profile');
	}

}
