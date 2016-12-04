@extends('layouts.master')
@section('title', 'Visualizar Taxa')

@section('jquery_content')
@endsection

@section('content')	
	<h3 class="page-header">{{'Visualizar Taxa #'.$taxa->id}}</h3>

	<div class="row">
		<div class="col-md-6">
      		<p><strong>Valor:</strong></p>
  	  		<p>{{ $taxa->getTaxa() }}</p>
    	</div>
    	<div class="col-md-6">
      		<p><strong>Tipo:</strong></p>
  	  		<p>{{ $taxa->getTipo() }}</p>
    	</div>    	
	</div>

	<hr />
 	<div id="actions" class="row">
   		<div class="col-md-12">     		
	 		<a href="{{ URL::to('taxa/' . $taxa->id . '/edit') }}" class="btn btn-warning">Alterar</a>
	 		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Excluir</a>
	 		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
   		</div>
 	</div>
@endsection