@extends('app')

@section('content')
	<h1>Tryouts</h1>

	@foreach ($tryouts as $tryout)
		<h3>Organization: {{ $tryout->organization }}</h3>
		<h3>Website: {{ $tryout->website }}</h3>
		<h3>Contact Name: {{ $tryout->contact_name }}</h3>
		<h3>Contact Email: {{ $tryout->contact_email }}</h3>
		<h3>Age Group: {{ $tryout->age }} and under</h3>
		<h3>Date: {{ $tryout->date }}</h3>
		<h3>Time: {{ $tryout->time }}</h3>
		<h3>Location: {{ $tryout->location }}</h3>
		<h3>City: {{ $tryout->city }}</h3>
		<h3>State: {{ $tryout->state }}</h3>
		<p>Additional Information: {{ $tryout->description }}</p>
	@endforeach

@endsection