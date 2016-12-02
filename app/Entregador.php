<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Empresa;


class Entregador extends Model
{
	protected $table = 'entregadores';

    protected $fillable = [
    	'user_id',
    	'empresa_id',
    	'nome',
    	'cpf',
    	'rg',
    	'celular'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
