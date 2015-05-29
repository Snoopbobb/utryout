@extends('app')

@section('content')
	<div class="container">
	
	 @foreach ($tryouts as $tryout)
		<div class="tryout">
			<h1>{{ $tryout->organization }}</h1>
			<h1>{{ $tryout->sport }}</h1>
			<h1>{{ $tryout->age1 }} - {{ $tryout->age2 }}</h1>
			<h1>{{ $tryout->date }}</h1>
			<h1>{{ $tryout->time }}</h1>
			<h1>{{ $tryout->location }}</h1>
			<h1>{{ $tryout->city }}</h1>
			<h1>{{ $tryout->state }}</h1>
			<h1>{{ $tryout->description }}</h1>
		</div>
	@endforeach

	</div>
@endsection