<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Comentarios extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'comentarios';
    protected $fillable = ['nome','email','tipo_comentario','id_resposta','classificacao','status'];
}