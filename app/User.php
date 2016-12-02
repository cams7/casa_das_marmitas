<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Funcionario;
use App\Cliente;
use App\Empresa;
use App\Entregador;
use App\Produto;
use App\Taxa;
use App\Pedido;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function funcionario()
    {
        return $this->hasOne(Funcionario::class, 'id');
    }
    
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }

    public function entregadores()
    {
        return $this->hasMany(Entregador::class);
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public function taxas()
    {
        return $this->hasMany(Taxa::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
    
}
