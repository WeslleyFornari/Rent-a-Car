<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Congressos extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'congressos';
    protected $fillable = [
    		'titulo',
			'ano_edicao',
			'texto',
			'programacao',
			'valor',
			'valor_associado',
			'qtd_inscricoes',
			'status',
			'status_inscricao',
			'data_encerramento',
			'data_horario',
			'nome_local',
			'cep',
			'endereco',
			'numero',
			'bairro',
			'cidade',
			'estado',
			'complemento',
			'slug_titulo',
			'texto_adicional'
			];
		
		public function galeria(){
	        return $this->belongsTo(Galeria::class);
		}
		public function conferencistasCongresso(){
			return $this->belongsTo(ConferencistasCongressos::class);
		}

		
}


