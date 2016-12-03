@extends('layouts.master')
@section('title', 'Cadastra taxa')

@section('jquery_content')	
@endsection

@section('sidebar')
	@include('taxa.menu')
@endsection

@section('content')	
  @include('layouts.errors')

	{{ Form::open(array('url' => 'taxa', 'class' => 'form-horizontal')) }}
	    @include('taxa.form_fields')

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Cadastra', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}	
@endsection