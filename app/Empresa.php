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

    public static function getNomeWithCnjpFormatado($nome, $cnpj)
    {
        return $nome . " < " . self::getCnjpFormatado($cnpj) . " >";
    }

    public function setCnpj($cnpj)
    {
        $this->attributes['cnpj'] = preg_replace('~.*(\d{2})\.(\d{3})\.(\d{3})\/(\d{4})\-(\d{2}).*~', '$1$2$3$4$5', $cnpj);
    }    

    public function getCnpj()
    {
        return self::getCnjpFormatado($this->attributes['cnpj']);
    }

    public static function getCnjpFormatado($cnpj)
    {
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
        $this->attributes['cep'] = preg_replace('~.*(\d{5})\-(\d{3}).*~', '$1$2', $cep);
    }

    public function getCep()
    {
        $cep = $this->attributes['cep'];
        if($cep == null)
            return null;

        return preg_replace('~.*(\d{5})(\d{3}).*~', '$1-$2', $cep);
    } 
 
    private static function getFiltroByQuery($query = null)
    {

        $empresas = Empresa::orderBy('id', 'desc');

        if($query != null && $query !== '')
        {
            $query = "%". trim($query) ."%";
            $empresas =  $empresas->where('nome', 'ilike', $query);
        }

        return $empresas;
    }

    public static function getPaginacaoByQuery($totalPages, $query = null)
    {
        return self::getFiltroByQuery($query)->paginate($totalPages);
    }

    public static function getPesquisaByQuery($query)
    {
        return self::getFiltroByQuery($query)->select('id','nome', 'cnpj')->limit(5)->get();
    }
}
