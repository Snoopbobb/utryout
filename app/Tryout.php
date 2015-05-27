<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tryout extends Model {

	protected $fillable = [
		'user_id',
		'organization',
		'website',
		'contact_name',
		'contact_email',
		'sport',
		'age1',
		'age2',
		'date',
		'time',
		'location',
		'city',
		'state',
		'description'
	];

}
