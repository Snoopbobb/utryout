<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tryout;
use Redirect;
use Auth;
use App\Http\Helpers;
use Illuminate\Http\Request;
use DB;
use Billable;
use Input;
use App\Billing\StripeBilling;
use Stripe;
use Carbon\Carbon;
use Mail;

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

		$date = date('Y-m-d');

		$tryouts = Tryout::orderBy('date')->where('sport', $sport)->where('state', strtoupper($state))->where('date', '>=', $date)->get();

		$count = count($tryouts);

		$title = "Youth $sport Tryouts In $state";

		return view('tryouts.index', compact('tryouts', 'sport', 'state', 'count', 'title'));			
	}

	/****************************************************************************************
									 Filters Tryouts by city
	****************************************************************************************/
	public function showCity($sport, $state, $city){
		
		$date = date('Y-m-d');

		$tryouts = Tryout::orderBy('date')->where('sport', $sport)->where('state', strtoupper($state))->where('city', ucwords(str_replace("-", " ", $city)))->where('date', '>=', $date)->get();

		$count = count($tryouts);

		$title = "Youth $sport Tryouts In $city, $state";

		return view('tryouts.index', compact('tryouts', 'sport', 'state', 'city', 'count', 'title'));			
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

		$title = "$tryout->organization";

		return view('tryouts.show', compact('tryouts', 'sport', 'state', 'city', 'id', 'title'));			
	}


	/****************************************************************************************
									 Profile Page for User
	****************************************************************************************/
	public function profile(){
		if(Auth::user()){
			$user_id = Auth::user()->id;

			$username = Auth::user()->username;

			$date = date('Y-m-d');
			
			$tryouts = Tryout::orderBy('date', 'desc')->where('user_id', $user_id)->get();

			$count = count($tryouts);

			$title = $username . "'s Posted Tryouts";

			return view('tryouts.profile', compact('tryouts', 'count', 'title'));
			
		} else {

			return redirect('auth/login');

		}
		

	}

	/****************************************************************************************
									 Add RSVPs to Tryout
	****************************************************************************************/
	public function rsvp(Request $request){
		$id = $request->id;
		// var_dump($id);
		// die();
		$tryout = Tryout::findOrFail($id);

		$tryout->rsvp++;

		$rsvp = $tryout->rsvp;

		$players = 'player';

		$name = $tryout->contact_name;

		$email = $tryout->contact_email;

		$attendee_name = $request->attendee_name;

		$attendee_email = $request->attendee_email;

		if ( $request->attendee_description ) {
			$attendee_description = 'Here is some additional information they wanted to pass along: ' . $request->attendee_description;
		} else {
			$attendee_description = null;
		}

		if ( count($rsvp) > 1 ) {
			$players = 'players';
		}
		

		$link = 'https://utryout.com/tryouts/' . $tryout->sport . '/' . strtolower($tryout->state) . 
            				'/' . seoUrl(strtolower($tryout->city)) . '/'  .   $tryout->id . '/' . 
            				seoUrl(strtolower($tryout->organization));

        $tryout->save();

        

        Mail::send('emails.rsvp',
        array(
            'name' => $name,
            'link' => $link,
            'rsvp' => $rsvp,
            'players' => $players,
            'email' => $email,
            'attendee_name' => $attendee_name,
            'attendee_email' => $attendee_email,
            'attendee_description' => $attendee_description
        ), function($message) use ($tryout)
	    {
	        $message->from('rsvp@utryout.com');
	        $message->to($tryout->contact_email, $tryout->contact_name)->subject('Good News From Utryout.com');
	    });

		return Redirect::back();			
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$date = date('Y-m-d');

		$tryouts = Tryout::orderBy('date')->where('date', '>=', $date)->get();

		$count = count($tryouts);

		$title = "All Upcoming Youth Sports Tryouts";

		return view('tryouts.index', compact('tryouts', 'count', 'title'));
	}

	/**
	 * Display all tryouts including past tryouts
	 *
	 * @return Response
	 */
	public function completed()
	{
		$date = date('Y-m-d');

		$tryouts = Tryout::orderBy('date', 'desc')->where('date', '<', $date)->get();

		$count = count($tryouts);

		$title = "All Past Youth Sports Tryouts";

		return view('tryouts.completed', compact('tryouts', 'count', 'title'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showCompleted($sport)
	{
		$date = date('Y-m-d');

		$tryouts = Tryout::orderBy('date')->where('date', '<', $date)->where('sport', '=', $sport)->get();

		$count = count($tryouts);

		$title = "Upcoming Youth " . ucwords($sport) . " Tryouts";

		return view('tryouts.completed', compact('tryouts', 'sport', 'count', 'title'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	if(Auth::user()){

			$title = "Create A New Tryout Post";

			return view('tryouts.create', compact('title'));

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

		// Credit Card payments turned off
		// if ($request->coupon !== 'softball') {
		// 	$billing = new StripeBilling;

		// 	try {
		// 		if($request->coupon === '50off'){
		// 			$billing->coupon([
		// 				'token' => Input::get('stripe-token'),
		// 				'email' => Input::get('stripe-email')
		// 			]);
		// 		} else {
		// 			$billing->charge([
		// 				'token' => Input::get('stripe-token'),
		// 				'email' => Input::get('stripe-email')
		// 			]);
		// 		}

		// 	} catch(\Stripe\Error\Card $e) {
		// 		// Since it's a decline, \Stripe\Error\Card will be caught
		// 		$body = $e->getJsonBody();
	 //  			$errors  = $body['error']['message'];

		// 		return Redirect::back()->withInput()->withErrors($errors);

		// 		} catch (\Stripe\Error\InvalidRequest $e) {
		// 		  // Invalid parameters were supplied to Stripe's API
		// 			$body = $e->getJsonBody();
	 //  				$errors  = $body['error']['message'];

		// 			return Redirect::back()->withInput()->withErrors($errors);

		// 		} catch (\Stripe\Error\Authentication $e) {
		// 		  // Authentication with Stripe's API failed
		// 		  // (maybe you changed API keys recently)
		// 			$body = $e->getJsonBody();
	 //  				$errors  = $body['error']['message'];

		// 			return Redirect::back()->withInput()->withErrors($errors);

		// 		} catch (\Stripe\Error\ApiConnection $e) {
		// 		  // Network communication with Stripe failed
		// 			$body = $e->getJsonBody();
	 //  				$errors  = $body['error']['message'];

		// 			return Redirect::back()->withInput()->withErrors($errors);

		// 		} catch (\Stripe\Error\Base $e) {
		// 		  // Display a very generic error to the user, and maybe send
		// 		  // yourself an email
		// 			$body = $e->getJsonBody();
	 //  				$errors  = $body['error']['message'];

		// 			return Redirect::back()->withInput()->withErrors($errors);

		// 		} catch (Exception $e) {
		// 		  // Something else happened, completely unrelated to Stripe
		// 			$body = $e->getJsonBody();
	 //  				$errors  = $body['error']['message'];

		// 			return Redirect::back()->withInput()->withErrors($errors);
		// 	}
		// }

		$user = Auth::user();

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

		$input['user_id'] = Auth::user()->id; 

		$input['city'] = (ucwords(strtolower($input['city'])));

		$tryout = Tryout::create($input);

		$id = $tryout->id;

		$alerts = DB::table('alerts')->where('city', $tryout->city)->where('state', $tryout->state)->get();

		if(count($alerts) > 0) {

			$count = count($alerts);

			for ($i=0; $i < $count; $i++) { 
	
				if(($tryout->sport == $alerts[$i]->sport && $tryout->age == $alerts[$i]->age) 
					|| ($tryout->sport == $alerts[$i]->sport && $alerts[$i]->age == null)
					|| ($alerts[$i]->sport== 'any' && $tryout->age == $alerts[$i]->age) 
					|| ($alerts[$i]->sport== 'any' && $alerts[$i]->age == null)) {
					$link = 'https://utryout.com/tryouts/' . $tryout->sport . '/' . strtolower($tryout->state) . 
		            				'/' . seoUrl(strtolower($tryout->city)) . '/'  .   $id . '/' . 
		            				seoUrl(strtolower($tryout->organization));

		            $email = $alerts[$i]->email;
		          
					Mail::later(10, 'emails.alert', array('link' => $link ), function($message) use ($email)
					{	
						$message->from('alerts@utryout.com');
    					$message->to($email)->subject('Good news from Utryout.com!');
					});
				}
			}
		}

		$message = 'We have alerted any users who are searching for tryouts like yours about your new posting. Please consider sharing it on your social media pages.';

		return redirect('profile')->with('message', $message);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($sport)
	{
		$date = date('Y-m-d');

		$tryouts = Tryout::orderBy('date')->where('date', '>=', $date)->where('sport', '=', $sport)->get();

		$count = count($tryouts);

		$title = "Upcoming Youth " . ucwords($sport) . " Tryouts";

		return view('tryouts.index', compact('tryouts', 'sport', 'count', 'title'));
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

		return redirect('tryouts/' . $tryout->sport . '/' . seoUrl(strtolower($tryout->state)) . '/' . seoUrl(strtolower($tryout->city)) .'/' . $id . '/' . seoUrl(strtolower($tryout->organization)));
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
