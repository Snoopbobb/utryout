@extends('app')

@section('content')
<div class="container how">
	<div class="row">
    	<div class="col-sm-5 col-md-6">
    		<h1>For Player/Parent</h1>
    		<p>Utryout makes it easy to browse tryouts in your area.  Instead of sifting through several websites, forums, or social media just to find a team.  We make it easy for you to find what you’re looking for and get all the details before trying out. </p>
    		<h2>Browse Tryouts</h2>
    		<ol>
    			<li>Select the Sport, age, and enter your location to find upcoming tryouts in your area.</li>
    			<li>Find something you like?  Click on “additional information” to see all the details of the team/organization and their upcoming tryouts.</li>
    			<li>Let coaches know that you plan on attending by clicking “yes” to attend!</li>
    		</ol>
    		<div class="center">
    			<a href="/search" class="btn btn-lg">Browse Tryouts</a>
    		</div>
    	</div>
    	<div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">
    		<h1>For Coaches/Organizations</h1>
    		<p>Utryout was designed with you in mind.  Never before have you been able to post tryout information and KNOW that people are actually seeing it.  No more blind posts on social media, in forums, or on several different websites.  You can get all the details you need into your post and players/parents in your area will find you!  You can also see how many will be attending your tryouts and plan accordingly.</p>
    		<h2>Post a Tryout</h2>
    		<ol>
    			<li>Register or Sign In to your Utryout account.</li>
    			<li>Add all the details of your team/organization including website, age, location, tryout date, and more!</li>
    			<li>Submit your post for only $5.00 and your tryout information will be seen by those in your area looking for a great place to play!</li>
    		</ol>
    		<div class="center">
    			<a href="{{ url('/tryouts/create') }}" class="btn btn-lg">Post A Tryout</a>
    		</div>
    	</div>
    </div>
</div>
@endsection