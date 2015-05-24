<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Utryout</title>
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link href="{{ asset('adm/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('adm/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('adm/css/main.css') }}" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Utryout</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Tryouts<span class="caret"></span></a>
	          			<ul class="dropdown-menu">
	            			<li><a href="{{ url('tryouts/baseball') }}">Baseball</a></li>
	            			<li><a href="{{ url('tryouts/basketball') }}">Basketball</a></li>
	            			<li><a href="{{ url('tryouts/football') }}">Football</a></li>
	            			<li><a href="{{ url('tryouts/soccer') }}">Soccer</a></li>
	            			<li><a href="{{ url('tryouts/softball') }}">Softball</a></li>
	          			</ul>
	          		</li>
					<li><a href="/about" id="about">About</a></li>
					<li><a href="/contact" id="contact">Contact</a></li>
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
		<div class="footer-left">
			<h6>Photo Courtesy: <a href="#">Mette McConnell</a></h4>
		</div>
		<div class="footer-right">
			<h6>An <a href="#">AthleTech Software</a> Application &copy;{{ date('Y') }}</h4>
		</div>
	</footer>
	<!-- Scripts -->
	<script src="{{ asset('/adm/js/admin.js') }}"></script>
	<script src="{{ asset('/adm/js/main.js') }}"></script>
</body>
</html>
