<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
class ProdutosPagseguro extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'produtos_pagseguro';
    protected $fillable = [
	    'id',
		'quantidade',
		'descricao',
		'valor',
		'token'
		];
}
