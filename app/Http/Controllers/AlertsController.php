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

		Alert::create($input);
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
