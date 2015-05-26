@extends('app')

@section('content')
	<div class="container">
			<h1>Tryouts</h1>

			@foreach ($tryouts as $tryout)
				<div class="tryout">
					<span class="sport">{{ $tryout->sport }}</span> <h3>{{ $tryout->organization }} | {{ $tryout->age }} and under | {{ date('D F d, Y', strtotime($tryout->date)) }}, {{ date('g:i A', strtotime($tryout->time)) }} | {{ $tryout->city }}, {{ $tryout->state }}</h3>
					<a href="/tryouts/{{ $tryout->id }}">Additional Information</a>
				</div>
			@endforeach
	</div>
@endsection