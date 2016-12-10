@if ($itens->count() > 0)
  <h3 class="page-header">Itens de Pedidos ({{$itens->total()}})</h3>

  <div id="list" class="row">     
    <div class="table-responsive col-md-12">
      <table class="table table-striped" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th>Pedido</th>
            <th>Cliente</th>
            <th>Quantidade</th>
            <th class="actions">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($itens as $i => $item)
            <tr>  
              <td><a href="{{ URL::to('pedido/' . $item->pedido->id) }}">{{ $item->pedido->getCadastro() }}</a></td>
              <td><a href="{{ URL::to('cliente/' . $item->pedido->cliente->id) }}">{{ $item->pedido->cliente->nome }}</a></td>
              <td>{{ $item->quantidade }}</td>
              
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

  <div id="bottom" class="row">
        <div class="col-md-12">
            {{$itens->appends(Request::only('produto_id'))->links()}}
        </div>
    </div>
@endif