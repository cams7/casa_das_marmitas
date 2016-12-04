@extends('layouts.master')
@section('title', 'Visualizar Cliente')

@section('jquery_content')
@endsection

@section('content')	
    <h3 class="page-header">{{'Visualizar Cliente #'.$cliente->id}}</h3>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Nome:</strong></p>
            <p>{{ $cliente->nome }}</p>
        </div>
        <div class="col-md-2">
            <p><strong>Nascimento:</strong></p>
            <p>{{ $cliente->getNascimento() }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Telefone:</strong></p>
            <p>{{ $cliente->getTelefone() }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <p><strong>CEP:</strong></p>
            <p>{{ $cliente->getCep() }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Cidade:</strong></p>
            <p>{{ $cliente->cidade }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Bairro:</strong></p>
            <p>{{ $cliente->bairro }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <p><strong>Logradouro:</strong></p>
            <p>{{ $cliente->logradouro }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Número:</strong></p>
            <p>{{ $cliente->numero_residencial }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Complemento:</strong></p>
            <p>{{ $cliente->complemento_endereco }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Ponto de referência:</strong></p>
            <p>{{ $cliente->ponto_referencia }}</p>
        </div>
    </div>

    <hr />
    <div id="actions" class="row">
        <div class="col-md-12">             
            <a href="{{ URL::to('cliente/' . $cliente->id . '/edit') }}" class="btn btn-warning">Alterar</a>
            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Excluir</a>
            <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
        </div>
    </div>	

@if ($cliente->pedidos->count() > 0)
    <h3 class="page-header">Pedidos</h3>

    <div id="list" class="row">         
        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Quantidade total</th>
                        <th>Custo total + Taxa</th>
                        <th>Situação</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cliente->pedidos as $i => $pedido)
                    <tr>
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
            <ul class="pagination">
                <li class="disabled"><a>&lt; Anterior</a></li>
                <li class="disabled"><a>1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
            </ul><!-- /.pagination -->
        </div>
    </div> <!-- /#bottom -->
@endif
@endsection