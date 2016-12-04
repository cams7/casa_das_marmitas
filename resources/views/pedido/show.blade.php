@extends('layouts.master')
@section('title', 'Visualiza Pedido')

@section('jquery_content')
@endsection

@section('content')	
	<h3 class="page-header">{{'Visualizar Pedido #'.$pedido->id}}</h3>

	<div class="row">
		<div class="col-md-6">
      		<p><strong>Cliente:</strong></p>
  	  		<p>{{ $pedido->cliente->nome }}</p>
    	</div>
    	<div class="col-md-2">
      		<p><strong>Taxa:</strong></p>
  	  		<p>{{ $pedido->taxa->getTaxa() }}</p>
    	</div>
    	<div class="col-md-4">
      		<p><strong>Situação:</strong></p>
  	  		<p>{{ $pedido->getSituacao() }}</p>
    	</div>
	</div>

	<div class="row">
		<div class="col-md-4">
      		<p><strong>Quantidade total:</strong></p>
  	  		<p>{{ $pedido->quantidade_total }}</p>
    	</div>
    	<div class="col-md-4">
      		<p><strong>Custo total:</strong></p>
  	  		<p>{{ $pedido->getCustoTotal() }}</p>
    	</div>
    	<div class="col-md-4">
      		<p><strong>Cadastro:</strong></p>
  	  		<p>{{ $pedido->getCadastro() }}</p>
    	</div>
	</div>

	<hr />
 	<div id="actions" class="row">
   		<div class="col-md-12">     		
	 		<a href="{{ URL::to('pedido/' . $pedido->id . '/edit') }}" class="btn btn-warning">Alterar</a>
	 		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Excluir</a>
	 		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
   		</div>
 	</div>

	<hr />
	<div id="list" class="row"> 		
		<div class="table-responsive col-md-12">
			<table class="table table-striped" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Quantidade</th>
	            		<th>Custo</th>
	            		<th>Produto</th>
						<th class="actions">Ações</th>
					</tr>
				</thead>
				<tbody>
	    		@foreach($pedido->itens as $i => $item)
	    			<tr>
	            		<td>{{ $item->quantidade }}</td>
	            		<td>{{ $item->produto->getCusto() }}</td>
	            		<td>{{ $item->produto->nome }}</td>
	            		<td class="actions">
							<a class="btn btn-success btn-xs" href="{{ URL::to('pedido_item/' . $item->id) }}">Visualizar</a>
							<a class="btn btn-warning btn-xs" href="{{ URL::to('pedido_item/' . $item->id . '/edit') }}">Alterar</a>
							<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
						</td>
	            	</tr>	
	    		@endforeach
	    		</tbody>
			</table>
		</div>
	</div><!-- /#list -->    
@endsection