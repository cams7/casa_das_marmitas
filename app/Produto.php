<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PedidoItem;

class Produto extends Model
{
	protected $table = 'produtos';

    protected $fillable = [
    	'user_id',
    	'nome',
    	'ingredientes',
    	'custo',
    	'tamanho'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function itensPedido()
    {
        return $this->hasMany(PedidoItem::class);
    }


    public function setCusto($custo)
    {
        $custo = str_replace(',', '.', $custo);
        $custo = preg_replace('/[^\d,\.]/', '', $custo);
        $custo = round($custo, 2);
        $this->attributes['custo'] = $custo;
    }

    public function getCustoByQuantidade($quantidade)
    {
        $custo = $this->attributes['custo'];        
        if($custo == null)
            return null;

        $custo *= $quantidade;

        return "R$".number_format($custo, 2, ',', '.');
    }

    public function getCusto()
    {
        return $this->getCustoByQuantidade(1);
    }

    public function getTamanho()
    {
        $tamanho = null;

        switch ($this->attributes['tamanho']) {
            case 1:
                $tamanho = "Grande";
                break;
            case 2:
                $tamanho = "Média";
                break;
            case 3:
                $tamanho = "Pequena";
                break;
            default:
                break;
        }

        return $tamanho;
    }

    private static function getFiltroByQuery($query = null) 
    {
        $produtos = Produto::orderBy('id', 'desc');

        if($query != null && $query !== '')
        {
            $query = "%". trim($query) ."%";
            $produtos =  $produtos->where('nome', 'ilike', $query);
        }

        return $produtos;
    }

    public static function getPaginacaoByQuery($totalPages, $query = null)
    {
        return self::getFiltroByQuery($query)->paginate($totalPages);
    }

    public static function getPesquisaByQuery($query)
    {
        return self::getFiltroByQuery($query)->select('id','nome','tamanho')->limit(5)->get();
    }
}
