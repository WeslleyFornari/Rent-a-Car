<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Regionais extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'regionais';
    protected $fillable = [
			'regiao',
			'nome_responsavel',
			'telefone',
			'email',
			'cep',
			'endereco',
			'numero',
			'complemento',
			'bairro',
			'cidade',
			'estado'
	];

    public function sessao(){
        return $this->hasOne(Sessao::class);
    }
}

