@if ($entregadores->count() > 0)
    <h3 class="page-header">Entregadores ({{$entregadores->total()}})</h3>

    <div id="list" class="row">         
        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Celular</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($entregadores as $i => $entregador)
                    <tr>
                        <td>{{ $entregador->nome }}</td>
                        <td>{{ $entregador->getCpf() }}</td>
                        <td>{{ $entregador->getCelular() }}</td>

                        <td class="actions">
                            <a class="btn btn-success btn-xs" href="{{ URL::to('entregador/' . $entregador->id) }}">Visualizar</a>
                            <a class="btn btn-warning btn-xs" href="{{ URL::to('entregador/' . $entregador->id . '/edit') }}">Alterar</a>
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
            {{$entregadores->appends(Request::only('empresa_id'))->links()}}
        </div>
    </div>
@endif