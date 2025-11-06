<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FormacaoAssociado extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'formacao_especializacao';
    protected $fillable = [
        'user_id',
        'curso',
        'tipo_curso',
        'status',
        'instituicao',
        'data_conclusao'
	];
	 public function user(){
        return $this->hasOne(User::class);
    }
    
    }
