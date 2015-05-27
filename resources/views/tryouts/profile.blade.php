@extends('app')

@section('content')
	<div class="container">
		<h1>Your Posted Tryouts</h1>

		@foreach ($tryouts as $tryout)
			<div class="tryout">
				<span class="sport"><a href="/tryouts/{{ $tryout->sport }}">{{ $tryout->sport }}</a></span> <h3>{{ $tryout->organization }} | Ages: {{ $tryout->age1 }} - {{ $tryout->age2 }} | {{ date('D F d, Y', strtotime($tryout->date)) }}, {{ date('g:i A', strtotime($tryout->time)) }} | {{ $tryout->city }}, {{ $tryout->state }}</h3>
				<a href="/tryouts/{{ $tryout->id }}">Additional Information</a>
			</div>
		@endforeach

	</div>
@endsection