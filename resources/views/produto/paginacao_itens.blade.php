@if ($itens->count() > 0)
  <h3 class="page-header">Itens de Pedidos ({{$itens->total()}})</h3>

  <div id="list" class="row">     
    <div class="table-responsive col-md-12">
      <table class="table table-striped" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th>Pedido</th>
            <th>Data do pedido</th>
            <th>Cliente</th>
            <th>Quantidade</th>
          </tr>
        </thead>
        <tbody>
          @foreach($itens as $i => $item)
            <tr>
              <td><a href="{{ URL::to('pedido/' . $item->pedido->id) }}">#{{ $item->pedido->id }}</a></td>  
              <td>{{ $item->pedido->getCadastro() }}</td>
              <td><a href="{{ URL::to('cliente/' . $item->pedido->cliente->id) }}">{{ $item->pedido->cliente->nome }}</a></td>
              <td>{{ $item->quantidade }}</td>
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