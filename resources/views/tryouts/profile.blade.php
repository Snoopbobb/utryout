@extends('app')

@section('content')
	<div class="container">
		<div class="seperator">
			<h1>{{ Auth::user()->username }}'s Posted Tryouts</h1>
		</div>
		@if ( count($tryouts) > 0 )
			@foreach ($tryouts as $tryout)
				<div class="tryout">
					<span class="sport"><a href="/tryouts/{{ $tryout->sport }}">{{ $tryout->sport }}</a></span> <h3>{{ $tryout->organization }} | Ages: {{ $tryout->age }}U | {{ date('D F d, Y', strtotime($tryout->date)) }}, {{ date('g:i A', strtotime($tryout->time)) }} | {{ $tryout->city }}, {{ $tryout->state }}</h3>
					<a href="{{ url('/tryouts/') . '/' . $tryout->sport . '/' . strtolower($tryout->state) . '/' . seoUrl(strtolower($tryout->city)) . '/' .$tryout->id }}">Additional Information</a>
				</div>
			@endforeach
				<a href="tryouts/create" class="btn">Post Another Tryout</a>
		@else
			<a href="tryouts/create" class="btn">Post A Tryout</a>
		@endif
	</div>
@endsection