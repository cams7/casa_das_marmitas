<div class="form-group">
    {{ Form::label('nome', 'Nome:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-6">
    	{{ Form::text('nome',null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome da marmita')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('ingredientes', 'Ingredientes:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-6">
        {{ Form::textarea('ingredientes', null, array('class' => 'form-control', 'placeholder' => 'Ingredientes da marmita')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('custo', 'Custo:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">
        {{ Form::text('custo', null, array('class' => 'form-control', 'placeholder' => 'Custo da marmita')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('tamanho', 'Tamanho:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">        
        {{ Form::select('tamanho', array('1'=>'Grande', '2'=> 'Média', '3'=> 'Pequena'), null, array('class' => 'form-control')) }}
    </div>
</div>
