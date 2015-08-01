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
				<span class="sport"><a href="{{ url('/tryouts/') . '/' . $tryout->sport }}">{{ $tryout->sport }}</a></span> <h3> 
				
				@if ($tryout->distance > 0)
					Distance: {{ round($tryout->distance, 1) }} miles | 
				@endif

					{{ $tryout->organization }} | Ages: {{ $tryout->age }}U | {{ date('D F d, Y', strtotime($tryout->date)) }}, {{ date('g:i A', strtotime($tryout->time)) }} | {{ ucwords($tryout->city) }}, {{ $tryout->state }}</h3>
				<a href="{{ url('/tryouts/') . '/' . $tryout->sport . '/' . strtolower($tryout->state) . '/' . seoUrl(strtolower($tryout->city)) . '/'  .   $tryout->id . '/' . seoUrl(strtolower($tryout->organization))}}">Additional Information</a>

			</div>
		@endforeach
	@else
		<h1>We're sorry, we couldn't find any tryouts that meet that criteria. Please try a different criteria or try again later!</h1>
	@endif
	
	</div>
@endsection

@section('scripts')
	<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>	
	<script>
		@if(isset($tryout))
			var lat = {{ $tryout->lat }};
			var lng = {{ $tryout->lng }};
		@else
			var lat = 38.850033;
			var lng = -96.6500523;
		@endif

		var locations = <?php echo json_encode($tryouts); ?>;

	    var map = new google.maps.Map(document.getElementById('map-canvas'), {
		  zoom: 10,
	      center: new google.maps.LatLng(lat, lng),
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    });

	    var infowindow = new google.maps.InfoWindow();

	    var marker, i;
	    for(i in locations)
		{
    		var address = locations[i].address;
    		var lat = locations[i].lat;
    		var lng = locations[i].lng;
    		var url = locations[i].sport + '/' + locations[i].city.replace(/\s+/g, '-').toLowerCase() + '/' + locations[i].id + '/' + locations[i].organization.replace(/\s+/g, '-').toLowerCase();

    		var marker = new google.maps.Marker({
		        position: new google.maps.LatLng(lat, lng),
		        address: address,
		        map: map,
		        url: url
		    });

		    google.maps.event.addListener(marker, 'click', function() {
    			window.location.href = 'http://utryout.com/tryouts/' + this.url;
			});

			console.log(url);
			
		}
  </script>
  @endsection