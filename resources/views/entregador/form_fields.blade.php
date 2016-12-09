<div class="row">
    <div class="form-group col-md-6 {{$errors->has('nome') ? 'has-error has-danger' : ''}}">
        {{ Form::label('nome', 'Nome:', array('class' => 'control-label')) }}
    	{{ Form::text('nome', null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do entregador')) }}
        <div class="help-block with-errors">{{ $errors->first('nome') }}</div>
    </div>
    <div class="form-group col-md-6 {{$errors->has('empresa_id') ? 'has-error has-danger' : ''}}">
        {{ Form::label('empresa_nome', 'Empresa:', array('class' => 'control-label')) }}
        {{ Form::text('empresa_nome', $entregador != null ? $entregador->empresa->nome : null, array('id' => 'empresa_nome', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome da empresa')) }}
        <div class="help-block with-errors">{{ $errors->first('empresa_id') }}</div>
        <input type="hidden" id="empresa_id" name="empresa_id" value="{{session('empresa_id') != null ? session('empresa_id') : ($entregador != null ? $entregador->empresa->id : '')}}">
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4 {{$errors->has('celular') ? 'has-error has-danger' : ''}}">
        {{ Form::label('celular', 'Celular:', array('class' => 'control-label')) }}
        {{ Form::text('celular', $entregador != null ? $entregador->getCelular() : null, array('id' => 'celular', 'class' => 'form-control', 'placeholder' => '(99) 99999-9999', 'maxlength' => '15')) }}
        <div class="help-block with-errors">{{ $errors->first('celular') }}</div>
    </div>
    <div class="form-group col-md-4 {{$errors->has('cpf') ? 'has-error has-danger' : ''}}">
        {{ Form::label('cpf', 'CPF:', array('class' => 'control-label')) }}
        {{ Form::text('cpf', $entregador != null ? $entregador->getCpf() : null, array('id' => 'cpf', 'class' => 'form-control', 'placeholder' => '999.999.999-99', 'maxlength' => '14')) }}
        <div class="help-block with-errors">{{ $errors->first('cpf') }}</div>
    </div>
    <div class="form-group col-md-4 {{$errors->has('rg') ? 'has-error has-danger' : ''}}">
        {{ Form::label('rg', 'RG:', array('class' => 'control-label')) }}
        {{ Form::text('rg', null, array('id' => 'rg', 'class' => 'form-control', 'placeholder' => '99999999', 'maxlength' => '10')) }}
        <div class="help-block with-errors">{{ $errors->first('rg') }}</div>
    </div>
</div>

@section('jquery_content')
    <script src="{{ URL::asset('js/casa_das_marmitas-entregador.js') }}"></script>
@endsection