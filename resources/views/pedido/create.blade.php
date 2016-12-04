@extends('layouts.master')
@section('title', 'Cadastra pedido')

@section('jquery_content')	
@endsection

@section('sidebar')
	@include('pedido.menu')
@endsection

@section('content')	
  @include('layouts.errors')

	{{ Form::open(array('url' => 'pedido', 'class' => 'form-horizontal')) }}
	    @include('pedido.form_fields')

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Cadastra', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}	
@endsection