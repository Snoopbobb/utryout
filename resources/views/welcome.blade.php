@extends('app')

@section('content')
		<div class="container">
			<div class="content">
			@if (session('status'))
			    <div class="alert alert-success">
			        {{ session('status') }}
			    </div>
			@endif
				<div class="title"><span class="utryout">U</span>tryout</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
				<h1><?php echo $tryoutsCount; ?> Tryouts Posted</h1>
				<!-- <h2><?php echo $alertsCount; ?> People Waiting For Tryouts In Their Area</h2> -->
				<h2><?php echo $searchCount; ?> Searching For Tryouts</h2>
				<h2>Parents, find youth sports teams looking for players in your area!</h2>
				<h2>Coaches, let parents know you're looking for players today!</h2>
				<a href="search" class="btn btn-lg">Player/Parent</a>
				@if (Auth::guest())						
					<a href="{{ url('/utryout/auth/register') }}" class="btn btn-lg">Coach/Organization</a></li>
				@else
					<a href="{{ url('/utryout/tryouts/create') }}" class="btn btn-lg">View Posts</a></li>
				@endif
				<div class="center">
					<a href="{{url('/utryout/how-it-works') }}" class="btn">How It Works</a>
				</div>
			</div>
		</div> 
@endsection

