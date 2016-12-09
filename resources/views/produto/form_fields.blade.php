<div class="row">
    <div class="form-group col-md-6 {{$errors->has('nome') ? 'has-error has-danger' : ''}}">
        {{ Form::label('nome', 'Nome:', array('class' => 'control-label')) }}
    	{{ Form::text('nome', null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome da marmita')) }}
        <div class="help-block with-errors">{{ $errors->first('nome') }}</div>
    </div>

    <div class="form-group col-md-2 {{$errors->has('custo') ? 'has-error has-danger' : ''}}">
        {{ Form::label('custo', 'Custo:', array('class' => 'control-label')) }}
        {{ Form::text('custo', null, array('id' => 'custo', 'class' => 'form-control', 'placeholder' => 'Custo da marmita')) }}
        <div class="help-block with-errors">{{ $errors->first('custo') }}</div>
    </div>
    
    <div class="form-group col-md-4 {{$errors->has('tamanho') ? 'has-error has-danger' : ''}}">
        {{ Form::label('tamanho', 'Tamanho:', array('class' => 'control-label')) }}    
        {{ Form::select('tamanho', array('1'=>'Grande', '2'=> 'Média', '3'=> 'Pequena'), null, array('class' => 'form-control')) }}
        <div class="help-block with-errors">{{ $errors->first('tamanho') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12 {{$errors->has('ingredientes') ? 'has-error has-danger' : ''}}">
        {{ Form::label('ingredientes', 'Ingredientes:', array('class' => 'control-label')) }}
        {{ Form::textarea('ingredientes', null, array('class' => 'form-control', 'placeholder' => 'Ingredientes da marmita')) }}
        <div class="help-block with-errors">{{ $errors->first('ingredientes') }}</div>
    </div>
</div>

@section('jquery_content')
    <script>   
        $(document).ready(function($){
            $("#custo").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
        });  
    </script>
@endsection