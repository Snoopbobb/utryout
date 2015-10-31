<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Alert;
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

class AlertsController extends Controller {

	protected $request;

   	public function __construct(\Illuminate\Http\Request $request)
   	{
    	$this->request = $request;
   	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('search.alerts');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\AlertRequest $request)
	{
		$input = $request->all();

		$input['city'] = (ucwords(strtolower($input['city'])));

		$alert = Alert::create($input);

		$date = date('Y-m-d');

		$tryouts = DB::table('tryouts')->where('city', $alert->city)->where('state', $alert->state)->where('date', '<', $date)->get();

		if(count($tryouts) > 0) {

			$count = count($tryouts);

			for ($i=0; $i < $count; $i++) { 
	
				if(($alert->sport == $tryouts[$i]->sport && $alert->age == $tryouts[$i]->age) 
					|| ($alert->sport == 'any' && $alert->age == null)
					|| ($alert->sport== 'any' && $alert->age == $tryouts[$i]->age) 
					|| ($alert->sport == $tryouts[$i]->sport && $alert->age == null)) {
					
					$link = 'https://utryout.com/tryouts/' . $tryouts[$i]->sport . '/' . strtolower($tryouts[$i]->state) . 
		            				'/' . seoUrl(strtolower($tryouts[$i]->city)) . '/'  .   $tryouts[$i]->id . '/' . 
		            				seoUrl(strtolower($tryouts[$i]->organization));

		            $email = $tryouts[$i]->contact_email;

		            $contact_name = $tryouts[$i]->contact_name;
		          
					Mail::later(10, 'emails.coach', array('contact_name' => $contact_name, 'link' => $link ), function($message) use ($email)
					{	
						$message->from('alerts@utryout.com');
    					$message->to($email)->subject('Good news from Utryout.com!');
					});
				}
			}
		}

		$message = "We will alert you to any new tryouts posted that match your request.";

		return view('search.alerts')->with('message', $message);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
