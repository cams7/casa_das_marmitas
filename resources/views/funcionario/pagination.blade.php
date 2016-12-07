@if ($funcionarios->count() > 0)
	<div id="list" class="row"> 		
		<div class="table-responsive col-md-12">
			<table class="table table-striped" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Nome</th>
	            		<th>E-mail</th>
	            		<th>Cargo</th>
						<th class="actions">Ações</th>
					</tr>
				</thead>
				<tbody>
	    		@foreach($funcionarios as $i => $funcionario)
	    			<tr>
	            		<td>{{ $funcionario->user->name }}</td>
	            		<td>{{ $funcionario->user->email }}</td>
	            		<td>{{ $funcionario->getCargo() }}</td>

	            		<td class="actions">
							<a class="btn btn-success btn-xs" href="{{ URL::to('funcionario/' . $funcionario->id) }}">Visualizar</a>
							<a class="btn btn-warning btn-xs" href="{{ URL::to('funcionario/' . $funcionario->id . '/edit') }}">Alterar</a>
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
			{{$funcionarios->appends(Request::only('q'))->links()}}
		</div>
	</div> <!-- /#bottom -->
@endif