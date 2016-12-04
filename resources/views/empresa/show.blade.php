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
@endsection