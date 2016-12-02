<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <!--meta http-equiv="X-UA-Compatible" content="IE=edge"-->
    <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
	<title>@yield('title')</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"-->

	<!-- Latest compiled and minified JavaScript -->
	<!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script-->

	<!--script src="http://code.jquery.com/jquery-1.10.1.min.js"></script-->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">	
  	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  	<script src="https://github.com/digitalBush/jquery.maskedinput/blob/master/dist/jquery.maskedinput.min.js"></script>
  	<!--script src="https://github.com/igorescobar/jQuery-Mask-Plugin/blob/master/dist/jquery.mask.min.js"></script-->

  	@yield('head')
</head>
<body>	
	<div class="container">
		<nav class="navbar navbar-inverse">
			@section('sidebar')
				<div class="navbar-header">
        			<a class="navbar-brand" href="{{ URL::to('/') }}">Home</a>
    			</div>	
			@show
		</nav>	
	
		@yield('content')
	</div>
</body>
</html>