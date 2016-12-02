@extends('layouts.master')
@section('title', 'Empresas')

@section('sidebar')
	@parent
	<!--<p>This is appended to the master sidebar.</p>-->
@endsection

@section('content')
	<h1>Lista de empresas</h1>
	<table>
		<tr><th>Nome</th><th>CNPJ</th><th>E-mail</th><th>Telefone</th><th>Cidade</th><th>Bairro</th></tr>
	@foreach($empresas as $e)
		<tr>
			<td>{{$e->nome}}</td>
			<td>{{$e->cnpj}}</td>
			<td>{{$e->email}}</td>
			<td>{{$e->telefone}}</td>
			<td>{{$e->cidade}}</td>
			<td>{{$e->bairro}}</td>
		</tr>
	@endforeach	
	</table>
@endsection