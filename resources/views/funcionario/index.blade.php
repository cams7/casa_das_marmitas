@extends('layouts.master')
@section('title', 'Lista de Funcionários')

@section('jquery_content')
@endsection

@section('content')
	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Funcionários</h2>
		</div>
		<div class="col-sm-6">			
			<div class="input-group h2">
				<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Funcionários">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			
		</div>
		<div class="col-sm-3">
			<a href="{{ URL::to('funcionario/create') }}" class="btn btn-primary pull-right h2">Novo Funcionário</a>
		</div>
	</div> <!-- /#top --> 
 
 	<hr />
 	
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif	

 	<div id="list" class="row"> 		
		<div class="table-responsive col-md-12">
			<table class="table table-striped" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Nome</th>
	            		<th>E-mail</th>
	            		<th>Cargo</th>
						<th class="actions">Ações</th>
					</tr>
				</thead>
				<tbody>
	    		@foreach($funcionarios as $i => $funcionario)
	    			<tr>
	            		<td>{{ $funcionario->user->name }}</td>
	            		<td>{{ $funcionario->user->email }}</td>
	            		<td>{{ $funcionario->getCargo() }}</td>

	            		<td class="actions">
							<a class="btn btn-success btn-xs" href="{{ URL::to('funcionario/' . $funcionario->id) }}">Visualizar</a>
							<a class="btn btn-warning btn-xs" href="{{ URL::to('funcionario/' . $funcionario->id . '/edit') }}">Alterar</a>
							<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
						</td>
	            	</tr>	
	    		@endforeach
	    		</tbody>
			</table>
		</div>
	</div><!-- /#list -->

	<div id="bottom" class="row">
		<div class="col-md-12">
			<ul class="pagination">
				<li class="disabled"><a>&lt; Anterior</a></li>
				<li class="disabled"><a>1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
			</ul><!-- /.pagination -->
		</div>
	</div> <!-- /#bottom -->
@endsection