<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Pedido;

class Taxa extends Model
{
	protected $table = 'taxas';

    protected $fillable = [
    	'user_id',
    	'taxa',
    	'tipo_taxa'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
