<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;

class PagamentosReservas extends Model
{
     protected $fillable = 
   [
   		"id",
		"id_reserva",
		"tipo_pagamento",
		"token_pagseguro",
		"status_pagamento",
		"valor_liquido",
		"taxa_pagseguro",
		"data_valor_disponivel",
	];
	public function statusPagamento(){
        return $this->hasOne(StatusPagamento::class,'cod_pagseguro','status_pagamento');
    }
    public function gettTipoPagamentoAttribute($value)
    {

       
        return ucfirst($value);
       
    }
}
