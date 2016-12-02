<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Entregador;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
    	'user_id',
    	'nome',
    	'cnpj',
    	'email',
    	'telefone',
    	'cep',
    	'cidade',
    	'bairro',
    	'logradouro',
    	'numero_imovel',
    	'complemento_endereco',
    	'ponto_referencia'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entregadores()
    {
        return $this->hasMany(Entregador::class);
    }
}
