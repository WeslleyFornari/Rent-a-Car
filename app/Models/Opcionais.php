<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;

class Opcionais extends Model
{
   protected $fillable = 
    [
    	'nome',
    	'media_id',
    	'status'
    ];


     public function media(){
        return $this->hasOne(Media::class,'id','media_id');
    }
}
