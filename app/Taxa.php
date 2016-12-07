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

    public function setTaxa($taxa)
    {
        $taxa = str_replace(',', '.', $taxa);
        $taxa = preg_replace('/[^\d,\.]/', '', $taxa);
        $taxa = round($taxa, 2);
        $this->attributes['taxa'] = $taxa;
    }

    public function getTaxa()
    {
        $taxa = $this->attributes['taxa'];
        if($taxa == null)
            return null;

        return "R$".number_format($taxa, 2, ',', '.');
    }

    public function getTipo()
    {
        $tipo = null;

        switch ($this->attributes['tipo_taxa']) {
            case 1:
                $tipo = "Atraso";
                break;
            case 2:
                $tipo = "Entrega";
                break;
            case 3:
                $tipo = "Extra";
                break;
            default:
                break;
        }

        return $tipo;
    }

    private static function getFiltroByQuery($query = null)
    {
        $taxas = Taxa::orderBy('id', 'desc');

        if($query != null && $query !== '')
        {
            $query = trim($query);
            $query = str_replace(',', '.', $query);
            $query = preg_replace('/[^\d,\.]/', '', $query);        
            
            if(is_numeric($query))
                $taxas =  $taxas->where('taxa', '>=', $query);
        }

        return $taxas;
    }

    public static function getPaginacaoByQuery($totalPages, $query = null)
    {
        return self::getFiltroByQuery($query)->paginate($totalPages);
    }

    public static function getPesquisaByQuery($query)
    {
        return self::getFiltroByQuery($query)->select('id','taxa')->limit(5)->get();
    }
}
