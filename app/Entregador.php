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

    public function setCpf($cpf)
    {
        $this->attributes['cpf'] = preg_replace('~.*(\d{3})\.(\d{3})\.(\d{3})\-(\d{2}).*~', '$1$2$3$4', $cpf);
    }

    public function getCpf()
    {
        $cpf = $this->attributes['cpf'];
        if($cpf == null)
            return null;

        return preg_replace('~.*(\d{3})(\d{3})(\d{3})(\d{2}).*~', '$1.$2.$3-$4', $cpf);
    }     

    public function setCelular($celular)
    {
        $this->attributes['celular'] = preg_replace('~.*\((\d{2})\) (\d{5})\-(\d{4}).*~', '$1$2$3', $celular);
    }

    public function getCelular()
    {
        $celular = $this->attributes['celular'];
        if($celular == null)
            return null;

        return preg_replace('~.*(\d{2})(\d{5})(\d{4}).*~', '($1) $2-$3', $celular);
    }
}
