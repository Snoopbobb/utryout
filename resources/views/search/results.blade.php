@extends('app')

@section('content')
	<div class="container">
	
		<div class="seperator">
			<h1>Search Results</h1>
		</div>
		
		<div id="map-canvas"></div>
		
		@if($count > 1) 
			<h2>{{ $count }} Upcoming Tryouts Found</h2>
		@else
			<h2>{{ $count }} Upcoming Tryout Found</h2>
		@endif

		@foreach ($tryouts as $tryout)
			<div class="tryout .col-xs-6 .col-md-4">
				<span class="sport"><a href="{{ url('/tryouts/') . '/' . $tryout->sport }}">{{ $tryout->sport }}</a></span> <h3> 
				
				@if ($tryout->distance > 0)
					Distance: {{ round($tryout->distance, 1) }} miles | 
				@endif

					{{ $tryout->organization }} | Ages: {{ $tryout->age }}U | {{ date('D F d, Y', strtotime($tryout->date)) }}, {{ date('g:i A', strtotime($tryout->time)) }} | {{ ucwords($tryout->city) }}, {{ $tryout->state }}</h3>
				<a href="{{ url('/tryouts/') . '/' . $tryout->sport . '/' . strtolower($tryout->state) . '/' . seoUrl(strtolower($tryout->city)) . '/'  .   $tryout->id . '/' . seoUrl(strtolower($tryout->organization))}}" class="btn btn-content">Additional Information</a>

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
	      mapTypeId: google.maps.MapTypeId.ROADMAP,
	      scrollwheel: false,
	    });

	    var infowindow = new google.maps.InfoWindow();

	    var bounds = new google.maps.LatLngBounds();

	    @if(isset($tryout))
		    for(i in locations)
			{
	    		var address = locations[i].address;
	    		var lat = locations[i].lat;
	    		var lng = locations[i].lng;	    		
	    		
	    		var marker = new google.maps.Marker({
	    			bounds: bounds.extend(new google.maps.LatLng(lat, lng)),
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

		// Apply fitBounds
      	map.fitBounds(bounds);

		// var map = new google.maps.Map(document.getElementById('map-canvas'), { 
  //       mapTypeId: google.maps.MapTypeId.ROADMAP 
  //     });

  //     var bounds = new google.maps.LatLngBounds();

  //     var points = [
  //      	new google.maps.LatLng(51.22, 4.40),
  //      	new google.maps.LatLng(50.94, 3.13)
  //    ];

  //     // Extend bounds with each point
  //     for (var i = 0; i < points.length; i++) {
  //       bounds.extend(points[i]);
  //       new google.maps.Marker({position: points[i], map: map});
  //     }

  //     // Apply fitBounds
  //     map.fitBounds(bounds);
  </script>
  @endsection