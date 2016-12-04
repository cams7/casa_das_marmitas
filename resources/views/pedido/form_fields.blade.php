<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('cliente_id', 'Cliente:', array()) }}
        {{ Form::text('cliente_id', $pedido != null ? $pedido->cliente->nome : null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('taxa_id', 'Taxa:', array()) }}
        {{ Form::text('taxa_id', $pedido != null ? $pedido->taxa->getTaxa() : null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">    
        {{ Form::label('situacao_pedido', 'Situação:', array()) }}        
        {{ Form::select('situacao_pedido', array('1'=>'Pendente', '2'=> 'Em trânsito', '3'=> 'Cancelado', '4'=> 'Entregue'), null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('quantidade_total', 'Quantidade total:', array()) }}
        {{ Form::text('quantidade_total', null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('total_pedido', 'Custo total:', array()) }}
        {{ Form::text('total_pedido', $pedido != null ? $pedido->getCustoTotal() : null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('created_at', 'Cadastro:', array()) }}
        {{ Form::text('created_at', $pedido != null ? $pedido->getCadastro() : null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
    </div>    
</div>