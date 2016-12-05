<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>
  	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/casa_das_marmitas.css') }}"> 
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ URL::asset('js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.maskMoney.js') }}"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	 	  	  
  	<script src="{{ URL::asset('js/casa_das_marmitas.js') }}"></script> 
    
    @yield('jquery_content')     	
</head>
<body>
	@include('layouts.header')

	<!-- Modal -->
	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        			<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
      			</div>
      			<div class="modal-body">Deseja realmente excluir este item?</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-primary">Sim</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
     	 		</div>
    		</div>
  		</div>
	</div>		
	  
	 <div id="main" class="container-fluid" style="margin-top: 50px">
	    @yield('content')
	 </div><!-- /#main -->

	 <!--footer class="container-fluid text-center">
  	 @include('layouts.footer')
	 </footer-->
</body>
</html>
