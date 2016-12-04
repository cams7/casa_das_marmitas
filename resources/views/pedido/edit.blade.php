@extends('layouts.master')
@section('title', 'Editar Pedido')

@section('content')
	<h3 class="page-header">{{'Editar Predido #'.$pedido->id}}</h3>

	@include('layouts.errors')

	{{ Form::model($pedido, array('route' => array('pedido.update', $pedido->id), 'method' => 'PUT')) }}
	    @include('pedido.form_fields')

	    <hr />
	    <div id="actions" class="row">
	  		<div class="col-md-12">
	    		{{ Form::submit('Alterar', array('class' => 'btn btn-primary')) }}
	    		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection