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
        $custo = preg_replace('/[^\d,\.]/', '', $custo);
        $custo = preg_replace('/,(\d{2})$/', '.$1', $custo);
        $this->attributes['custo'] = $custo;
    }

    public function getCusto()
    {
        $custo = $this->attributes['custo'];
        if($custo == null)
            return null;

        return "R$".number_format($custo, 2, ',', '.');
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
                # code...
                break;
        }

        return $tamanho;
    }
}
