@extends('layouts.master')
@section('title', 'Lista de Entregadores')

@section('jquery_content')
@endsection

@section('content')
	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Entregadores</h2>
		</div>
		<div class="col-sm-6">			
			<div class="input-group h2">
				<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Entregadores">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			
		</div>
		<div class="col-sm-3">
			<a href="{{ URL::to('entregador/create') }}" class="btn btn-primary pull-right h2">Novo Entregador</a>
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
	            		<th>Empresa</th>
	            		<th>CPF</th>
	            		<th>Celular</th>
						<th class="actions">Ações</th>
					</tr>
				</thead>
				<tbody>
	    		@foreach($entregadores as $i => $entregador)
	    			<tr>
	            		<td>{{ $entregador->nome }}</td>
	            		<td>{{ $entregador->empresa->nome }}</td>
	            		<td>{{ $entregador->getCpf() }}</td>
	            		<td>{{ $entregador->getCelular() }}</td>

	            		<td class="actions">
							<a class="btn btn-success btn-xs" href="{{ URL::to('entregador/' . $entregador->id) }}">Visualizar</a>
							<a class="btn btn-warning btn-xs" href="{{ URL::to('entregador/' . $entregador->id . '/edit') }}">Alterar</a>
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