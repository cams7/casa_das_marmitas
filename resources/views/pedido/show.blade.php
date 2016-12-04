@extends('layouts.master')
@section('title', 'Visualiza pedido')

@section('jquery_content')
@endsection

@section('sidebar')
	@include('pedido.menu')
@endsection

@section('content')	
	<div class="jumbotron text-center">
        <h2>{{ $pedido->cliente->nome }}</h2>
        <p>
            <strong>Quantidade total:</strong> {{ $pedido->quantidade_total }}<br/>
            <strong>Custo total + Taxa:</strong> {{ $pedido->getCustoTotal() }}<br/>
            <strong>Situação:</strong> {{ $pedido->getSituacao() }}
        </p>
    </div>
    <table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	            <th>Quantidade</th>
	            <th>Custo</th>
	            <th>Produto</th>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach($pedido->itens as $i => $item)
	        <tr>
	            <td>{{ $item->quantidade }}</td>
	            <td>{{ $item->produto->getCusto() }}</td>
	            <td>{{ $item->produto->nome }}</td>	            
	        </tr>
	    @endforeach
	    </tbody>
	</table>
@endsection