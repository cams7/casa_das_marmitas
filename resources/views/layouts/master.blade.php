
<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

  	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">	
  	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  	<script src="https://github.com/digitalBush/jquery.maskedinput/blob/master/dist/jquery.maskedinput.min.js"></script>
  
  	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/casa_das_marmitas.css') }}">

  	@yield('jquery_content')
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
	    	@include('layouts.header')
	  	</div>
	</nav>
	  
	<div class="container-fluid text-center">    
		<div class="row content">
	    	<div class="col-sm-2 sidenav">      		
	      		@yield('sidebar')
	    	</div>
	    	<div class="col-sm-10 text-left">
	    		<h1>@yield('title')</h1>

				<!-- will be used to show any messages -->
				@if (Session::has('message'))
				    <div class="alert alert-info">{{ Session::get('message') }}</div>
				@endif
	    	 
	      		@yield('content')
	    	</div>	    	
	  	</div>
	</div>

	<footer class="container-fluid text-center">
  		@include('layouts.footer')
	</footer>
</body>
</html>
