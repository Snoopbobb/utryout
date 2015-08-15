@extends('app')

@section('content')
<div class="container-fluid">
	<div class="container">
		<div class="video-wrapper">
			<!-- 4:3 aspect ratio -->
			<div class="embed-responsive embed-responsive-4by3">
			  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wwJXkx_s-yM?rel=0"></iframe>
			  <video controls="controls" name="UTryout Video" src="/video/utryout_coaches.mp4"></video>
			</div>
		</div>
		<div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">
			<div class="panel panel-default register-panel">
		    	<div class="panel-heading">
		    		<h4>How Utryout can help you</h4>
		    	</div>
		    	<div class="panel-body">
		    		<h4>Coaches and Organizations, </h4><p>Utryout was designed with you in mind.  Never before have you been able to post youth sports tryout information and KNOW that people are actually seeing it.  No more blind posts on social media, in forums, or on several different websites.  You can get all the details you need into your post and players/parents in your area will find you!  You can also see how many will be attending your tryouts and plan accordingly.</p>
		    		<h4>Post a Tryout</h4>
		    		<ol>
		    			<li>Register or Sign In to your Utryout account.</li>
		    			<li>Add all the details of your team/organization including website, age, location, tryout date, and more!</li>
		    			<li>Submit your post for <strike>only $5.00</strike> Free for a limited time, share it on social media, and your tryout information will be seen by those in your area looking for a great place to play!</li>
		    			<li>Receive automatic alerts when someone plans to attend your tryout.</li>
		    		</ol>
		    	</div>
				<div class="center">
					<a href="{{ url('/auth/login') }}" class="btn btn-lg">Already A Member? Login Here</a>
				</div>
		    </div>
	    </div>
		<div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">
			<div class="panel panel-default register-panel">
				<div class="panel-heading"><h4>Register Now To Setup Your Utryout Profile!</h4></div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Username</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{ old('username') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-lg">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
