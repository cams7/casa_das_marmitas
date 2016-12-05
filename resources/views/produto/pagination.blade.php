<div id="list" class="row"> 		
	<div class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Nome</th>
	            	<th>Custo</th>
	            	<th>Tamanho</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody>
    		@foreach($produtos as $i => $produto)
    			<tr>
            		<td>{{ $produto->nome }}</td>
            		<td>{{ $produto->getCusto() }}</td>
            		<td>{{ $produto->getTamanho() }}</td>
            		<td class="actions">
						<a class="btn btn-success btn-xs" href="{{ URL::to('produto/' . $produto->id) }}">Visualizar</a>
						<a class="btn btn-warning btn-xs" href="{{ URL::to('produto/' . $produto->id . '/edit') }}">Alterar</a>
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
		{{$produtos->appends(Request::only('q'))->links()}}
	</div>
</div> <!-- /#bottom -->