<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Funcionario extends Model
{
	protected $table = 'funcionarios';

	/*protected $attributes = [
    	'nome',
    	'email',
    	'senha',
    	'senha_confirmacao'
	];*/


    protected $fillable = [
    	'cargo'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    /*private $nome;
    private $email;
    private $senha;
    private $senhaConfirmacao;*/

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

    /*public function getNome()
    {
    	return $this->nome;
    }

    public function setNome($nome)
    {
    	$this->nome = $nome;
    }

    public function getEmail()
    {
    	return $this->email;
    }

    public function setEmail($email)
    {
    	$this->email = $email;
    }

    public function getSenha()
    {
    	return $this->senha;
    }

    public function setSenha($senha)
    {
    	$this->senha = $senha;
    }

    public function getSenhaConfirmacao()
    {
    	return $this->senhaConfirmacao;
    }

    public function setSenhaConfirmacao($senhaConfirmacao)
    {
    	$this->senhaConfirmacao = $senhaConfirmacao;
    }*/     
     
}
