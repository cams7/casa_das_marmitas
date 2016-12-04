@extends('layouts.master')
@section('title', 'Visualizar Empresa')

@section('jquery_content')
@endsection

@section('content')	
    <h3 class="page-header">{{'Visualizar Empresa #'.$empresa->id}}</h3>

    <div class="row">
        <div class="col-md-4">
            <p><strong>Nome:</strong></p>
            <p>{{ $empresa->nome }}</p>
        </div>
        <div class="col-md-2">
            <p><strong>CNPJ:</strong></p>
            <p>{{ $empresa->getCnpj() }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>E-mail:</strong></p>
            <p>{{ $empresa->email }}</p>
        </div>
        <div class="col-md-2">
            <p><strong>Telefone:</strong></p>
            <p>{{ $empresa->getTelefone() }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <p><strong>CEP:</strong></p>
            <p>{{ $empresa->getCep() }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Cidade:</strong></p>
            <p>{{ $empresa->cidade }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Bairro:</strong></p>
            <p>{{ $empresa->bairro }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <p><strong>Logradouro:</strong></p>
            <p>{{ $empresa->logradouro }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Número:</strong></p>
            <p>{{ $empresa->numero_imovel }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <p><strong>'Complemento:</strong></p>
            <p>{{ $empresa->complemento_endereco }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Ponto de referência:</strong></p>
            <p>{{ $empresa->ponto_referencia }}</p>
        </div>
    </div>

    <hr />
    <div id="actions" class="row">
        <div class="col-md-12">             
            <a href="{{ URL::to('empresa/' . $empresa->id . '/edit') }}" class="btn btn-warning">Alterar</a>
            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Excluir</a>
            <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
        </div>
    </div>

@if ($empresa->entregadores->count() > 0)
    <h3 class="page-header">Entregadores</h3>

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
                @foreach($empresa->entregadores as $i => $entregador)
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