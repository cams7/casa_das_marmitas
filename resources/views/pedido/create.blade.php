@extends('layouts.master')
@section('title', 'Adicionar Pedido')

@section('content')
	<h3 class="page-header">Adicionar Pedido</h3>

  	@include('layouts.errors')

	{{ Form::open(array('url' => 'pedido')) }}
	    @include('pedido.form_fields')

	    <hr />
	    <div id="actions" class="row">
	  		<div class="col-md-12">
	    		{{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
	    		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}	
@endsection