@extends('layouts.master')
@section('title', 'Editar Entregador')

@section('jquery_content')	
@endsection

@section('content')
	<h3 class="page-header">{{'Editar Entregador #'.$entregador->id}}</h3>

	@include('layouts.errors')

	{{ Form::model($entregador, array('route' => array('entregador.update', $entregador->id), 'method' => 'PUT')) }}
	    @include('entregador.form_fields')

	    <hr />
	    <div id="actions" class="row">
	  		<div class="col-md-12">
	    		{{ Form::submit('Alterar', array('class' => 'btn btn-primary')) }}
	    		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection