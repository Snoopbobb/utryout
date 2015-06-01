@extends('app')

@section('content')
	<div class="container">
	
	 @foreach ($tryouts as $tryout)
		<div class="tryout">
			<h1>{{ ucwords($tryout->organization) }}</h1>
			<h1><a href="http://{{ ucwords($tryout->website) }}">Visit {{ $tryout->organization }} Website</a></h1>
			<h1>{{ ucwords($tryout->sport) }}</h1>
			<h1>{{ $tryout->age1 }} - {{ ucwords($tryout->age2) }}</h1>
			<h1>{{ date('D F d, Y', strtotime($tryout->date)) }}</h1>
			<h1>{{ date('g:i A', strtotime($tryout->time)) }}</h1>
			<h1>{{ ucwords($tryout->location) }}</h1>
			<h1>{{ ucwords($tryout->city) }}, {{ ucwords(stateName($tryout->state)) }}</h1>
			<h1>{{ ucwords($tryout->contact_name) }}</h1>
			<h1>{{ $tryout->contact_email }}</h1>
			@if ($tryout->description)
				<h1>{{ $tryout->description }}</h1>
			@else
				<h1>No Additional Information Has Been Provided</h1>
			@endif
		</div>
	@endforeach

	</div>
@endsection