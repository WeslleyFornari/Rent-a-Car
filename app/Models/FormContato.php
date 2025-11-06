<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FormContato extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'fale_conosco';
    protected $fillable = ["nome","email","telefone","assunto","localizacao","mensagem","lido"];
}


