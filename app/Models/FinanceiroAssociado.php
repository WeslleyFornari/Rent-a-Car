<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FinanceiroAssociado extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'financeiro_associado';
    protected $fillable = [
        'cadastro_associado_id',
        'dia_vencimento',
        'telefone',
        'mes_vencimento',
        "ano_vencimento",
        'valor_anuidade'
        
];
   
}
