@extends('layouts.master')
@section('title', 'Altera taxa')

@section('jquery_content')	
@endsection

@section('sidebar')
	@include('taxa.menu')
@endsection

@section('content')	
	@include('layouts.errors')

	{{ Form::model($taxa, array('route' => array('taxa.update', $taxa->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
	    @include('taxa.form_fields')

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Altera', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection