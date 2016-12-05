<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('nome', 'Nome:', array()) }}
    	{{ Form::text('nome', null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do entregador')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('empresa_nome', 'Empresa:', array()) }}
        {{ Form::text('empresa_nome', $entregador != null ? $entregador->empresa->nome : null, array('id' => 'empresa_nome', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome da empresa')) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('celular', 'Celular:', array()) }}
        {{ Form::text('celular', $entregador != null ? $entregador->getCelular() : null, array('id' => 'celular', 'class' => 'form-control', 'placeholder' => '(99) 99999-9999', 'maxlength' => '15')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('cpf', 'CPF:', array()) }}
        {{ Form::text('cpf', $entregador != null ? $entregador->getCpf() : null, array('id' => 'cpf', 'class' => 'form-control', 'placeholder' => '999.999.999-99', 'maxlength' => '14')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('rg', 'RG:', array()) }}
        {{ Form::text('rg', null, array('id' => 'rg', 'class' => 'form-control', 'placeholder' => '99999999', 'maxlength' => '10')) }}
    </div>
</div>

@section('jquery_content')
    <script>   
        $(document).ready(function($){
            $("#celular").mask("(99) 99999-9999");
            $("#cpf").mask("999.999.999-99");

            @if($entregador != null)
                $('#empresa_nome').prop('readonly', true);
            @else               
                $("#empresa_nome").autocomplete({
                    source : function(request, response) {
                        $.getJSON( "/ajax/empresas/"+ request.term, function( data ) {
                            var empresas = [];

                            data.forEach(empresa => {
                                empresas.push(empresa.nome);
                            });
                            
                            response(empresas);
                        });
                    },
                    minLength : 1
                });
            @endif            
        });  
    </script>
@endsection
