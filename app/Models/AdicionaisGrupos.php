<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;

class AdicionaisGrupos extends Model
{
	protected $fillable = [
  	"grupo_veiculos_id",
	"titulo",
	"valor",
	];

	public function setValoAttribute($value)
    {	
    	$value = str_replace(".", "", $value);
    	$value = str_replace(",", ".", $value);
      	$this->attributes['valor_padrao'] = $value;
    }
}
