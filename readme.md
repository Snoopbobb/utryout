## Utryout.com built using the Laravel PHP Framework

A live web application built using Laravel, MySQL, Bootstrap, jQuery, JavaScript, Google Maps api, Stripe api, for users to post and search for youth sports tryouts in their area.

The app allows coaches and organizations to post their tryout information. Parents can then search through the tryouts to find a tryout by sport, by age, and/or by location. Parents can also sign up for automatic email alerts if any tryout is posted that match their needs.

The app uses Google Maps api to map the tryouts and also uses a radius search for users to search within a selected radius for tryout listings near them.

The app also implements the Stripe api in order to charge users to use the site.

The app also alerts coaches and organizations by email if anyone plans on attending their tryout.

Here's one of my favorite pieces of the code. A new tryout is being created, and I wanted to find any matches to any alerts that have been created. It grabs all the alerts that match the city and the state, iterates through the alerts data, and finds matches to the tryout being created. If the alert matches the tryout, it will send an email notifying the user that created the alert. There may be a much better way to do this, but it works for me and that made me happy. 

```php
$alerts = DB::table('alerts')->where('city', $tryout->city)->where('state', $tryout->state)->get();

		if(count($alerts) > 0) {

			$count = count($alerts);

			for ($i=0; $i < $count; $i++) { 
	
				if(($tryout->sport == $alerts[$i]->sport && $tryout->age == $alerts[$i]->age) 
					|| ($tryout->sport == $alerts[$i]->sport && $alerts[$i]->age == null)
					|| ($alerts[$i]->sport== 'any' && $tryout->age == $alerts[$i]->age) 
					|| ($alerts[$i]->sport== 'any' && $alerts[$i]->age == null)) {
					$link = 'https://utryout.com/tryouts/' . $tryout->sport . '/' . strtolower($tryout->state) . 
		            				'/' . seoUrl(strtolower($tryout->city)) . '/'  .   $id . '/' . 
		            				seoUrl(strtolower($tryout->organization));

		            $email = $alerts[$i]->email;
		          
					Mail::later(10, 'emails.alert', array('link' => $link ), function($message) use ($email)
					{	
						$message->from('alerts@utryout.com');
    					$message->to($email)->subject('Good news from Utryout.com!');
					});
				}
			}
```

Visit http://utryout.com and let me know what you think. Thanks and have a great day!
