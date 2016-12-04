@extends('layouts.master')
@section('title', 'Visualizar Entregador')

@section('jquery_content')
@endsection

@section('content')
    <h3 class="page-header">{{'Visualizar Entregador #'.$entregador->id}}</h3>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Nome:</strong></p>
            <p>{{ $entregador->nome }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Empresa:</strong></p>
            <p><a href="{{ URL::to('empresa/' . $entregador->empresa->id) }}">{{ $entregador->empresa->nome }}</a></p>
        </div>        
    </div>
    <div class="row">        
        <div class="col-md-4">
            <p><strong>Celular:</strong></p>
            <p>{{ $entregador->getCelular() }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>CPF:</strong></p>
            <p>{{ $entregador->getCpf() }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>RG:</strong></p>
            <p>{{ $entregador->rg }}</p>
        </div>
    </div>

    <hr />
    <div id="actions" class="row">
        <div class="col-md-12">             
            <a href="{{ URL::to('entregador/' . $entregador->id . '/edit') }}" class="btn btn-warning">Alterar</a>
            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Excluir</a>
            <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
        </div>
    </div>
@endsection