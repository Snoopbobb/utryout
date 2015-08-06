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
		<h2>We're sorry! We couldn't find any tryouts that matched your search this time. Please try again or check back later.</h2>
		{{-- 
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default register-panel">
				<div class="panel-heading"><h4>We're sorry! Your search didn't find anything this time. Please try again.</h4></div>
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
					<h4>Would you like to be alerted for tryouts posted in your area?</h4>
					<form class="form-horizontal" role="form" method="POST" action="TryoutsController@store">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email">
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('sport', 'Sport', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::select('sport', [
															'baseball' => 'Baseball',
															'basketball' => 'Basketball',
															'football' => 'Football',
															'hockey' => 'Hockey',
															'lacrosse' => 'Lacrosse',
															'soccer' => 'Soccer',
															'softball' => 'Softball'
															], null, ['class'=> 'form-control', 'id' => 'form-sport'] ) !!}
							</div>
						</div>

						<div class="form-group age">
							{!! Form::label('age', 'Please select an age group', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-7 btn-group">
								{!! Form::label('18', '18u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '18', null, ['class' => 'hidden', 'id' => '18']) !!}

								{!! Form::label('17', '17u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '17', null, ['class' => 'hidden', 'id' => '17']) !!}

								{!! Form::label('16', '16u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '16', null, ['class' => 'hidden', 'id' => '16']) !!}

								{!! Form::label('15', '15u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '15', null, ['class' => 'hidden', 'id' => '15']) !!}

								{!! Form::label('14', '14u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '14', null, ['class' => 'hidden', 'id' => '14']) !!}

								{!! Form::label('13', '13u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '13', null, ['class' => 'hidden', 'id' => '13']) !!}

								{!! Form::label('12', '12u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '12', null, ['class' => 'hidden', 'id' => '12']) !!}						

								{!! Form::label('11', '11u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '11', null, ['class' => 'hidden', 'id' => '11']) !!}

								{!! Form::label('10', '10u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '10', null, ['class' => 'hidden', 'id' => '10']) !!}

								{!! Form::label('9', '9u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '9', null, ['class' => 'hidden', 'id' => '9']) !!}

								{!! Form::label('8', '8u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '8', null, ['class' => 'hidden', 'id' => '8']) !!}

								{!! Form::label('7', '7u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '7', null, ['class' => 'hidden', 'id' => '7']) !!}

								{!! Form::label('6', '6u', ['class'=> 'btn btn-primary unchecked checkbox']) !!}
								{!! Form::checkbox('age', '6', null, ['class' => 'hidden', 'id' => '6']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('city', 'City', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('city', null, ['class'=> 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('state', 'State', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
									{!! Form::select('state', [
															'AL' => 'Alabama',
															'AK' => 'Alaska',
															'AZ' => 'Arizona',
															'AR' => 'Arkansas',
															'CA' => 'California',
															'CO' => 'Colorado',
															'CT' => 'Connecticut',
															'DE' => 'Delaware',
															'DC' => 'District of Columbia',
															'FL' => 'Florida',
															'GA' => 'Georgia',
															'HI' => 'Hawaii',
															'ID' => 'Idaho',
															'IL' => 'Illinois',
															'IN' => 'Indiana',
															'IA' => 'Iowa',
															'KS' => 'Kansas',
															'KY' => 'Kentucky',
															'LA' => 'Louisiana',
															'ME' => 'Maine',
															'MD' => 'Maryland',
															'MA' => 'Massachusetts',
															'MI' => 'Michigan',
															'MN' => 'Minnesota',
															'MS' => 'Mississippi',
															'MO' => 'Missouri',
															'MT' => 'Montana',
															'NE' => 'Nebraska',
															'NV' => 'Nevada',
															'NH' => 'New Hampshire',
															'NJ' => 'New Jersey',
															'NM' => 'New Mexico',
															'NY' => 'New York',
															'NC' => 'North Carolina',
															'ND' => 'North Dakota',
															'OH' => 'Ohio',
															'OK' => 'Oklahoma',
															'OR' => 'Oregon',
															'PA' => 'Pennsylvania',
															'RI' => 'Rhode Island',
															'SC' => 'South Carolina',
															'SD' => 'South Dakota',
															'TN' => 'Tennessee',
															'TX' => 'Texas',
															'UT' => 'Utah',
															'VT' => 'Vermont',
															'VA' => 'Virginia',
															'WA' => 'Washington',
															'WV' => 'West Virginia',
															'WI' => 'Wisconsin',
															'WY' => 'Wyoming'
															], null, ['class'=> 'form-control', 'id' => 'form-state'] ) !!}
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Sign up for alerts</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div> --}}
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