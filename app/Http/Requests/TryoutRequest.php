<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TryoutRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{	

		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'organization' => 'required',
        	'contact_name' => 'required',
        	'contact_email' => 'required|email',
        	'sport' => 'required',
        	'age' => 'required',
        	'date' => 'required|date',
        	'location_name' => 'required',
        	'address' => 'required',
        	'city' => 'required',
        	'state' => 'required'
		];
	}

}
