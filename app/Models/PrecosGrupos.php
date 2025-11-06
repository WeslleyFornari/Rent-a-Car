<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;

class PrecosGrupos extends Model
{
     protected $fillable = 
   [
   		"grupo_veiculos_id",
		"qtd_inicio",
		"qtd_fim",
		"valor_padrao",
	];
}
