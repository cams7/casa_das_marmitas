<div class="form-group">
    {{ Form::label('quantidade_total', 'Quantidade total:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">
        {{ Form::text('quantidade_total', null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('total_pedido', 'Custo total:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">
        {{ Form::text('total_pedido', $pedido != null ? $pedido->getCustoTotal() : null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('situacao_pedido', 'Situação:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">        
        {{ Form::select('situacao_pedido', array('1'=>'Pendente', '2'=> 'Em trânsito', '3'=> 'Cancelado', '4'=> 'Entregue'), null, array('class' => 'form-control')) }}
    </div>
</div>
