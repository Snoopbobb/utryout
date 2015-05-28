<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tryout;

use Auth;

use Request;

class TryoutsController extends Controller {

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
		$tryouts = Tryout::all()->where('id', intval($id));
		
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
	public function store()
	{
		$input = Request::all();

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
