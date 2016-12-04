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
@endsection