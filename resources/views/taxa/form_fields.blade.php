<div class="row">
    <div class="form-group col-md-6 {{$errors->has('taxa') ? 'has-error has-danger' : ''}}">
    	{{ Form::label('taxa', 'Valor:', array('class' => 'control-label')) }}
        {{ Form::text('taxa', null, array('class' => 'form-control', 'placeholder' => 'Valor da taxa')) }}
        <div class="help-block with-errors">{{ $errors->first('taxa') }}</div>
    </div>
    <div class="form-group col-md-6 {{$errors->has('tipo_taxa') ? 'has-error has-danger' : ''}}">
    	{{ Form::label('tipo_taxa', 'Tipo:', array('class' => 'control-label')) }}       
        {{ Form::select('tipo_taxa', array('1'=>'Atraso', '2'=> 'Entrega', '3'=> 'Extra'), $taxa == null ? '2' : null, array('class' => 'form-control')) }}
        <div class="help-block with-errors">{{ $errors->first('tipo_taxa') }}</div>
    </div>
</div>

@section('jquery_content')
    <script>   
        $(document).ready(function($){
            $("#taxa").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
        });  
    </script>
@endsection