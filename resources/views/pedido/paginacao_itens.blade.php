@if ($itens->count() > 0)
    <h3 class="page-header">Itens do Pedido ({{$itens->total()}})</h3>

	<div id="list" class="row"> 		
		<div class="table-responsive col-md-12">
			<table class="table table-striped" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Quantidade</th>
	            		<th>Custo total</th>
	            		<th>Produto</th>
	            		<th>Tamanho</th>
	            		<th>Custo</th>
					</tr>
				</thead>
				<tbody>
	    		@foreach($itens as $i => $item)
	    			<tr>
	            		<td>{{ $item->quantidade }}</td>
	            		<td>{{ $item->produto->getCustoByQuantidade($item->quantidade) }}</td>
	            		<td><a href="{{ URL::to('produto/' . $item->produto->id) }}">{{ $item->produto->nome }}</a></td>
	            		<td>{{ $item->produto->getTamanho() }}</td>
	            		<td>{{ $item->produto->getCusto() }}</td>	            		
	            	</tr>	
	    		@endforeach
	    		</tbody>
			</table>
		</div>
	</div>

	<div id="bottom" class="row">
        <div class="col-md-12">
            {{$itens->appends(Request::only('pedido_id'))->links()}}
        </div>
    </div>	
@endif