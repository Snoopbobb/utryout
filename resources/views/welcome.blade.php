@extends('app')

@section('content')
		<div class="container">
			<div class="content animated fadeIn">
				<div class="title">Utryout</div>
				<h2>Youth Sports Tryouts In Your Area</h2>
				<div class="quote">{{ Inspiring::quote() }}</div>
				<a href="search" class="btn btn-lg">Player/Parent</a>
				@if (Auth::guest())					
					<a href="{{ url('/auth/register') }}" class="btn btn-lg">Coach/Organization</a></li>
				@else
					<a href="{{ url('/tryouts/create') }}" class="btn btn-lg">View Posts</a></li>
				@endif
				<div class="center">
					<a href="{{url('/how-it-works') }}" class="btn">How It Works</a>
				</div>
			</div>
		</div> 
@endsection

