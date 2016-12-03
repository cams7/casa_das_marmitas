<div class="form-group">
    {{ Form::label('taxa', 'Valor:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">
        {{ Form::text('taxa', null, array('class' => 'form-control', 'placeholder' => 'Valor da taxa')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('tipo_taxa', 'Tipo:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">        
        {{ Form::select('tipo_taxa', array('1'=>'Atraso', '2'=> 'Entrega', '3'=> 'Extra'), null, array('class' => 'form-control')) }}
    </div>
</div>
