@extends('layouts.master')
@section('title', 'Visualiza entregador')

@section('jquery_content')
@endsection

@section('sidebar')
	@include('entregador.menu')
@endsection

@section('content')	
	<div class="jumbotron text-center">
        <h2>{{ $entregador->nome }}</h2>
        <p>
        	<strong>Empresa:</strong> {{ $entregador->empresa->nome }}<br/>
            <strong>CPF:</strong> {{ $entregador->getCpf() }}<br/>
            <strong>RG:</strong> {{ $entregador->rg }}<br/>
            <strong>Celular:</strong> {{ $entregador->getCelular() }}
        </p>
    </div>
@endsection