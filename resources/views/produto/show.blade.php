@extends('layouts.master')
@section('title', 'Visualizar Produto')

@section('jquery_content')
@endsection

@section('content')
	<h3 class="page-header">{{'Visualizar Produto #'.$produto->id}}</h3>

	<div class="row">
		<div class="col-md-6">
      		<p><strong>Nome:</strong></p>
  	  		<p>{{ $produto->nome }}</p>
    	</div>
    	<div class="col-md-2">
      		<p><strong>Custo:</strong></p>
  	  		<p>{{ $produto->getCusto() }}</p>
    	</div>
    	<div class="col-md-4">
      		<p><strong>Tamanho:</strong></p>
  	  		<p>{{ $produto->getTamanho() }}</p>
    	</div>
	</div>

	<div class="row">
    	<div class="col-md-12">
      		<p><strong>Ingredientes:</strong></p>
  	  		<p>{{ $produto->ingredientes }}</p>
    	</div>
    </div>

	<hr />
 	<div id="actions" class="row">
   		<div class="col-md-12">     		
	 		<a href="{{ URL::to('produto/' . $produto->id . '/edit') }}" class="btn btn-warning">Alterar</a>
	 		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Excluir</a>
	 		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
   		</div>
 	</div>

@if ($produto->itensPedido->count() > 0)
  <h3 class="page-header">Itens de Pedidos</h3>

  <div id="list" class="row">     
    <div class="table-responsive col-md-12">
      <table class="table table-striped" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th>Pedido</th>
            <th>Cliente</th>
            <th>Quantidade</th>
            <th class="actions">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($produto->itensPedido as $i => $item)
            <tr>  
              <td><a href="{{ URL::to('pedido/' . $item->pedido->id) }}">{{ $item->pedido->getCadastro() }}</a></td>
              <td><a href="{{ URL::to('cliente/' . $item->pedido->cliente->id) }}">{{ $item->pedido->cliente->nome }}</a></td>
              <td>{{ $item->quantidade }}</td>
              
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

  <div id="bottom" class="row">
    <div class="col-md-12">
      <ul class="pagination">
        <li class="disabled"><a>&lt; Anterior</a></li>
        <li class="disabled"><a>1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
      </ul><!-- /.pagination -->
    </div>
  </div> <!-- /#bottom -->
@endif
@endsection