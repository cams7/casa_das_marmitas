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

    public function setCustoTotal($custoTotal)
    {
        $custoTotal = str_replace(',', '.', $custoTotal);
        $custoTotal = preg_replace('/[^\d,\.]/', '', $custoTotal);
        $custoTotal = round($custoTotal, 2);
        $this->attributes['total_pedido'] = $custoTotal;
    }

    public function getCustoTotal()
    {
        $custoTotal = $this->attributes['total_pedido'];
        if($custoTotal == null)
            return null;

        return "R$".number_format($custoTotal, 2, ',', '.');
    }

    public function getSituacao()
    {
        $situacao = null;

        switch ($this->attributes['situacao_pedido']) {
            case 1:
                $situacao = "Pendente";
                break;
            case 2:
                $situacao = "Em trânsito";
                break;
            case 3:
                $situacao = "Cancelado";
                break;
            case 4:
                $situacao = "Entregue";
                break;
            default:
                # code...
                break;
        }

        return $situacao;
    }

    public function getCadastro()
    {
        $cadastro = $this->attributes['created_at'];
        if($cadastro == null)
            return null;
        
        return preg_replace('~.*(\d{4})\-(\d{2})\-(\d{2}).*~', '$3/$2/$1', $cadastro);
    }

    public static function getPedidos($clienteNome = null)
    {
        $pedidos = Pedido::orderBy('pedidos.id', 'desc');

        if($clienteNome != null && $clienteNome !== '') 
        {
            $clienteNome = "%". trim($clienteNome) ."%";
            $pedidos =  $pedidos->leftJoin('clientes', 'pedidos.cliente_id', '=', 'clientes.id');
            $pedidos =  $pedidos->where('clientes.nome', 'ilike', $clienteNome);
        }

        return $pedidos;
    }
}
