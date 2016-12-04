@extends('layouts.master')
@section('title', 'Visualiza Funcionário')

@section('jquery_content')
@endsection

@section('content')
	<h3 class="page-header">{{'Visualizar Funcionário #'.$funcionario->id}}</h3>

	<div class="row">
		<div class="col-md-6">
      		<p><strong>Nome:</strong></p>
  	  		<p>{{ $funcionario->user->name }}</p>
    	</div>
    	<div class="col-md-4">
      		<p><strong>E-mail:</strong></p>
  	  		<p>{{ $funcionario->user->email }}</p>
    	</div>
    	<div class="col-md-2">
      		<p><strong>Cargo:</strong></p>
  	  		<p>{{ $funcionario->getCargo() }}</p>
    	</div>
	</div>	

	<hr />
 	<div id="actions" class="row">
   		<div class="col-md-12">     		
	 		<a href="{{ URL::to('funcionario/' . $funcionario->id . '/edit') }}" class="btn btn-warning">Alterar</a>
	 		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Excluir</a>
	 		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
   		</div>
 	</div>
@endsection