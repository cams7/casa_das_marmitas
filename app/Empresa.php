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

    public function setCnpj($cnpj)
    {
        $this->attributes['cnpj'] = preg_replace('~.*(\d{2})\.(\d{3})\.(\d{3})\/(\d{4})\-(\d{2}).*~', '$1$2$3$4$5', $cnpj);
    }

    public function getCnpj()
    {
        $cnpj = $this->attributes['cnpj'];
        if($cnpj == null)
            return null;

        return preg_replace('~.*(\d{2})(\d{3})(\d{3})(\d{4})(\d{2}).*~', '$1.$2.$3/$4-$5', $cnpj);
    }     

    public function setTelefone($telefone)
    {
        $this->attributes['telefone'] = preg_replace('~.*\((\d{2})\) (\d{4})\-(\d{4}).*~', '$1$2$3', $telefone);
    }

    public function getTelefone()
    {
        $telefone = $this->attributes['telefone'];
        if($telefone == null)
            return null;

        return preg_replace('~.*(\d{2})(\d{4})(\d{4}).*~', '($1) $2-$3', $telefone);
    }

    public function setCep($cep)
    {
        $this->attributes['cep'] = preg_replace('~.*(\d{2})\.(\d{3})\.(\d{3}).*~', '$1$2$3', $cep);
    }

    public function getCep()
    {
        $cep = $this->attributes['cep'];
        if($cep == null)
            return null;

        return preg_replace('~.*(\d{2})(\d{3})(\d{3}).*~', '$1.$2.$3', $cep);
    }
}
