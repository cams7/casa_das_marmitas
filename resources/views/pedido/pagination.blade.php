@if ($pedidos->count() > 0)
	<div id="list" class="row"> 		
		<div class="table-responsive col-md-12">
			<table class="table table-striped" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Cliente</th>
						<th>Telefone</th>
	            		<th>Quantidade total</th>
	            		<th>Custo total + Taxa</th>
	            		<th>Situação</th>
						<th class="actions">Ações</th>
					</tr>
				</thead>
				<tbody>
	    		@foreach($pedidos as $i => $pedido)
	    			<tr>
	            		<td><a href="{{ URL::to('cliente/' . $pedido->cliente->id) }}">{{ $pedido->cliente->nome }}</a></td>
	            		<td>{{ $pedido->cliente->getTelefone() }}</td>
	            		<td>{{ $pedido->quantidade_total }}</td>
	            		<td>{{ $pedido->getCustoTotal() }}</td>
	            		<td>{{ $pedido->getSituacao() }}</td>

	            		<td class="actions">
							<a class="btn btn-success btn-xs" href="{{ URL::to('pedido/' . $pedido->id) }}">Visualizar</a>
							<a class="btn btn-warning btn-xs" href="{{ URL::to('pedido/' . $pedido->id . '/edit') }}">Alterar</a>
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
			{{$pedidos->appends(Request::only('q'))->links()}}
		</div>
	</div> <!-- /#bottom -->
@endif