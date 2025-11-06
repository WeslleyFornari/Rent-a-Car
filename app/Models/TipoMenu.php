<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TipoMenu extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'tipo_menus';
    protected $fillable = ['nome_menu','slug_menu','status'];

    public function menu(){
        return $this->belongsTo(Menu::class)->orderby('ordem','asc');
    }
   
}


