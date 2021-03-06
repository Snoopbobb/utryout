@extends('app')

@section('content')
	<div class="container">
		  
		@if (Session::get('message'))
				<div class="alert alert-success">
					<strong>Success!</strong> Thank you for posting your tryout!<br><br>

					<ul>										
						<li>{{ Session::get('message') }}</li>										
					</ul>
				</div>
		@endif
		<div class="seperator">
			<h1>{{ Auth::user()->username }}'s Posted Tryouts</h1>
		</div>
		@if ( count($tryouts) > 0 )
			@foreach ($tryouts as $tryout)
				<div class="tryout">
					<span class="sport"><a href="/tryouts/{{ $tryout->sport }}">{{ $tryout->sport }}</a></span> <h3>{{ $tryout->organization }} | Ages: {{ $tryout->age }}U | {{ date('D F d, Y', strtotime($tryout->date)) }}, {{ date('g:i A', strtotime($tryout->time)) }} | {{ $tryout->city }}, {{ $tryout->state }}</h3>
					<a class="btn btn-content" href="{{ url('/tryouts/') . '/' . $tryout->sport . '/' . strtolower($tryout->state) . '/' . seoUrl(strtolower($tryout->city)) . '/' . $tryout->id . '/' . seoUrl(strtolower($tryout->organization)) }}">Review The Tryout</a>
					<a class="btn btn-content" href="/tryouts/{{$tryout->id}}/edit">Edit Information</a>
				</div>
			@endforeach
				<a href="tryouts/create" class="btn">Post Another Tryout</a>
		@else
			<a href="tryouts/create" class="btn">Post A Tryout</a>
		@endif
	</div>
@endsection