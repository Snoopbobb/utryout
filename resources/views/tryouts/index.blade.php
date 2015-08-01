@extends('app')

@section('content')
	<div class="container">
	
	@if( count($tryouts) > 0 )
		<div class="seperator">
			@if(!empty($sport))
				<h1>{{ ucwords($sport) }} Tryouts</h1>
			@else
				<h1>All Tryouts</h1>
			@endif
		</div>
		
		<div id="map-canvas"></div>
		
		@foreach ($tryouts as $tryout)
			<div class="tryout .col-xs-6 .col-md-4">
				<span class="sport"><a href="{{ url('/tryouts/') . '/' . $tryout->sport }}">{{ $tryout->sport }}</a></span> <h3>{{ $tryout->organization }} | Ages: {{ $tryout->age }}U | {{ date('D F d, Y', strtotime($tryout->date)) }}, {{ date('g:i A', strtotime($tryout->time)) }} | {{ ucwords($tryout->city) }}, {{ $tryout->state }}</h3>
				<a href="{{ url('/tryouts/') . '/' . $tryout->sport . '/' . strtolower($tryout->state) . '/' . seoUrl(strtolower($tryout->city)) . '/'  .   $tryout->id . '/' . seoUrl(strtolower($tryout->organization))}}">Additional Information</a>
			</div>
		@endforeach
	@else
			@if(!empty($sport))
				<h1>We're Sorry There Are No Upcoming {{ ucwords($sport) }} Tryouts
			@else
				<h1>We're Sorry There Are No Upcoming Tryouts
			@endif 

			@if(!empty($state))
				in {{ strtoupper($state) }}
			@endif 

			Posted, Please Check Back Soon!</h1>
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
	    
	    for(i in locations)
		{
    		var address = locations[i].address;
    		var lat = locations[i].lat;
    		var lng = locations[i].lng;
    		var url = 'tryouts/' + locations[i].sport + '/' + locations[i].city.replace(/\s+/g, '-').toLowerCase() + '/' + locations[i].id + '/' + locations[i].organization.replace(/\s+/g, '-').toLowerCase();

    		var marker = new google.maps.Marker({
		        position: new google.maps.LatLng(lat, lng),
		        address: address,
		        map: map,
		        url: url
		    });

		    google.maps.event.addListener(marker, 'click', function() {
    			window.location.href = this.url;
			});
			
		}
  </script>
@endsection