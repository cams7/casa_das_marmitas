@extends('layouts.master')
@section('title', 'Visualiza Pedido')

@section('content')	
	<h3 class="page-header">{{'Visualizar Pedido #'.$pedido->id}}</h3>

  <input type="hidden" id="pedido_id" value="{{$pedido->id}}">

	<div class="row">
		<div class="col-md-6">
      		<p><strong>Cliente:</strong></p>
  	  		<p><a href="{{ URL::to('cliente/' . $pedido->cliente->id) }}">{{ $pedido->cliente->nome }}</a></p>
    	</div>
    	<div class="col-md-2">
      		<p><strong>Taxa:</strong></p>
  	  		<p><a href="{{ URL::to('taxa/' . $pedido->taxa->id) }}">{{ $pedido->taxa->getTaxa() }}</a></p>
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

  <div class="content">
      @include('pedido.paginacao_itens')
  </div>
@endsection

@section('jquery_content')
  <script type="text/javascript">
        $(document).on('click', '.pagination a', event => {
            event.preventDefault();
            //console.log($(this).attr('href').split('page='));
            var page = event.target.href.split('page=')[1];
            getItens(page);
        });     

        function getItens(page) {
            pedidoId = $("#pedido_id").val(); 
            //console.log('getting pedidos for page = ' + page + ' and pedido_id = ' + pedidoId);   
            
            $.get('/paginacao/pedido_itens?page=' + page + '&pedido_id=' + pedidoId, data => {
                //console.log(data);
                $('.content').html(data);
               // location.hash = page;
            });         
        }  
    </script>
@endsection