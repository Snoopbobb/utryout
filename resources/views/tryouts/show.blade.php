@extends('app')

@section('content')
	<div class="container">
		
	 @foreach ($tryouts as $tryout)
	 	
		<div class="tryout individual-tryout">

			@if($tryout->lat)
				<div id="map-canvas"></div>
			@endif

			<div class="seperator">
				<h1>{{ ucwords($tryout->organization) }}</h1>
			</div>

			@if (!empty($tryout->website))
				<h2><a href="http://{{ ucwords($tryout->website) }}" class="btn btn-content">Visit {{ $tryout->organization }} Website</a></h2>
			@endif
			<div class="content">
				<h2><span class="tryout-title">Age:</span> {{ $tryout->age . 'U' }}</h2>
				<h2><span class="tryout-title">Sport:</span> {{ ucwords($tryout->sport) }}</h2>
				<h2><span class="tryout-title">Date:</span> {{ date('D F d, Y', strtotime($tryout->date)) }}</h2>
				<h2><span class="tryout-title">Time:</span> {{ date('g:i A', strtotime($tryout->time)) }}</h2>
				<h2><span class="tryout-title">Location:</span> {{ ucwords($tryout->location_name) }}</h2>
				<h2><span class="tryout-title">Address:</span> {{ ucwords($tryout->address) }}</h2>
				<h2><span class="tryout-title">City:</span> {{ ucwords($tryout->city) }}, {{ ucwords(stateName($tryout->state)) }}</h2>
				<h2><span class="tryout-title">Contact Name:</span> {{ ucwords($tryout->contact_name) }}</h2>
				<h2><span class="tryout-title">Contact Email:</span> {{ $tryout->contact_email }}</h2>
			
				@if ($tryout->description)
					<h2 class="tryout-description"><span class="tryout-title">Description:</span> {{ $tryout->description }}</h2>
				@else
					<h2><span class="tryout-title">Description:</span> No Additional Information Has Been Provided</h2>
				@endif
			</div>
	@endforeach
		<?php $date = date('Y-m-d'); ?>
		@if(Auth::user())
			@if((Auth::user()->id == $tryout->user_id) && ($tryout->date >= $date))
				<div>
					<a href="/tryouts/{{$id}}/edit" class="btn btn-lg">Edit Post</a>
					<a href="/tryouts/{{$id}}/delete" class="btn btn-lg" onclick="return confirm('Are you sure you want to delete this post?');">Delete Post</a>
				</div>
			@elseif($tryout->date >= $date)
				{!! Form::model($tryout, ['method' => 'POST', 'class' => 'form-horizontal', 'action' => ['TryoutsController@rsvp', $tryout->id]]) !!}

				<div class="form-group">
					<h3>{!! Form::label('rsvp', 'Do you plan on attending this tryout?', ['class'=> 'control-label', 'id' => 'rsvp']) !!}</h3>		
					{!! Form::submit('Yes', ['class'=> 'btn', 'id' => 'rsvp']) !!}
				</div>
			{!! Form::close() !!}
			@endif
		@elseif($tryout->date >= $date)
			{!! Form::model($tryout, ['method' => 'POST', 'class' => 'form-horizontal', 'action' => ['TryoutsController@rsvp', $tryout->id]]) !!}

				<div class="form-group">
					<h3>{!! Form::label('rsvp', 'Do you plan on attending this tryout?', ['class'=> 'control-label', 'id' => 'rsvp']) !!}</h3>		
					{!! Form::submit('Yes', ['class'=> 'btn', 'id' => 'rsvp']) !!}
				</div>
			{!! Form::close() !!}	
			
		@endif

		@if ($tryout->rsvp != null)
			@if( $tryout->rsvp > 1)
				<h3>{{ $tryout->rsvp }} players plan on attending this tryout.</h3>
			@else
				<h3>{{ $tryout->rsvp }} player plans on attending this tryout.</h3>
			@endif
		@endif
		
		<div
		  class="fb-like center"
		  data-share="true"
		  data-width="450"
		  data-show-faces="true"> 
		</div>
		<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
		<div>

		<!-- Popup Form for RSVP -->
			<div class="form-popup" style="display: none;">
				<a href="" id="close-popup">X</a>
				<h2>Enter Your Information To Reserve Your Place</h2>
				<div class="form-content">
					{!! Form::open(['class' => 'form-horizontal', 'action' => 'TryoutsController@rsvp', 'id'=> 'rsvp-form']) !!}
						<div class="form-group">
							{!! Form::label('attendee_name', 'Your Name (Required)', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('attende_name', null, ['class'=> 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('attendee_email', 'Your Email (Required)', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::email('attendee_email', null, ['class'=> 'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('attendee_description', 'Additional Information', ['class'=> 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::textarea('attendee_description', null, ['class'=> 'form-control', 'placeholder' => 'List any other additional details that you would like to provide.']) !!}
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::button('Attend Tryout', ['class'=> 'btn post', 'data-toggle'=> 'modal', 'data-target'=> '.bs-example-modal-sm', 'type' => 'submit']) !!}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>

	</div> <!-- End of container div -->

@endsection

@section('scripts')
	<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '460595727445651',
	      xfbml      : true,
	      version    : 'v2.4'
	    });
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
	</script>	
	<script>
		var lat = {{ $tryout->lat }};
		var lng = {{ $tryout->lng }};

		function initialize() {
		  var myLatlng = new google.maps.LatLng(lat,lng);
		  var mapOptions = {
		    zoom: 12,
		    center: myLatlng,
		    scrollwheel: false,
		    draggable: false
		  }
		  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		  var marker = new google.maps.Marker({
		      position: myLatlng,
		      map: map
		  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
@endsection