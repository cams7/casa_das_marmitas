@extends('layouts.master')
@section('title', 'Visualiza cliente')

@section('sidebar')
	@parent
	<!--<p>This is appended to the master sidebar.</p>-->
	<ul class="nav navbar-nav">
        <li><a href="{{ URL::to('cliente') }}">Lista</a></li>
        <li><a href="{{ URL::to('cliente/create') }}">Novo</a>
    </ul>
@stop

@section('head')
@stop

@section('content')
	<h1>Visualiza cliente</h1>
	
	<div class="jumbotron text-center">
        <h2>{{ $cliente->nome }}</h2>
        <p>
            <strong>Nascimento:</strong> {{ $cliente->nascimento }}<br/>
            <strong>Telefone:</strong> {{ $cliente->telefone }}<br/>
            <strong>CEP:</strong> {{ $cliente->cep }}<br/>
            <strong>Cidade:</strong> {{ $cliente->cidade }}<br/>
            <strong>Bairro:</strong> {{ $cliente->bairro }}<br/>
            <strong>Logradouro:</strong> {{ $cliente->logradouro }}<br/>
            <strong>Número:</strong> {{ $cliente->numero_residencial }}<br/>
            <strong>Complemento:</strong> {{ $cliente->complemento_endereco }}<br/>
            <strong>Ponto de referência:</strong> {{ $cliente->ponto_referencia }}
        </p>
    </div>
@stop