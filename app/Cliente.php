<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Pedido;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
    	'user_id',
    	'nome',
    	'nascimento',
    	'telefone',
    	'cep',
    	'cidade',
    	'bairro',
    	'logradouro',
    	'numero_residencial',
    	'complemento_endereco',
    	'ponto_referencia'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
