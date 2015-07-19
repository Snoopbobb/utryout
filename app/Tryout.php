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
		'date',
		'time',
		'location_name',
		'address',
		'lat',
		'lng',
		'city',
		'state',
		'description'
	];

	public function scopeSport($query, $sport)
	{
	  return $query->where('sport', $sport);
	}

	public function scopeAge($query, $age)
	{
	  $query->whereHas('age', function ($q) use ($age) {
	    $q->where('name', 'like', "%{$age}%");
	  });
	}

	public function scopeWithinRadius($query, $radius, $zip)
	{
	  $query->where(
	  	3959 * acos(cos(radians('40.7142')) * cos(radians(lat)) 
	  		* cos( radians(lng) - radians('-74.0064')) + sin(radians('40.7142')) * sin(radians(lat)))
	  ); // do math here
	}

}
