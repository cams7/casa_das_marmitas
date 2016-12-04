@extends('layouts.master')
@section('title', 'Altera pedido')

@section('jquery_content')	
@endsection

@section('sidebar')
	@include('pedido.menu')
@endsection

@section('content')	
	@include('layouts.errors')

	{{ Form::model($pedido, array('route' => array('pedido.update', $pedido->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
	    @include('pedido.form_fields')

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Altera', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection