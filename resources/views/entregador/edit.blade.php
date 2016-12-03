@extends('layouts.master')
@section('title', 'Altera entregador')

@section('jquery_content')	
@endsection

@section('sidebar')
	@include('entregador.menu')
@endsection

@section('content')	
	@include('layouts.errors')

	{{ Form::model($entregador, array('route' => array('entregador.update', $entregador->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
	    @include('entregador.form_fields')

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Altera', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection