@extends('layouts.master')
@section('title', 'Adicionar Entregador')

@section('content')
	<h3 class="page-header">Adicionar Entregador</h3>

	{{ Form::open(array('url' => 'entregador')) }}
	    @include('entregador.form_fields')

	    <hr />
	    <div id="actions" class="row">
	  		<div class="col-md-12">
	    		{{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
	    		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}	
@endsection