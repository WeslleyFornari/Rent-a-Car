<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;

class Promocoes extends Model
{
      protected $table = 'promocoes_grupo';
      protected $fillable = [
		"grupo_veiculos_id",
		"de_diaria",
		"ate_diaria",
		
		"desconto"
       ];
}
