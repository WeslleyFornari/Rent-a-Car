<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;

class OpcionaisGrupos extends Model
{
   protected $fillable = 
    [
    	'id_grupo',
    	'id_opcional'
    ];
    public function opcional(){
        return $this->hasOne(Opcionais::class,'id','id_opcional');
    }
}
