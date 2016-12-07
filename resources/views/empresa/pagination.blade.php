@if ($empresas->count() > 0)
	<div id="list" class="row"> 		
		<div class="table-responsive col-md-12">
			<table class="table table-striped" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Nome</th>
	            		<th>CNPJ</th>
	            		<th>E-mail</th>
	            		<th>Telefone</th>
	            		<th>Cidade</th>
	            		<th>Bairro</th>
						<th class="actions">Ações</th>
					</tr>
				</thead>
				<tbody>
	    		@foreach($empresas as $i => $empresa)
	    			<tr>
	            		<td>{{ $empresa->nome }}</td>
	            		<td>{{ $empresa->getCnpj() }}</td>
	            		<td>{{ $empresa->email }}</td>
	            		<td>{{ $empresa->getTelefone() }}</td>
	            		<td>{{ $empresa->cidade }}</td>
	            		<td>{{ $empresa->bairro }}</td>

	            		<td class="actions">
							<a class="btn btn-success btn-xs" href="{{ URL::to('empresa/' . $empresa->id) }}">Visualizar</a>
							<a class="btn btn-warning btn-xs" href="{{ URL::to('empresa/' . $empresa->id . '/edit') }}">Alterar</a>
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
			{{$empresas->appends(Request::only('q'))->links()}}
		</div>
	</div> <!-- /#bottom -->
@endif