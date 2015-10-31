<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Search extends Model {

	protected $fillable = [
		'id',
		'sport',
		'age',
		'radius',
		'zip'
	];

}