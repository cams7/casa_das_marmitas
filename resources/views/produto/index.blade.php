@extends('layouts.master')
@section('title', 'Lista de produtos')

@section('jquery_content')
@endsection

@section('sidebar')	
    @include('produto.menu')
@endsection

@section('content')
	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	            <th>Nome</th>
	            <th>Custo</th>
	            <th>Tamanho</th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach($produtos as $i => $produto)
	        <tr>
	            <td>{{ $produto->nome }}</td>
	            <td>{{ $produto->getCusto() }}</td>
	            <td>{{ $produto->getTamanho() }}</td>

	            <!-- we will also add show, edit, and delete buttons -->
	            <td>

	                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
	                <!-- we will add this later since its a little more complicated than the other two buttons -->
	                {{ Form::open(array('url' => 'produto/' . $produto->id, 'class' => 'pull-right')) }}
	                    {{ Form::hidden('_method', 'DELETE') }}
	                    {{ Form::submit('Exclui', array('class' => 'btn btn-warning')) }}
	                {{ Form::close() }}


	                <!-- show the nerd (uses the show method found at GET /produto/{id} -->
	                <a class="btn btn-small btn-success" href="{{ URL::to('produto/' . $produto->id) }}">Visualiza</a>

	                <!-- edit this nerd (uses the edit method found at GET /produto/{id}/edit -->
	                <a class="btn btn-small btn-info" href="{{ URL::to('produto/' . $produto->id . '/edit') }}">Altera</a>
	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
@endsection