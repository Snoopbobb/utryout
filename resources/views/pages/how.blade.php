@extends('app')

@section('content')
<div class="container-fluid">
	<div class="container">
		<div class="video-wrapper">
			<!-- 4:3 aspect ratio -->
			<div class="embed-responsive embed-responsive-4by3">
			  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wwJXkx_s-yM?rel=0"></iframe>
			  <video controls="controls" name="UTryout Video" src="/video/utryout.mp4"></video>
			</div>
		</div>
		<div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">
			<div class="panel panel-default register-panel">
		    	<div class="panel-heading">
		    		<h4>Parents and Players</h4>
		    	</div>
		    	<div class="panel-body">
		    		<h4>How does Utryout help parents and players?</h4><p>Utryout makes it easy to find youth sports tryouts in your area.  Stop sifting through several websites, forums, or social media just to find a team.  We make it easy for you to find what you’re looking for and get all the details before trying out. Browse through our list of tryouts and find a team for your child to join today.</p>
	    			<h4>Browse Tryouts</h4>
		    		<ol>
		    			<li>Select the sport, age, and enter your location to find upcoming tryouts in your area.</li>
		    			<li>Find something you like?  Click on “additional information” to see all the details of the team/organization and their upcoming tryouts.</li>
		    			<li>Let coaches know that you plan on attending by clicking “yes” to attend!</li>
		    			<li><a href="{{ url('/alerts') }}">Sign up</a> and receive automatic alerts for upcoming tryouts in your area.</li>
		    		</ol>
		    	</div>
				<div class="center">
					<a href="{{ url('/search') }}" class="btn btn-lg">Browse Tryouts</a>
				</div>
		    </div>
	    </div>
		<div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">
			<div class="panel panel-default register-panel">
				<div class="panel-heading"><h4>Coaches and Organizations</h4></div>
				<div class="panel-body">
					<h4>How does Utryout help coaches and organizations? </h4><p>Utryout was designed with you in mind.  Never before have you been able to post youth sports tryout information and KNOW that people are actually seeing it.  No more blind posts on social media, in forums, or on several different websites.  You can get all the details you need into your post and players/parents in your area will find you!  You can also see how many will be attending your tryouts and plan accordingly.</p>
		    		<h4>Post a Tryout</h4>
		    		<ol>
		    			<li>Register or Sign In to your Utryout account.</li>
		    			<li>Add all the details of your team/organization including website, age, location, tryout date, and more!</li>
		    			<li>Submit your post for only $5.00, share it on social media, and your tryout information will be seen by those in your area looking for a great place to play!</li>
		    			<li>Receive automatic alerts when someone plans to attend your tryout.</li>
		    		</ol>
				</div>
				<div class="center">
					<a href="/auth/register" class="btn btn-lg">Create Your Utryout Profile</a>
				</div>	
			</div>
		</div>
	</div>
</div>
@endsection