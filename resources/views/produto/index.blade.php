@extends('layouts.master')
@section('title', 'Lista de Produtos')

@section('content')
	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Produtos</h2>
		</div>
		<div class="col-sm-6">			
			<div class="input-group h2">
				<input name="data[search]" class="form-control" id="search_query" type="text" placeholder="Pesquisar Produtos">
				<input type="hidden" id="query" value="">
				<span class="input-group-btn">
					<button id="search_btn" class="btn btn-primary" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			
		</div>
		<div class="col-sm-3">
			<a href="{{ URL::to('produto/create') }}" class="btn btn-primary pull-right h2">Novo Produto</a>
		</div>
	</div> <!-- /#top --> 
 
 	<hr />
 	
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif	

<div class="content">
	@include('produto.paginacao')
</div> 	
@endsection

@section('jquery_content')
	<script type="text/javascript">
		$(document).on('click', '.pagination a', event => {
            event.preventDefault();
			//console.log($(this).attr('href').split('page='));
			var page = event.target.href.split('page=')[1];
			getProdutos(page);
		});

		$(document).on('click', '#search_btn', event => {
			event.preventDefault();
			$("#query").val($("#search_query").val());
			getProdutos(1);
		});

		function getProdutos(page) {
			loadPage('produtos', page);		
		}		
	</script>
@endsection