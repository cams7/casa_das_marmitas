<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('nome', 'Nome:', array()) }}
    	{{ Form::text('nome', null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do cliente')) }}
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('nascimento', 'Nascimento:', array()) }}
        {{ Form::date('nascimento', $cliente != null ? $cliente->getNascimento() : null, array('id' => 'nascimento','class' => 'form-control', 'placeholder' => '99/99/9999', 'maxlength' => '10')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('telefone', 'Telefone:', array()) }}
        {{ Form::text('telefone', $cliente != null ? $cliente->getTelefone() : null, array('id' => 'telefone', 'class' => 'form-control', 'placeholder' => '(99) 9999-9999', 'maxlength' => '14')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-2">
        {{ Form::label('cep', 'CEP:', array()) }}
    	{{ Form::text('cep', $cliente != null ? $cliente->getCep() : null, array('id' => 'cep', 'class' => 'form-control', 'placeholder' => '99.999.999', 'maxlength' => '10')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('cidade', 'Cidade:', array()) }}
        {{ Form::text('cidade', null, array('id' => 'cidade', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome da cidade')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('bairro', 'Bairro:', array()) }}
        {{ Form::text('bairro', null, array('id' => 'bairro', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do bairro')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-8">
        {{ Form::label('logradouro', 'Logradouro:', array()) }}
    	{{ Form::text('logradouro', null, array('id' => 'logradouro', 'class' => 'form-control', 'maxlength' => '100', 'placeholder' => 'Nome do logradouro')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('numero_residencial', 'Número:', array()) }}
        {{ Form::text('numero_residencial', null, array('id' => 'numero_residencial', 'class' => 'form-control', 'maxlength' => '30', 'placeholder' => 'Número residencial')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('complemento_endereco', 'Complemento:', array()) }}
    	{{ Form::text('complemento_endereco', null, array('id' => 'complemento_endereco', 'class' => 'form-control', 'maxlength' => '30', 'placeholder' => 'Complemento do endereço')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('ponto_referencia', 'Ponto de referência:', array()) }}
        {{ Form::text('ponto_referencia', null, array('id' => 'ponto_referencia', 'class' => 'form-control', 'maxlength' => '30', 'placeholder' => 'Ponto de referência')) }}
    </div>
</div>