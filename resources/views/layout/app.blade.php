<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Penjadwalan</title>
	<link rel="stylesheet"  href="/css/app.css">

</head>
<body>
	
	@include('inc.navbar')

	<div class="container">
		@if(Request::is('/'))
		@include('inc.showcase')
		@endif
	<div class="row">
		<div class="col-md-8 col-lg-8">
			@include('inc.messages')
			@yield('content')
			<!-- {{Auth::check() ? 'logged in':'logged out'}} -->
		</div>
		<div class="col-md-4 col-lg-4">
			
			@include('inc.sidebarhome')
			
		</div>
	</div>
	</div>
	<footer style="color:white; background: black; text-align: center;margin-top: 60px; padding: 20px">
		<p>Copyright 2020 &copy; Gereja</p>
	</footer>	
</body>
</html>