<?php namespace App\Billing;

use Stripe\Stripe;
use Stripe\Charge;
use Config;
use Redirect;
use URL;

/**
* 
*/
class StripeBilling implements BillingInterface
{
	public function __construct() {
		Stripe::setApiKey(env('stripe_secret'));
	}
	
	function charge(array $data)
	{
		return Charge::create([
			'amount' => 500, //$5.00
			'currency' => 'usd',
			'description' => $data['email'],
			'card' => $data['token'],
		]);
	
	}
}