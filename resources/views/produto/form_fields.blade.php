<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('nome', 'Nome:', array()) }}
    	{{ Form::text('nome', null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome da marmita')) }}
    </div>

    <div class="form-group col-md-2">
        {{ Form::label('custo', 'Custo:', array()) }}
        {{ Form::text('custo', null, array('class' => 'form-control', 'placeholder' => 'Custo da marmita')) }}
    </div>
    
    <div class="form-group col-md-4">
        {{ Form::label('tamanho', 'Tamanho:', array()) }}    
        {{ Form::select('tamanho', array('1'=>'Grande', '2'=> 'Média', '3'=> 'Pequena'), null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('ingredientes', 'Ingredientes:', array()) }}
        {{ Form::textarea('ingredientes', null, array('class' => 'form-control', 'placeholder' => 'Ingredientes da marmita')) }}
    </div>
</div>