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

		@if($count > 1)
			<h2>{{ $count }} Upcoming Tryouts Found</h2>
		@else
			<h2>{{ $count }} Upcoming Tryout Found</h2>
		@endif

		@foreach ($tryouts as $tryout)
			<div class="tryout .col-xs-6 .col-md-4">
				<span class="sport"><a href="{{ url('/tryouts/') . '/' . $tryout->sport }}">{{ $tryout->sport }}</a></span> <h3>{{ $tryout->organization }} | Ages: {{ $tryout->age }}U | {{ date('D F d, Y', strtotime($tryout->date)) }}, {{ date('g:i A', strtotime($tryout->time)) }} | {{ ucwords($tryout->city) }}, {{ $tryout->state }}</h3>
				<a href="{{ url('/tryouts/') . '/' . $tryout->sport . '/' . strtolower($tryout->state) . '/' . seoUrl(strtolower($tryout->city)) . '/'  .   $tryout->id . '/' . seoUrl(strtolower($tryout->organization))}}" class="btn btn-content">Additional Information</a>
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
			
			<a href="{{ url('/alerts') }}" class="btn btn-lg">Sign up for alerts</a>
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
	      mapTypeId: google.maps.MapTypeId.ROADMAP,
	      scrollwheel: false,
	    });

	    var marker, i;
	    @if(isset($tryout))
		    for(i in locations)
			{
	    		var address = locations[i].address;
	    		var lat = locations[i].lat;
	    		var lng = locations[i].lng;	    		

	    		var marker = new google.maps.Marker({
			        position: new google.maps.LatLng(lat, lng),
			        address: address,
			        map: map,
			    });

	    		// var url = '{{ url('/tryouts/') . '/' . $tryout->sport . '/' . strtolower($tryout->state) . '/' . seoUrl(strtolower($tryout->city)) . '/'  .   $tryout->id . '/' . seoUrl(strtolower($tryout->organization)) }}';
	    		var url = locations[i].sport + '/' + locations[i].state.replace(/\s+/g, '-').toLowerCase() + '/' + locations[i].city.replace(/\s+/g, '-').toLowerCase() + '/' + locations[i].id + '/' + locations[i].organization.replace(/\s+/g, '-').toLowerCase();

			    var content = 'Sport: ' + locations[i].sport + ' ' + 'Age: ' + locations[i].age + 'U ' + 'City: ' + locations[i].city + ' ' +  '<a href="{{ url('/tryouts') }}/' + url + '">' + 'View Tryout' + '</a>';

			    var infoWindow = new google.maps.InfoWindow;

			    google.maps.event.addListener(marker,'click', (function(marker,content,infoWindow){

	    			return function() {
	        			infoWindow.setContent(content);
	        			infoWindow.open(map,marker);
	    			};
				})(marker,content,infoWindow));	
			}
		@endif
  </script>
@endsection