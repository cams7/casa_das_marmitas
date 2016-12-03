@extends('layouts.master')
@section('title', 'Visualiza taxa')

@section('jquery_content')
@endsection

@section('sidebar')
	@include('taxa.menu')
@endsection

@section('content')	
	<div class="jumbotron text-center">
        <h2>{{ $taxa->getTipo() }}</h2>
        <p>
            <strong>Valor:</strong> {{ $taxa->getTaxa() }}
        </p>
    </div>
@endsection