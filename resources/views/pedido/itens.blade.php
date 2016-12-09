@if ($itens != null && count($itens) > 0)
    <h3 class="page-header">Itens do Pedido ({{count($itens)}})</h3>

	<div id="list" class="row"> 		
		<div class="table-responsive col-md-12">
			<table class="table table-striped" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Quantidade</th>
	            		<th>Custo</th>
	            		<th>Produto</th>
	            		<th>Tamanho</th>
						<th class="actions">Ações</th>
					</tr>
				</thead>
				<tbody>
	    		@foreach($itens as $i => $item)
	    			<tr>
	            		<td>{{ $item->quantidade }}</td>
	            		<td>{{ $item->produto->getCustoByQuantidade($item->quantidade) }}</td>
	            		<td><a href="{{ URL::to('produto/' . $item->produto->id) }}">{{ $item->produto->nome }}</a></td>
	            		<td>{{ $item->produto->getTamanho() }}</td>
	            		<td class="actions">
							<button class="btn btn-warning btn-xs item-updade" value="{{$item->id != null ? $item->id : ('produto/'.$item->produto->id)}}">Alterar</button>
							<button class="btn btn-danger btn-xs item-delete" value="{{$item->id != null ? $item->id : ('produto/'.$item->produto->id)}}">Excluir</button>
						</td>
	            	</tr>	
	    		@endforeach
	    		</tbody>
			</table>
		</div>
	</div>	
@endif