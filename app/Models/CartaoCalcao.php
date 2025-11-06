<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class CartaoCalcao extends Model
{
 
 protected $table = 'cartao_calcao';
    protected $fillable = 
    [
    	'reserva_id',
        'titular',
        'numero_cartao',
        'validade',
        'cvv',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
    ];

    public function reserva(){
        return $this->hasOne(Clientes::class,'id','reserva_id');
    }
}



