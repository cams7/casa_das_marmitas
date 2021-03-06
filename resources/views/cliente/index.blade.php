@extends('layouts.master')
@section('title', 'Lista de Clientes')

@section('content')
	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Clientes</h2>
		</div>
		<div class="col-sm-6">			
			<div class="input-group h2">
				<input name="data[search]" class="form-control" id="search_query" type="text" placeholder="Pesquisar Clientes">
				<input type="hidden" id="query" value="">
				<span class="input-group-btn">
					<button id="search_btn" class="btn btn-primary" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			
		</div>
		<div class="col-sm-3">
			<a href="{{ URL::to('cliente/create') }}" class="btn btn-primary pull-right h2">Novo Cliente</a>
		</div>
	</div> <!-- /#top --> 
 
 	<hr />
 	
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif	

<div class="content">
	@include('cliente.paginacao')
</div> 	
@endsection

@section('jquery_content')
	<script type="text/javascript">
		$(document).on('click', '.pagination a', event => {
			event.preventDefault();
			//console.log($(this).attr('href').split('page='));
			var page = event.target.href.split('page=')[1];
			getClientes(page);
		});

		$(document).on('click', '#search_btn', event => {
			event.preventDefault();
			$("#query").val($("#search_query").val());
			getClientes(1);
		});

		function getClientes(page) {
			loadPage('clientes', page);		
		}	
	</script>
@endsection