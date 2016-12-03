@extends('layouts.master')
@section('title', 'Visualiza empresa')

@section('jquery_content')
@endsection

@section('sidebar')
	@include('empresa.menu')
@endsection

@section('content')	
	<div class="jumbotron text-center">
        <h2>{{ $empresa->nome }}</h2>
        <p>
            <strong>CNPJ:</strong> {{ $empresa->getCnpj() }}<br/>
            <strong>E-mail:</strong> {{ $empresa->email }}<br/>
            <strong>Telefone:</strong> {{ $empresa->getTelefone() }}<br/>
            <strong>CEP:</strong> {{ $empresa->getCep() }}<br/>
            <strong>Cidade:</strong> {{ $empresa->cidade }}<br/>
            <strong>Bairro:</strong> {{ $empresa->bairro }}<br/>
            <strong>Logradouro:</strong> {{ $empresa->logradouro }}<br/>
            <strong>Número:</strong> {{ $empresa->numero_imovel }}<br/>
            <strong>Complemento:</strong> {{ $empresa->complemento_endereco }}<br/>
            <strong>Ponto de referência:</strong> {{ $empresa->ponto_referencia }}
        </p>
    </div>
@endsection