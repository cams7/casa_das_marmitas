<div id="list" class="row"> 		
	<div class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Nome</th>
            		<th>Telefone</th>
            		<th>Cidade</th>
            		<th>Bairro</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody>
    		@foreach($clientes as $i => $cliente)
    			<tr>
            		<td>{{ $cliente->nome }}</td>
            		<td>{{ $cliente->getTelefone() }}</td>
            		<td>{{ $cliente->cidade }}</td>
            		<td>{{ $cliente->bairro }}</td>

            		<td class="actions">
						<a class="btn btn-success btn-xs" href="{{ URL::to('cliente/' . $cliente->id) }}">Visualizar</a>
						<a class="btn btn-warning btn-xs" href="{{ URL::to('cliente/' . $cliente->id . '/edit') }}">Alterar</a>
						<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
					</td>
            	</tr>	
    		@endforeach
    		</tbody>
		</table>
	</div>
</div>

<div id="bottom" class="row">
	<div class="col-md-12">
		{{$clientes->links()}}
	</div>
</div>