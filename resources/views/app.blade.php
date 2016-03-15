<!DOCTYPE html>
	<!-- 
	
		May the source be with you. 

	-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1'/>
	<meta name="publishable-key" content="pk_live_rj9Rhg6TBar9ZMp22jcc78n6">

	@if ( empty($title) )
		<title>Utryout | Youth Sports Tryouts</title>
	@else 
		<title>Utryout | {{ $title }}</title>
	@endif

	<!-- @if ( empty($tryout->organization) )
		<title>Utryout | Youth Sports Tryouts</title>
	@elseif (isset($tryouts) && count($tryouts) > 1)
		<title>Utryout | Youth Sports Tryouts</title>
	@else 
		<title>Utryout | {{ $tryout->organization }}</title>
	@endif -->


	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link href="{{ asset('adm/css/font-awesome.min.css') }}" rel="stylesheet" >
	<link href="{{ asset('adm/css/animate.min.css') }}" rel="stylesheet">
	<link href="{{ asset('adm/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Lobster|Ubuntu' rel='stylesheet' type='text/css'>
	<link href="{{ asset('adm/css/main.css') }}" rel="stylesheet">
	<script src="//cdn.optimizely.com/js/3551381270.js"></script>
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
				<a class="navbar-brand" href="{{ url('/') }}"><span class="utryout">U</span>tryout</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
	          		<li><a href="{{ url('/search') }}"><i class="fa fa-search"></i>Search Tryouts</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="{{ url('tryouts') }}"><i class="fa fa-hourglass-start"></i>Upcoming Tryouts<span class="caret"></span></a>
	          			<ul class="dropdown-menu">
	          				<li><a href="{{ url('tryouts') }}">All</a></li>
	            			<li><a href="{{ url('tryouts/baseball') }}">Baseball</a></li>
	            			<li><a href="{{ url('tryouts/basketball') }}">Basketball</a></li>
	            			<li><a href="{{ url('tryouts/football') }}">Football</a></li>
	            			<li><a href="{{ url('tryouts/hockey') }}">Hockey</a></li>
	            			<li><a href="{{ url('tryouts/lacrosse') }}">Lacrosse</a></li>
	            			<li><a href="{{ url('tryouts/soccer') }}">Soccer</a></li>
	            			<li><a href="{{ url('tryouts/softball') }}">Softball</a></li>
	          			</ul>
	          		</li>
	          		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="{{ url('completed') }}"><i class="fa fa-hourglass-end"></i>Completed Tryouts<span class="caret"></span></a>
	          			<ul class="dropdown-menu">
	          				<li><a href="{{ url('completed') }}">All</a></li>
	            			<li><a href="{{ url('completed/baseball') }}">Baseball</a></li>
	            			<li><a href="{{ url('completed/basketball') }}">Basketball</a></li>
	            			<li><a href="{{ url('completed/football') }}">Football</a></li>
	            			<li><a href="{{ url('completed/hockey') }}">Hockey</a></li>
	            			<li><a href="{{ url('completed/lacrosse') }}">Lacrosse</a></li>
	            			<li><a href="{{ url('completed/soccer') }}">Soccer</a></li>
	            			<li><a href="{{ url('completed/softball') }}">Softball</a></li>
	          			</ul>
	          		</li>
	          		<li><a href="{{ url('/alerts') }}" id="about"><i class="fa fa-exclamation"></i>Sign Up For Alerts</a></li>
					<li><a href="{{ url('/how-it-works') }}" id="about"><i class="fa fa-question"></i>How It Works</a></li>
					<li><a href="{{ url('/contact') }}" id="contact"><i class="fa fa-envelope-o"></i>Contact Us</a></li>
					@if(Auth::user())
						<li><a href="{{ url('tryouts/create') }}" id="create"><i class="fa fa-clipboard"></i>Post Tryout</a></li>
						<li><a href="{{ url('/profile') }}" id="profile"><i class="fa fa-user"></i>Your Tryouts</a></li>
					@endif
          		</ul>			
				

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}" class=""><i class="fa fa-sign-in"></i>Login</a></li>
						<li><a href="{{ url('/auth/register') }}" class=""><i class="fa fa-pencil-square-o"></i>Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i>Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<footer>
		{{-- <h6>Photo courtesy of <a href="#">Mette McConnell</a></h6> --}}
		<h6><a href="https://www.facebook.com/utryout?fref=ts" style="color: white;">Like Us On <i class="fa fa-facebook"></i>acebook!</a></h6>
		<h6>A <a href="http://30andb.com" style="color: white;">Firestackd</a> Application &copy;{{ date('Y') }}</h6>
	</footer>

	
	<!-- Scripts -->
	
	<!-- cdn for modernizr, if you haven't included it already -->
	<script src="//cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
	<!-- polyfiller file to detect and load polyfills -->
	<script src="//cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
	<script>
	  webshims.setOptions('waitReady', false);
	  webshims.setOptions('forms-ext', {types: 'date'});
	  webshims.polyfill('forms forms-ext');
	</script>

	<script src="{{ asset('/adm/js/admin.js') }}"></script>
	<!-- <script src="//js.stripe.com/v2/"></script> -->
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
