<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Menu extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'menu';
    protected $fillable = [
    	'titulo',
        'slug_menu',
        'ordem',
        'id_conteudo',
        'status',
        'ocultar_texto',
        'icone_texto',
        'class_custom',
        'id_custom',
        'id_menu_pai',
        'tipo_menu_id',
        'link_custom',

		];

   public function conteudo(){
        return $this->hasOne(Conteudo::class,'id','id_conteudo');
    }
}


