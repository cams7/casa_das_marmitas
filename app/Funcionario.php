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
    
    public function getCargo()
    {
        $cargo = null;

        switch ($this->attributes['cargo']) {
            case 1:
                $cargo = "Gerente";
                break;
            case 2:
                $cargo = "Atendente";
                break;            
            default:
                # code...
                break;
        }

        return $cargo;
    }  
     
}
