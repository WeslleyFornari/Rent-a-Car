<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Galeria extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'galeria_congresso';
    protected $fillable = [
    		'congresso_id',
			'foto'
			];
}


