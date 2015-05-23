@extends('app')

@section('content')
		<div class="container">
			<div class="content animated fadeIn">
				<div class="title">Utryout</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
				<a href="search" class="btn btn-lg">Search</a>
				@if (Auth::guest())					
					<a href="{{ url('/auth/register') }}" class="btn btn-lg">Register</a></li>
				@else
					<a href="{{ url('/tryouts/create') }}" class="btn btn-lg">Post</a></li>
				@endif
			</div>
		</div> 
@endsection

