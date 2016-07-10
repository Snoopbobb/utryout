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
				<h1><?php echo $tryoutsCount; ?> Youth Sports Tryouts Currently Posted</h1>
				<!-- <h2><?php echo $alertsCount; ?> People Waiting For Tryouts In Their Area</h2> -->
				<h2><?php echo $searchCount; ?> Visitors Seeking A Tryout In Their Area</h2>
				<h2>Search for tryouts happening in your area, or post yours today!</h2>
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

