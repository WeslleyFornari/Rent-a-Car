<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ImagemDestaque extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'img_destaques';
    protected $fillable = ['conteudo_id','arquivo','mostrar_artigo','style','created_at','updated_at'];

     public function conteudo(){
        return $this->hasOne(Conteudo::class);
    }
}
