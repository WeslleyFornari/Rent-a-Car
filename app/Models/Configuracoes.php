<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;

class Configuracoes extends Model
{
    protected $table = 'configuracoes';
    protected $fillable = ['id','titulo','parametro','value'];
}
