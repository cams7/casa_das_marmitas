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


    private $excluido = false;
       
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function setExcluido($excluido)
    {
        $this->excluido = $excluido;
    }

    public function isExcluido()
    {
        return $this->excluido;
    }

    public static function getPaginacaoByProdutoId($totalPages, $produtoId)
    {
        return PedidoItem::where('produto_id', '=', $produtoId)->orderBy('id', 'desc')->paginate($totalPages);
    }

    public static function getPaginacaoByPedidoId($totalPages, $pedidoId)
    {
        return self::_getItensByPedidoId($pedidoId)->paginate($totalPages);
    }

    public static function getItensByPedidoId($pedidoId)
    {
        return self::_getItensByPedidoId($pedidoId)->get();
    }

    private static function _getItensByPedidoId($pedidoId)
    {
        return PedidoItem::where('pedido_id', '=', $pedidoId)->orderBy('id', 'desc');
    }

}
