@extends('layouts.master')
@section('title', 'Altera funcionário')

@section('jquery_content')	
@endsection

@section('sidebar')
	@include('funcionario.menu')
@endsection

@section('content')	
	@include('layouts.errors')

	{{ Form::model($funcionario, array('route' => array('funcionario.update', $funcionario->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
	    @include('funcionario.form_fields')

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Altera', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection