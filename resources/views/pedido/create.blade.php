@extends('layouts.master')
@section('title', 'Adicionar Pedido')

@section('content')
	<h3 class="page-header">Adicionar Pedido</h3>

	{{ Form::open(array('url' => 'pedido')) }}
	    @include('pedido.form_fields')

	    <hr />
	    <div id="actions" class="row">
	  		<div class="col-md-12">
	  			<a id="item_add" href="#" class="btn btn-success">Novo Item</a>
	  			<a id="itens_refresh" href="#" class="btn btn-default">Atualizar Itens</a>
	    		{{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
	    		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}

	<div class="content">
  		@include('pedido.itens', ['itens' => $itens])
  	</div>

	@include('pedido.modal_item')		
@endsection