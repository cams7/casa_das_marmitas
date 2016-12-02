@extends('layouts.master')
@section('title', 'Taxas')

@section('sidebar')
	@parent
	<!--<p>This is appended to the master sidebar.</p>-->
@endsection

@section('content')
	<h1>Lista de taxa</h1>
	<table>
		<tr><th>Tipo</th><th>Valor</th></tr>
	@foreach($taxas as $t)
		<tr>
			<td>{{$t->tipo_taxa}}</td>
			<td>{{$t->taxa}}</td>
		</tr>
	@endforeach	
	</table>
@endsection