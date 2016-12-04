@extends('layouts.master')
@section('title', 'Adicionar Cliente')

@section('jquery_content')
  <script src="{{ URL::asset('js/ui.datepicker-pt-BR.js') }}"></script>
	<script>
    jQuery(function($){
      $("#nascimento").datepicker();
  	});  
  </script>
@endsection

@section('content')	
  <h3 class="page-header">Adicionar Cliente</h3>

	@include('layouts.errors')

	{{ Form::open(array('url' => 'cliente')) }}
	    @include('cliente.form_fields')

	    <hr />
      <div id="actions" class="row">
        <div class="col-md-12">
	    		{{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
          <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection