<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Faturamento extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'faturamento';
    protected $fillable = [
        'user_id',
        'dia_faturamento',
        'mes_faturamento',
        'ano_faturamento',
        'valor_faturamento',
        'status_faturamento',
        'observacao',
        'token_pagseguro'
];
    public function user(){
        return $this->hasOne(User::class,  'id','user_id');
    }
    public function dados(){
        return $this->hasOne(CadastroAssociado::class,'user_id','user_id');
    }
}
