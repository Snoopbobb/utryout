<!DOCTYPE html>
	<!-- 
	
		May the source be with you. 

	-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="publishable-key" content="pk_live_rj9Rhg6TBar9ZMp22jcc78n6">
	<title>Utryout | Youth Sports Tryouts</title>
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link href="{{ asset('adm/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('adm/css/vegas.css')}}" rel="stylesheet">
	<link href="{{ asset('adm/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('adm/css/main.css') }}" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">Utryout</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="{{ url('tryouts') }}">Sports<span class="caret"></span></a>
	          			<ul class="dropdown-menu">
	          				<li><a href="{{ url('tryouts') }}">All Tryouts</a></li>
	            			<li><a href="{{ url('tryouts/baseball') }}">Baseball</a></li>
	            			<li><a href="{{ url('tryouts/basketball') }}">Basketball</a></li>
	            			<li><a href="{{ url('tryouts/football') }}">Football</a></li>
	            			<li><a href="{{ url('tryouts/hockey') }}">Hockey</a></li>
	            			<li><a href="{{ url('tryouts/lacrosse') }}">Lacrosse</a></li>
	            			<li><a href="{{ url('tryouts/soccer') }}">Soccer</a></li>
	            			<li><a href="{{ url('tryouts/softball') }}">Softball</a></li>
	          			</ul>
	          		</li>
	          		<li><a href="{{ url('/search') }}">Browse Tryouts</a></li>
					<li><a href="{{ url('/how-it-works') }}" id="about">How It Works</a></li>
					<li><a href="{{ url('/contact') }}" id="contact">Contact Us</a></li>
					@if(Auth::user())
						<li><a href="{{ url('tryouts/create') }}" id="create">Post Tryout</a></li>
						<li><a href="{{ url('/profile') }}" id="profile">Your Tryouts</a></li>
					@endif
          		</ul>			
				

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}" class="">Login</a></li>
						<li><a href="{{ url('/auth/register') }}" class="">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<footer>
		<h6>Pictures courtesy of </h6>
		<h6>A <a href="http://30andb.com">Firestackd</a> Application &copy;{{ date('Y') }}</h6>
	</footer>

	
	<!-- Scripts -->
	<script src="{{ asset('/adm/js/admin.js') }}"></script>
	<script src="https://js.stripe.com/v2/"></script>
	<script src="{{ asset('/adm/js/main.js') }}"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-46721230-11', 'auto');
	  ga('send', 'pageview');
	</script>



	@yield('scripts')
</body>
</html>
