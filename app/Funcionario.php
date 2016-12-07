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

    private static function getFiltroByQuery($query = null)
    {
        $funcionarios = Funcionario::orderBy('funcionarios.id', 'desc');

        if($query != null && $query !== '') 
        {
            $query = "%". trim($query) ."%";
            $funcionarios =  $funcionarios->leftJoin('users', 'funcionarios.id', '=', 'users.id');
            $funcionarios =  $funcionarios->where('users.name', 'ilike', $query);
        }

        return $funcionarios;
    }

    public static function getPaginacaoByQuery($totalPages, $query = null)
    {
        return self::getFiltroByQuery($query)->paginate($totalPages);
    } 
     
}
