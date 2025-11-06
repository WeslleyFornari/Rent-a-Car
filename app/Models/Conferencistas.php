<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Conferencistas extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'conferencistas';
    protected $fillable = [
			'nome',
			'texto',
			'foto'
			];
}


