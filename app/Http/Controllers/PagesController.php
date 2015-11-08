<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use Session;
use Mail;

class PagesController extends Controller {

    public function how(){
        $title = "How It Works";
        return view('pages.how', compact('title'));
    }

    public function contact(){
        $title = "Contact Us";
        return view('pages.contact', compact('title'));
    }
    
    public function contactSend(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'msg' => 'required|min:5'
        ]);
        Mail::send('emails.contact',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'msg' => $request->get('msg')
        ), function($message)
    {
        $message->from('contact@utryout.com');
        $message->to('bobtabor@q.com', 'Admin')->subject('Utryout.com Contact Form Message');
        $message->to('jserrano@utryout.com', 'Admin')->subject('Utryout.com Contact Form Message');
    });
        
        return view('pages.contact')->with(Session::flash('message', 'Thank you! Your message has been sent successfully.'));
    }   
}