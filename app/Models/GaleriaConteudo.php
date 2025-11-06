<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class GaleriaConteudo extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'galeria_conteudo';
    protected $fillable = [
    		'conteudo_id',
			'foto'
			];
}


