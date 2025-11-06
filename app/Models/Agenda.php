<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Agenda extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'agenda';
    protected $fillable = [
    		"titulo_agenda",
			"slug_agenda",
			"hora_inicio_agenda",
			"hora_final_agenda",
			"data_inicio_agenda",
			"data_final_agenda",
			"qtd_horas",
			"cep_agenda",
			"local_agenda",
			"endereco_agenda",
			"numero_agenda",
			"complemento_agenda",
			"bairo_agenda",
			"cidade_agenda",
			"estado_agenda",
			"valor_agenda",
			"status_agenda",
			"texto_agenda"
			];
}


