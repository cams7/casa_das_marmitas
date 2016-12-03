@extends('layouts.master')
@section('title', 'Visualiza funcionário')

@section('jquery_content')
@endsection

@section('sidebar')
	@include('funcionario.menu')
@endsection

@section('content')	
	<div class="jumbotron text-center">
        <h2>{{ $funcionario->user->name }}</h2>
        <p>
            <strong>E-mail:</strong> {{ $funcionario->user->email }}<br/>
            <strong>Cargo:</strong> {{ $funcionario->getCargo() }}
        </p>
    </div>
@endsection