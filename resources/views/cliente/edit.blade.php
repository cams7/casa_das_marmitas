@extends('layouts.master')
@section('title', 'Editar Cliente')

@section('jquery_content')
	<script src="{{ URL::asset('js/ui.datepicker-pt-BR.js') }}"></script>
	<script>
  		jQuery(function($){
    		$("#nascimento").datepicker();
  		});  
  	</script>
@endsection

@section('content')
	<h3 class="page-header">{{'Editar Cliente #'.$cliente->id}}</h3>

	@include('layouts.errors')

	{{ Form::model($cliente, array('route' => array('cliente.update', $cliente->id), 'method' => 'PUT')) }}
	    @include('cliente.form_fields')

	    <hr />
	    <div id="actions" class="row">
	  		<div class="col-md-12">
	    		{{ Form::submit('Alterar', array('class' => 'btn btn-primary')) }}
	    		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection