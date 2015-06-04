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
			
		@foreach ($tryouts as $tryout)
			<div class="tryout">
				<span class="sport"><a href="{{ url('/tryouts/') . '/' . $tryout->sport }}">{{ $tryout->sport }}</a></span> <h3>{{ $tryout->organization }} | Ages: {{ $tryout->age1 }} - {{ ucwords($tryout->age2) }} | {{ date('D F d, Y', strtotime($tryout->date)) }}, {{ date('g:i A', strtotime($tryout->time)) }} | {{ $tryout->city }}, {{ $tryout->state }}</h3>
				<a href="{{ url('/tryouts/') . '/' . $tryout->sport . '/' . strtolower($tryout->state) . '/' . seoUrl(strtolower($tryout->city)) . '/' .$tryout->id }}">Additional Information</a>
			</div>
		@endforeach
	@else
		<h1>We're Sorry There Are No Upcoming {{ ucwords($sport) }} Tryouts 

			@if(!empty($state))
				in {{ strtoupper($state) }}
			@endif 

			Posted, Please Check Back Soon!</h1>
	@endif

	</div>
@endsection