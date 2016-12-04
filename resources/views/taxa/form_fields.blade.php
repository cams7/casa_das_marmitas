<div class="row">
    <div class="form-group col-md-6">
    	{{ Form::label('taxa', 'Valor:', array()) }}
        {{ Form::text('taxa', null, array('class' => 'form-control', 'placeholder' => 'Valor da taxa')) }}
    </div>
    <div class="form-group col-md-6">
    	{{ Form::label('tipo_taxa', 'Tipo:', array()) }}       
        {{ Form::select('tipo_taxa', array('1'=>'Atraso', '2'=> 'Entrega', '3'=> 'Extra'), $taxa == null ? '2' : null, array('class' => 'form-control')) }}
    </div>
</div>