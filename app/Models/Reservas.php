<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Reservas extends Model
{
    protected $dateFormat = 'Y-m-d';
    protected $dates = ['data_inicio','data_termino'];
    protected $fillable = 
    [
    	'id_grupo_veiculos',
		'id_veiculo',
		'id_cliente',
		'data_inicio',
		'hora_inicio',
		'data_termino',
		'hora_termino',
		'valor',
		'status',
        'id_condutor',
        'compovante_transferencia',
        'valor_transferencia',
        'key'
    ];

    public function cliente(){
        return $this->hasOne(Clientes::class,'id','id_cliente');
    }
    public function condutor(){
        return $this->hasOne(Condutores::class,'id','id_condutor');
    }
    public function grupo_veiculo(){
        return $this->hasOne(GruposVeiculos::class,'id','id_grupo_veiculos');
    }
    public function veiculo(){
        return $this->hasOne(Veiculos::class,'id','id_veiculo');
    }
    public function pagamento_reserva(){
        return $this->hasOne(PagamentosReservas::class,'id_reserva','id');
    }
  
    public function cartao_calcao(){
        return $this->hasOne(CartaoCalcao::class,'reserva_id','id');
    }
  
  /*
    public function setValorAttribute($value){
       $newVal = str_replace(".","", $value);
       $newVal = str_replace(",",".", $newVal);
        return $this->attributes['valor'] =   $newVal ;

    }*/
}



