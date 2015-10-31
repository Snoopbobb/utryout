<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Alert extends Model {

	protected $fillable = [
		'alert_id',
		'email',
		'sport',
		'age',
		'city',
		'state'
	];

}
