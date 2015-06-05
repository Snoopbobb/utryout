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
		'age',
		'age2',
		'age3',
		'age4',
		'age5',
		'date',
		'time',
		'location',
		'city',
		'state',
		'description'
	];

}
