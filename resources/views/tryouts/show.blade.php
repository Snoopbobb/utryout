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
			<h1><a href="http://{{ ucwords($tryout->website) }}">Visit {{ $tryout->organization }} Website</a></h1>
			<h1><span class="tryout-title">Sport:</span> {{ ucwords($tryout->sport) }}</h1>
			<h1><span class="tryout-title">Age:</span> {{ $tryout->age . 'U' }}</h1>
			<h1>{{ $tryout->age2 }}</h1>
			<h1>{{ $tryout->age3 }}</h1>
			<h1>{{ $tryout->age4 }}</h1>
			<h1>{{ $tryout->age5 }}</h1>
			<h1><span class="tryout-title">Date:</span> {{ date('D F d, Y', strtotime($tryout->date)) }}</h1>
			<h1><span class="tryout-title">Time:</span> {{ date('g:i A', strtotime($tryout->time)) }}</h1>
			<h1><span class="tryout-title">Location:</span> {{ ucwords($tryout->location_name) }}</h1>
			<h1><span class="tryout-title">Address:</span> {{ ucwords($tryout->address) }}</h1>
			<h1><span class="tryout-title">City:</span> {{ ucwords($tryout->city) }}, {{ ucwords(stateName($tryout->state)) }}</h1>
			<h1><span class="tryout-title">Contact Name:</span> {{ ucwords($tryout->contact_name) }}</h1>
			<h1><span class="tryout-title">Contact Email:</span> {{ $tryout->contact_email }}</h1>
			
			@if ($tryout->description)
				<h1><span class="tryout-title">Description:</span> {{ $tryout->description }}</h1>
			@else
				<h1>No Additional Information Has Been Provided</h1>
			@endif
	@endforeach
		@if(Auth::user())
			@if(Auth::user()->id == $tryout->user_id)
				<div>
					<a href="/tryouts/{{$id}}/edit" class="btn btn-primary">Edit Post</a>
					<a href="/tryouts/{{$id}}/delete" class="btn btn-primary">Delete Post</a>
				</div>
			@else
				{!! Form::model($tryout, ['method' => 'POST', 'class' => 'form-horizontal', 'action' => ['TryoutsController@rsvp', $tryout->id]]) !!}

				<div class="form-group">
					<h3>{!! Form::label('rsvp', 'Do you plan on attending this tryout?', ['class'=> 'control-label', 'id' => 'rsvp']) !!}</h3>		
					{!! Form::submit('Yes', ['class'=> 'btn btn-primary', 'id' => 'rsvp']) !!}
				</div>
			{!! Form::close() !!}
			@endif
		@else
			{!! Form::model($tryout, ['method' => 'POST', 'class' => 'form-horizontal', 'action' => ['TryoutsController@rsvp', $tryout->id]]) !!}

				<div class="form-group">
					<h3>{!! Form::label('rsvp', 'Do you plan on attending this tryout?', ['class'=> 'control-label', 'id' => 'rsvp']) !!}</h3>		
					{!! Form::submit('Yes', ['class'=> 'btn btn-primary', 'id' => 'rsvp']) !!}
				</div>
			{!! Form::close() !!}	
			
		@endif

		@if ($tryout->rsvp != null)
			<h3>{{ $tryout->rsvp }} people plan on attending this tryout.</h3>
		@endif
		
		</div>
	</div>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>	
	<script>
		var lat = {{ $tryout->lat }};
		var lng = {{ $tryout->lng }};

		function initialize() {
		  var myLatlng = new google.maps.LatLng(lat,lng);
		  var mapOptions = {
		    zoom: 10,
		    center: myLatlng
		  }
		  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		  var marker = new google.maps.Marker({
		      position: myLatlng,
		      map: map,
		      title: 'Hello World!'
		  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
		
	</script>
@endsection