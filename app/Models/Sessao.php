<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Sessao extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'sessao_conteudo';
    protected $fillable = ['nome_sessao','status'];

    
}
