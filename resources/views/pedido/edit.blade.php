@extends('layouts.master')
@section('title', 'Editar Pedido')

@section('content')
	<h3 class="page-header">{{'Editar Predido #'.$pedido->id}}</h3>

	{{ Form::model($pedido, array('route' => array('pedido.update', $pedido->id), 'method' => 'PUT')) }}
	    @include('pedido.form_fields')

	    <hr />
	    <div id="actions" class="row">
	  		<div class="col-md-12">
	  			<a id="item_add" href="#" class="btn btn-success">Novo Item</a>
	  			<a id="itens_refresh" href="#" class="btn btn-default">Atualizar Itens</a>
	    		{{ Form::submit('Alterar', array('class' => 'btn btn-primary')) }}
	    		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}

	<div class="content">
  		@include('pedido.itens', ['itens' => $itens])
  	</div>

  	@include('pedido.modal_item')
@endsection