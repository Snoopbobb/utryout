@extends('app')

@section('content')
	<div class="container">
	
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
		  zoom: 8,
	      center: new google.maps.LatLng(lat, lng),
	      mapTypeId: google.maps.MapTypeId.ROADMAP,
	      scrollwheel: false,
	    });

	    var infowindow = new google.maps.InfoWindow();



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