<div class="row">
    <div class="form-group col-md-6 {{$errors->has('nome') ? 'has-error has-danger' : ''}}">
        {{ Form::label('nome', 'Nome:', array('class' => 'control-label')) }}
    	{{ Form::text('nome', null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do cliente')) }}
        <div class="help-block with-errors">{{ $errors->first('nome') }}</div>
    </div>
    <div class="form-group col-md-2 {{$errors->has('nascimento') ? 'has-error has-danger' : ''}}">
        {{ Form::label('nascimento', 'Nascimento:', array('class' => 'control-label')) }}
        {{ Form::date('nascimento', $cliente != null ? $cliente->getNascimento() : null, array('id' => 'nascimento','class' => 'form-control', 'placeholder' => '99/99/9999', 'maxlength' => '10')) }}
        <div class="help-block with-errors">{{ $errors->first('nascimento') }}</div>
    </div>
    <div class="form-group col-md-4 {{$errors->has('telefone') ? 'has-error has-danger' : ''}}">
        {{ Form::label('telefone', 'Telefone:', array('class' => 'control-label')) }}
        {{ Form::text('telefone', $cliente != null ? $cliente->getTelefone() : null, array('id' => 'telefone', 'class' => 'form-control', 'placeholder' => '(99) 9999-9999', 'maxlength' => '14')) }}
        <div class="help-block with-errors">{{ $errors->first('telefone') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-2 {{$errors->has('cep') ? 'has-error has-danger' : ''}}">
        {{ Form::label('cep', 'CEP:', array('class' => 'control-label')) }}
    	{{ Form::text('cep', $cliente != null ? $cliente->getCep() : null, array('id' => 'cep', 'class' => 'form-control', 'placeholder' => '99999-999', 'maxlength' => '10', 'onKeyPress' => 'MascaraCep(form1.cep);')) }}
        <div class="help-block with-errors">{{ $errors->first('cep') }}</div>
    </div>
    <div class="form-group col-md-4 {{$errors->has('cidade') ? 'has-error has-danger' : ''}}">
        {{ Form::label('cidade', 'Cidade:', array('class' => 'control-label')) }}
        {{ Form::text('cidade', null, array('id' => 'cidade', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome da cidade')) }}
        <div class="help-block with-errors">{{ $errors->first('cidade') }}</div>
    </div>
    <div class="form-group col-md-6 {{$errors->has('bairro') ? 'has-error has-danger' : ''}}">
        {{ Form::label('bairro', 'Bairro:', array('class' => 'control-label')) }}
        {{ Form::text('bairro', null, array('id' => 'bairro', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do bairro')) }}
        <div class="help-block with-errors">{{ $errors->first('bairro') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-8 {{$errors->has('logradouro') ? 'has-error has-danger' : ''}}">
        {{ Form::label('logradouro', 'Logradouro:', array('class' => 'control-label')) }}
    	{{ Form::text('logradouro', null, array('id' => 'logradouro', 'class' => 'form-control', 'maxlength' => '100', 'placeholder' => 'Nome do logradouro')) }}
        <div class="help-block with-errors">{{ $errors->first('logradouro') }}</div>
    </div>
    <div class="form-group col-md-4 {{$errors->has('numero_residencial') ? 'has-error has-danger' : ''}}">
        {{ Form::label('numero_residencial', 'Número:', array('class' => 'control-label')) }}
        {{ Form::text('numero_residencial', null, array('id' => 'numero_residencial', 'class' => 'form-control', 'maxlength' => '30', 'placeholder' => 'Número residencial')) }}
        <div class="help-block with-errors">{{ $errors->first('numero_residencial') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6 {{$errors->has('complemento_endereco') ? 'has-error has-danger' : ''}}">
        {{ Form::label('complemento_endereco', 'Complemento:', array('class' => 'control-label')) }}
    	{{ Form::text('complemento_endereco', null, array('id' => 'complemento_endereco', 'class' => 'form-control', 'maxlength' => '30', 'placeholder' => 'Complemento do endereço')) }}
        <div class="help-block with-errors">{{ $errors->first('complemento_endereco') }}</div>
    </div>
    <div class="form-group col-md-6 {{$errors->has('ponto_referencia') ? 'has-error has-danger' : ''}}">
        {{ Form::label('ponto_referencia', 'Ponto de referência:', array('class' => 'control-label')) }}
        {{ Form::text('ponto_referencia', null, array('id' => 'ponto_referencia', 'class' => 'form-control', 'maxlength' => '30', 'placeholder' => 'Ponto de referência')) }}
        <div class="help-block with-errors">{{ $errors->first('ponto_referencia') }}</div>
    </div>
</div>

@section('jquery_content')
    <script>   
        $(document).ready(function($){
            $("#nascimento").mask("99/99/9999");
            $("#telefone").mask("(99) 9999-9999");
            $("#cep").mask("99999-999");  
        });  
    </script>
@endsection