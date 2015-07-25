<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function how(){
		return view('pages.how');
	}

	public function contact(){
		return view('pages.contact');
	}

}
