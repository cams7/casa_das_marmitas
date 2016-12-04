@extends('layouts.master')
@section('title', 'Editar Produto')

@section('content')	
	<h3 class="page-header">{{'Editar Produto #'.$produto->id}}</h3>

	@include('layouts.errors')

	{{ Form::model($produto, array('route' => array('produto.update', $produto->id), 'method' => 'PUT')) }}
	    @include('produto.form_fields')

	    <hr />
	    <div id="actions" class="row">
	  		<div class="col-md-12">
	    		{{ Form::submit('Alterar', array('class' => 'btn btn-primary')) }}
	    		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection