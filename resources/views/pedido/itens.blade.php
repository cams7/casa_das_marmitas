@if ($itens != null && $itens->count() > 0)
    <h3 class="page-header">Itens do Pedido</h3>

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
	    		@foreach($itens as $i => $item)
	    			<tr>
	            		<td>{{ $item->quantidade }}</td>
	            		<td>{{ $item->produto->getCusto() }}</td>
	            		<td><a href="{{ URL::to('produto/' . $item->produto->id) }}">{{ $item->produto->nome }}</a></td>
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
@endif