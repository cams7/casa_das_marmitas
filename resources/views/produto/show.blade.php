@extends('layouts.master')
@section('title', 'Visualizar Produto')

@section('content')
	<h3 class="page-header">{{'Visualizar Produto #'.$produto->id}}</h3>

  <input type="hidden" id="produto_id" value="{{$produto->id}}">

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

    <div class="content">
        @include('produto.paginacao_itens')
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
            produtoId = $("#produto_id").val(); 
            //console.log('getting pedidos for page = ' + page + ' and produto_id = ' + produtoId);   
            
            $.get('/paginacao/produto_itens?page=' + page + '&produto_id=' + produtoId, data => {
                //console.log(data);
                $('.content').html(data);
               // location.hash = page;
            });         
        }  
    </script>
@endsection