<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;


class Galerias extends Model 
{

    protected $table = 'galeria';
    protected $fillable = [
    		'conteudo_id',
			'foto',
			'ordem'
	];
}


