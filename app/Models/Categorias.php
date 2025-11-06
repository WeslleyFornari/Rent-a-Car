<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Categorias extends Model implements Transformable
{
    use TransformableTrait;
  
    protected $table = 'categorias';
    protected $fillable = ['id','nome_categoria','sessao_id','slug_categoria','parent_id','status'];

    public function sessao(){
        return $this->hasOne(Sessao::class);
    }

  	public function parent()
	{
	    return $this->belongsTo(Categorias::class, 'parent_id');
	}

	public function children()
	{
	    return $this->hasMany(Categorias::class, 'parent_id');
	}
}
