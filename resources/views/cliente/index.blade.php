@extends('layouts.master')
@section('title', 'Lista de clientes')

@section('sidebar')
	@parent
	<ul class="nav navbar-nav">
        <li><a href="{{ URL::to('cliente') }}">Lista</a></li>
        <li><a href="{{ URL::to('cliente/create') }}">Novo</a>
    </ul>
@stop

@section('content')
	<h1>Lista de clientes</h1>

	<!-- will be used to show any messages -->
	@if (Session::has('message'))
	    <div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	            <th>Nome</th>
	            <th>Telefone</th>
	            <th>Cidade</th>
	            <th>Bairro</th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach($clientes as $i => $cliente)
	        <tr>
	            <td>{{ $cliente->nome }}</td>
	            <td>{{ $cliente->telefone }}</td>
	            <td>{{ $cliente->cidade }}</td>
	            <td>{{ $cliente->bairro }}</td>

	            <!-- we will also add show, edit, and delete buttons -->
	            <td>

	                <!-- delete the nerd (uses the destroy method DESTROY /cliente/{id} -->
	                <!-- we will add this later since its a little more complicated than the other two buttons -->

	                <!-- show the nerd (uses the show method found at GET /cliente/{id} -->
	                <a class="btn btn-small btn-success" href="{{ URL::to('cliente/' . $cliente->id) }}">Visualiza</a>

	                <!-- edit this nerd (uses the edit method found at GET /cliente/{id}/edit -->
	                <a class="btn btn-small btn-info" href="{{ URL::to('cliente/' . $cliente->id . '/edit') }}">Altera</a>
	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
@stop