<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tryout extends Model {

	protected $fillable = [
		'organization',
		'contact_name',
		'contact_email',
		'sport',
		'age',
		'date',
		'time',
		'location',
		'city',
		'state',
		'description'
	];

}
