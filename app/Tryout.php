<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

	public static function searchSport($sport)
	{
	  $tryouts = Tryout::selct('tryouts')->where('sport', $sport);

	  return $tryouts;
	  
	}

	public static function searchAge($age, $sport)
	{
	  $tryouts = Tryout::select('tryouts')->where('age', '=', $age)->where('sport', $sport);

	  return $tryouts;

	}

	public static function searchRadius($age, $sport, $lat, $lng, $rad)
	{
		//if age is set, run this
		if($age){
			$tryouts = DB::select(DB::raw(
				"SELECT *
				FROM (
				  SELECT 
				    *,
				    3956 * ACOS(COS(RADIANS($lat)) * COS(RADIANS(lat)) * COS(RADIANS($lng) - RADIANS(lng)) + 
				    	SIN(RADIANS($lat)) * SIN(RADIANS(lat))) AS distance
				  FROM tryouts
				  WHERE
				    lat 
				      BETWEEN $lat - ($rad / 69) 
				      AND $lat + ($rad / 69)
				    AND lng 
				      BETWEEN $lng - ($rad / (69 * COS(RADIANS($lat)))) 
				      AND $lng + ($rad / (69* COS(RADIANS($lat))))
				) r
				WHERE distance < $rad
					AND age = $age
					AND sport = '$sport'
				ORDER BY distance ASC
				", array('lat'=> $lat, 'lng'=> $lng, 'rad'=> $rad, 'sport'=> $sport)));

			return $tryouts;
		}
		//if age is not set, run this
		$tryouts = DB::select(DB::raw(
				"SELECT *
				FROM (
				  SELECT 
				    *,
				    3956 * ACOS(COS(RADIANS($lat)) * COS(RADIANS(lat)) * COS(RADIANS($lng) - RADIANS(lng)) + 
				    	SIN(RADIANS($lat)) * SIN(RADIANS(lat))) AS distance
				  FROM tryouts
				  WHERE
				    lat 
				      BETWEEN $lat - ($rad / 69) 
				      AND $lat + ($rad / 69)
				    AND lng 
				      BETWEEN $lng - ($rad / (69 * COS(RADIANS($lat)))) 
				      AND $lng + ($rad / (69* COS(RADIANS($lat))))
				) r
				WHERE distance < $rad
					AND sport = '$sport'
				ORDER BY distance ASC
				", array('lat'=> $lat, 'lng'=> $lng, 'rad'=> $rad, 'sport'=> $sport)));

			return $tryouts;
	}

}
