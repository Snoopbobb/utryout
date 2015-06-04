@extends('app')

@section('content')
	<div class="container">
	
	 @foreach ($tryouts as $tryout)
	 	
		<div class="tryout individual-tryout">
			<div class="seperator">
				<h1>{{ ucwords($tryout->organization) }}</h1>
			</div>
			<h1><a href="http://{{ ucwords($tryout->website) }}">Visit {{ $tryout->organization }} Website</a></h1>
			<h1><span class="title">Sport:</span> {{ ucwords($tryout->sport) }}</h1>
			<h1><span class="title">Age:</span> {{ $tryout->age1 . 'U' }}</h1>
			<h1>{{ $tryout->age2 }}</h1>
			<h1>{{ $tryout->age3 }}</h1>
			<h1>{{ $tryout->age4 }}</h1>
			<h1>{{ $tryout->age5 }}</h1>
			<h1><span class="title">Date:</span> {{ date('D F d, Y', strtotime($tryout->date)) }}</h1>
			<h1><span class="title">Time:</span> {{ date('g:i A', strtotime($tryout->time)) }}</h1>
			<h1><span class="title">Location:</span> {{ ucwords($tryout->location) }}</h1>
			<h1><span class="title">City:</span> {{ ucwords($tryout->city) }}, {{ ucwords(stateName($tryout->state)) }}</h1>
			<h1><span class="title">Contact Name:</span> {{ ucwords($tryout->contact_name) }}</h1>
			<h1><span class="title">Contact Email:</span> {{ $tryout->contact_email }}</h1>
			
			@if ($tryout->description)
				<h1><span class="title">Description:</span> {{ $tryout->description }}</h1>
			@else
				<h1>No Additional Information Has Been Provided</h1>
			@endif
		</div>
	@endforeach
		@if(Auth::user())
			@if(Auth::user()->id == $tryout->user_id)
				<div>
					<a href="/tryouts/{{$id}}/edit" class="btn btn-primary">Edit Post</a>
				</div>
			@endif
		@endif
	</div>
@endsection