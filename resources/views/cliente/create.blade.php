@extends('layouts.master')
@section('title', 'Cadastra cliente')

@section('sidebar')
	@parent
	<ul class="nav navbar-nav">
        <li><a href="{{ URL::to('cliente') }}">Lista</a></li>
        <li><a href="{{ URL::to('cliente/create') }}">Novo</a>
    </ul>
@stop

@section('head')
	<script src="{{ URL::asset('js/ui.datepicker-pt-BR.js') }}"></script>
	<script>
  	jQuery(function($){
    	$("#nascimento").datepicker();
  	});  
  	</script>
@stop

@section('content')
	<h1>Cadastra cliente</h1>

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	{{ Form::open(array('url' => 'cliente', 'class' => 'form-horizontal')) }}
	    <div class="form-group">
	        {{ Form::label('nome', 'Nome:', array('class' => 'control-label col-sm-2')) }}
	        <div class="col-sm-6">
	        	{{ Form::text('nome',null, array('class' => 'form-control', 'maxlength' => '60')) }}
	        </div>
	    </div>
	    <div class="form-group">
	        {{ Form::label('nascimento', 'Nascimento:', array('class' => 'control-label col-sm-2')) }}
	        <div class="col-sm-2">
	        	{{ Form::date('nascimento', null, array('id' => 'nascimento','class' => 'form-control', 'placeholder' => '99/99/9999', 'maxlength' => '10')) }}
	        </div>
	    </div>
	    <div class="form-group">
	        {{ Form::label('telefone', 'Telefone:', array('class' => 'control-label col-sm-2')) }}
	        <div class="col-sm-2">
	        	{{ Form::text('telefone',null, array('id' => 'telefone', 'class' => 'form-control', 'placeholder' => '(99) 9999-9999', 'maxlength' => '14')) }}
	        </div>
	    </div>
	    <div class="form-group">
	        {{ Form::label('cep', 'CEP:', array('class' => 'control-label col-sm-2')) }}
	        <div class="col-sm-2">
	        	{{ Form::text('cep',null, array('id' => 'cep', 'class' => 'form-control', 'placeholder' => '99.999.999', 'maxlength' => '10')) }}
	        </div>
	    </div>
	    <div class="form-group">
	        {{ Form::label('cidade', 'Cidade:', array('class' => 'control-label col-sm-2')) }}
	        <div class="col-sm-6">
	        	{{ Form::text('cidade',null, array('id' => 'cidade', 'class' => 'form-control', 'maxlength' => '60')) }}
	        </div>
	    </div>
	    <div class="form-group">
	        {{ Form::label('bairro', 'Bairro:', array('class' => 'control-label col-sm-2')) }}
	        <div class="col-sm-6">
	        	{{ Form::text('bairro',null, array('id' => 'bairro', 'class' => 'form-control', 'maxlength' => '60')) }}
	        </div>
	    </div>
	    <div class="form-group">
	        {{ Form::label('logradouro', 'Logradouro:', array('class' => 'control-label col-sm-2')) }}
	        <div class="col-sm-8">
	        	{{ Form::text('logradouro',null, array('id' => 'logradouro', 'class' => 'form-control', 'maxlength' => '100')) }}
	        </div>
	    </div>
	    <div class="form-group">
	        {{ Form::label('numero_residencial', 'Número:', array('class' => 'control-label col-sm-2')) }}
	        <div class="col-sm-4">
	        	{{ Form::text('numero_residencial',null, array('id' => 'numero_residencial', 'class' => 'form-control', 'maxlength' => '30')) }}
	        </div>
	    </div>
	    <div class="form-group">
	        {{ Form::label('complemento_endereco', 'Complemento:', array('class' => 'control-label col-sm-2')) }}
	        <div class="col-sm-4">
	        	{{ Form::text('complemento_endereco',null, array('id' => 'complemento_endereco', 'class' => 'form-control', 'maxlength' => '30')) }}
	        </div>
	    </div>
	    <div class="form-group">
	        {{ Form::label('ponto_referencia', 'Ponto de referência:', array('class' => 'control-label col-sm-2')) }}
	        <div class="col-sm-4">
	        	{{ Form::text('ponto_referencia',null, array('id' => 'ponto_referencia', 'class' => 'form-control', 'maxlength' => '30')) }}
	        </div>
	    </div>

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Cadastra', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}


	<?php
  	/*echo Form::open(['url' => 'foo/bar']);
    echo Form::text('username','username');
    echo '<br/>';
    echo Form::text('email','yourmail@here.com');
    echo '<br/>';
    echo Form::password('password');
    echo '<br/>';
    echo Form::checkbox('name','value');
    echo '<br/>';
    echo Form::radio('name','value');
    echo '<br/>';
    echo Form::file('image');
    echo '<br/>';
    echo Form::select('Gender',['P'=>'perempuan','L'=> 'Laki-laki']);
    echo '<br/>';
    echo Form::submit('Register Now');
  	echo Form::close();*/ 
  	?>
@stop