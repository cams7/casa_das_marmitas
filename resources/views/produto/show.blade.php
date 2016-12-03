@extends('layouts.master')
@section('title', 'Visualiza produto')

@section('jquery_content')
@endsection

@section('sidebar')
	@include('produto.menu')
@endsection

@section('content')	
	<div class="jumbotron text-center">
        <h2>{{ $produto->nome }}</h2>
        <p>
            <strong>Custo:</strong> {{ $produto->getCusto() }}<br/>
            <strong>Tamanho:</strong> {{ $produto->getTamanho() }}
        </p>
    </div>
@endsection