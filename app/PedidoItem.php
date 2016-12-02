<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pedido;
use App\Produto;

class PedidoItem extends Model
{
	protected $table = 'pedido_itens';

    protected $fillable = [
    	'pedido_id',
    	'produto_id',
    	'quantidade'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
