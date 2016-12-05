@extends('layouts.master')
@section('title', 'Lista de Taxas')

@section('content')
	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Taxas</h2>
		</div>
		<div class="col-sm-6">			
			<div class="input-group h2">
				<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Taxas">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			
		</div>
		<div class="col-sm-3">
			<a href="{{ URL::to('taxa/create') }}" class="btn btn-primary pull-right h2">Nova Taxa</a>
		</div>
	</div> <!-- /#top --> 
 
 	<hr />
 	
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif	

<div class="content">
	@include('taxa.pagination')
</div> 	
@endsection

@section('jquery_content')
	<script type="text/javascript">
		$(document).on('click', '.pagination a', function(e){
			e.preventDefault();
			//console.log($(this).attr('href').split('page='));
			var page = $(this).attr('href').split('page=')[1];
			getTaxas(page);
		});

		function getTaxas(page) {
			//console.log('getting taxas for page = ' + page);	

			$.ajax({
				url: '/ajax/taxa/pagination?page=' + page	
			}).done(function(data){
				//console.log(data);
				$('.content').html(data);
				location.hash = page;
			});
		}	
	</script>
@endsection