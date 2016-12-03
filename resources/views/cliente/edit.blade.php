@extends('layouts.master')
@section('title', 'Altera cliente')

@section('jquery_content')
	<script src="{{ URL::asset('js/ui.datepicker-pt-BR.js') }}"></script>
	<script>
  	jQuery(function($){
    	$("#nascimento").datepicker();
  	});  
  	</script>
@endsection

@section('sidebar')
	@include('cliente.menu')
@endsection

@section('content')	
	@include('layouts.errors')

	{{ Form::model($cliente, array('route' => array('cliente.update', $cliente->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
	    @include('cliente.form_fields')

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Altera', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection