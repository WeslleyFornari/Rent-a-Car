<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;

class LegendaPagseguro extends Model
{
    protected $fillable = 
    [
    	'cod_pagseguro',
    	'titulo_pagamento',
    	'descricao_pagamento'
    ];
}
