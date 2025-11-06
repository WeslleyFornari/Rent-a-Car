<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CongressosTemaInscricao extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'congressos_tema_inscricao';
    protected $fillable = [
    			'id',
    		'congresso_inscricao_id',
			'tema'
			
			];
	
}


