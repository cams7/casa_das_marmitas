@extends('layouts.master')
@section('title', 'Visualiza cliente')

@section('jquery_content')
@endsection

@section('sidebar')
	@include('cliente.menu')
@endsection

@section('content')	
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
@endsection