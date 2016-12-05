@extends('layouts.master')
@section('title', 'Lista de Empresas')

@section('content')
	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Empresas</h2>
		</div>
		<div class="col-sm-6">			
			<div class="input-group h2">
				<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Empresas">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			
		</div>
		<div class="col-sm-3">
			<a href="{{ URL::to('empresa/create') }}" class="btn btn-primary pull-right h2">Nova Empresa</a>
		</div>
	</div> <!-- /#top --> 
 
 	<hr />
 	
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif	

<div class="content">
	@include('empresa.pagination')
</div> 	
@endsection

@section('jquery_content')
	<script type="text/javascript">
		$(document).on('click', '.pagination a', function(e){
			e.preventDefault();
			//console.log($(this).attr('href').split('page='));
			var page = $(this).attr('href').split('page=')[1];
			getEmpresas(page);
		});

		function getEmpresas(page) {
			//console.log('getting empresas for page = ' + page);	

			$.ajax({
				url: '/ajax/empresa/pagination?page=' + page	
			}).done(function(data){
				//console.log(data);
				$('.content').html(data);
				location.hash = page;
			});
		}	
	</script>
@endsection