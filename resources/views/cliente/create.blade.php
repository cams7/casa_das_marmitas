@extends('layouts.master')
@section('title', 'Cadastra novo cliente')

@section('sidebar')
	@parent
	<ul class="nav navbar-nav">
        <li><a href="{{ URL::to('cliente') }}">Lista</a></li>
        <li><a href="{{ URL::to('cliente/create') }}">Novo</a>
    </ul>
@endsection

@section('content')
	<h1>Cadastra novo cliente</h1>
	
@endsection