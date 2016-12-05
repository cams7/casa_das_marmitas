<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Pedido;

class Cliente extends Model
{
    protected $table = 'clientes';
    //protected $dates = ['dob'];

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

    public function setNascimento($nascimento)
    {
        $this->attributes['nascimento'] = preg_replace('~.*(\d{2})\/(\d{2})\/(\d{4}).*~', '$3-$2-$1', $nascimento);
    }

    public function getNascimento()
    {
        $nascimento = $this->attributes['nascimento'];
        if($nascimento == null)
            return null;
        
        return preg_replace('~.*(\d{4})\-(\d{2})\-(\d{2}).*~', '$3/$2/$1', $nascimento);
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
        $this->attributes['cep'] = preg_replace('~.*(\d{5})\-(\d{3}).*~', '$1$2', $cep);
    }

    public function getCep()
    {
        $cep = $this->attributes['cep'];
        if($cep == null)
            return null;

        return preg_replace('~.*(\d{5})(\d{3}).*~', '$1-$2', $cep);
    }

    public static function getClientes($nome = null)
    {
        $clientes = Cliente::orderBy('id', 'desc');

        if($nome != null && $nome !== '') 
        {
            $nome = "%". trim($nome) ."%";
            $clientes =  $clientes->where('nome', 'ILIKE', $nome);
        }

        return $clientes;
    }
}
