@extends('layouts.master')
@section('title', 'Lista de taxas')

@section('jquery_content')
@endsection

@section('sidebar')	
    @include('taxa.menu')
@endsection

@section('content')
	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	            <th>Tipo</th>
	            <th>Valor</th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach($taxas as $i => $taxa)
	        <tr>
	            <td>{{ $taxa->getTipo() }}</td>
	            <td>{{ $taxa->getTaxa() }}</td>

	            <!-- we will also add show, edit, and delete buttons -->
	            <td>

	                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
	                <!-- we will add this later since its a little more complicated than the other two buttons -->
	                {{ Form::open(array('url' => 'taxa/' . $taxa->id, 'class' => 'pull-right')) }}
	                    {{ Form::hidden('_method', 'DELETE') }}
	                    {{ Form::submit('Exclui', array('class' => 'btn btn-warning')) }}
	                {{ Form::close() }}


	                <!-- show the nerd (uses the show method found at GET /taxa/{id} -->
	                <a class="btn btn-small btn-success" href="{{ URL::to('taxa/' . $taxa->id) }}">Visualiza</a>

	                <!-- edit this nerd (uses the edit method found at GET /taxa/{id}/edit -->
	                <a class="btn btn-small btn-info" href="{{ URL::to('taxa/' . $taxa->id . '/edit') }}">Altera</a>
	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
@endsection