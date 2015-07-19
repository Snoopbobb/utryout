@extends('app')

@section('content')
	<div class="container">
	
	@if( count($tryouts) > 0 )
		<div class="seperator">
			<h1>Search Results</h1>
		</div>
		
		<div id="map-canvas"></div>
		
		@foreach ($tryouts as $tryout)
			<div class="tryout .col-xs-6 .col-md-4">
				<span class="sport"><a href="{{ url('/tryouts/') . '/' . $tryout->sport }}">{{ $tryout->sport }}</a></span> <h3>{{ $tryout->organization }} | Ages: {{ $tryout->age }}U | {{ date('D F d, Y', strtotime($tryout->date)) }}, {{ date('g:i A', strtotime($tryout->time)) }} | {{ $tryout->city }}, {{ $tryout->state }}</h3>
				<a href="{{ url('/tryouts/') . '/' . $tryout->sport . '/' . strtolower($tryout->state) . '/' . seoUrl(strtolower($tryout->city)) . '/' .$tryout->id }}">Additional Information</a>
			</div>
		@endforeach
	@else
		<h1>We're sorry, we couldn't find any tryouts that meet that criteria. Please try a different criteria or try again later!</h1>
	@endif

	</div>

	<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>	
	<script>
		@if(isset($tryout))
			var lat = {{ $tryout->lat }};
			var lng = {{ $tryout->lng }};
		@endif

		var locations = <?php echo json_encode($tryouts); ?>;

	    var map = new google.maps.Map(document.getElementById('map-canvas'), {
	      zoom: 4,
	      center: new google.maps.LatLng(38.850033, -96.6500523),
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    });

	    var infowindow = new google.maps.InfoWindow();

	    var marker, i;
	    console.log(locations);
	    for(i in locations)
		{
    		var address1 = locations[i].address1;
    		var lat = locations[i].lat;
    		var lng = locations[i].lng;

    		marker = new google.maps.Marker({
	        position: new google.maps.LatLng(lat, lng),
	        map: map
	      });
		}
  </script>
@endsection