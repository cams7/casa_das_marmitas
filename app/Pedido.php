<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Cliente;
use App\Taxa;
use App\PedidoItem;

class Pedido extends Model
{
	protected $table = 'pedidos';

    protected $fillable = [
    	'user_id',
    	'cliente_id',
    	'taxa_id',
    	'quantidade_total',    	
    	'total_pedido',
    	'situacao_pedido'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function taxa()
    {
        return $this->belongsTo(Taxa::class);
    }

    public function itens()
    {
        return $this->hasMany(PedidoItem::class);
    }
}
