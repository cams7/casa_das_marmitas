<div id="list" class="row"> 		
	<div class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Tipo</th>
            		<th>Valor</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody>
    		@foreach($taxas as $i => $taxa)
    			<tr>
            		<td>{{ $taxa->getTipo() }}</td>
            		<td>{{ $taxa->getTaxa() }}</td>

            		<td class="actions">
						<a class="btn btn-success btn-xs" href="{{ URL::to('taxa/' . $taxa->id) }}">Visualizar</a>
						<a class="btn btn-warning btn-xs" href="{{ URL::to('taxa/' . $taxa->id . '/edit') }}">Alterar</a>
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
		{{$taxas->links()}}
	</div>
</div> <!-- /#bottom -->