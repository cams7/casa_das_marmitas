@extends('layouts.master')
@section('title', 'Lista de pedidos')

@section('jquery_content')
@endsection

@section('sidebar')	
    @include('pedido.menu')
@endsection

@section('content')
	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	            <th>Cliente</th>
	            <th>Quantidade total</th>
	            <th>Custo total + Taxa</th>
	            <th>Situação</th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach($pedidos as $i => $pedido)
	        <tr>
	            <td>{{ $pedido->cliente->nome }}</td>
	            <td>{{ $pedido->quantidade_total }}</td>
	            <td>{{ $pedido->getCustoTotal() }}</td>
	            <td>{{ $pedido->getSituacao() }}</td>

	            <!-- we will also add show, edit, and delete buttons -->
	            <td>

	                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
	                <!-- we will add this later since its a little more complicated than the other two buttons -->
	                {{ Form::open(array('url' => 'pedido/' . $pedido->id, 'class' => 'pull-right')) }}
	                    {{ Form::hidden('_method', 'DELETE') }}
	                    {{ Form::submit('Exclui', array('class' => 'btn btn-warning')) }}
	                {{ Form::close() }}


	                <!-- show the nerd (uses the show method found at GET /pedido/{id} -->
	                <a class="btn btn-small btn-success" href="{{ URL::to('pedido/' . $pedido->id) }}">Visualiza</a>

	                <!-- edit this nerd (uses the edit method found at GET /pedido/{id}/edit -->
	                <a class="btn btn-small btn-info" href="{{ URL::to('pedido/' . $pedido->id . '/edit') }}">Altera</a>
	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
@endsection