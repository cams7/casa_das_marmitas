@extends('layouts.master')
@section('title', 'Altera produto')

@section('jquery_content')	
@endsection

@section('sidebar')
	@include('produto.menu')
@endsection

@section('content')	
	@include('layouts.errors')

	{{ Form::model($produto, array('route' => array('produto.update', $produto->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
	    @include('produto.form_fields')

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Altera', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection