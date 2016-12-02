<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Funcionario extends Model
{
	protected $table = 'funcionarios';

    protected $fillable = [
    	'cargo'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
     
}
