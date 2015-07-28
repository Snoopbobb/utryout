<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use Session;

class PagesController extends Controller {

	public function how(){
		return view('pages.how');
	}

	public function contact(){
		return view('pages.contact');
	}

	public function contactSend(Request $request) {

		$this->validate($request, [
        	'name' => 'required|max:255',
        	'email' => 'required|email',
        	'msg' => 'required|min:5'
    	]);

		
		return view('pages.contact')->with(Session::flash('message', 'Thank you! Your message has been sent successfully.'));
	}	
}
