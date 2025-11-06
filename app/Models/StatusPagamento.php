<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class StatusPagamento extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'status_pagamento';
    protected $fillable = [
    	'cod_pagseguro',
    	'titulo_pagamento',
		'descricao_pagamento',
		
    ];    
}
