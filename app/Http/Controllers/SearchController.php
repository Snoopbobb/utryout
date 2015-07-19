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

class SearchController extends Controller {

	public function index() {
		return view('search.index');
	}

	public function browse() {

	  $q = Tryout::query();

	  if (Input::has('search'))
	  {
	     // simple where here or another scope, whatever you like
	     $q->where('name','like',Input::get('search'));
	  }

	  if (Input::has('sport'))
	  {
	     $q->Sport(Input::get('sport'));
	  }

	  if (Input::has('age'))
	  {
	     $q->where('age', Input::get('age'));
	  }

	  if (Input::has('radius' != null))
	  {
	     $q->withinRadius(Input::get('radius'));
	  }

	  $tryouts = $q->orderBy('date')->paginate(5);
			
	  return view('search.results', compact('tryouts'));

	}
}