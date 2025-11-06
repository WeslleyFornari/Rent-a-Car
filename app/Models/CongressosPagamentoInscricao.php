<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CongressosPagamentoInscricao extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'congressos_pagamento_inscricoes';
    protected $fillable = [
			'token_pagseguro',
			'nome',
			'cpf',
			'sexo',
			'email',
			'data_nascimento',
			'telefone',
			'cep',
			'endereco',
			'numero',
			'complemento',
			'bairro',
			'cidade',
			'estado',
			'pais',
			'valor_congresso',
			'status'
			];	


		public function inscritosCongresso(){
			return $this->belongsTo(CongressosInscricao::class, 'token_pagseguro','token_pagseguro');
		}
		public function statusPagamento(){
       	 return $this->hasOne(StatusPagamento::class,'id','status');
    	}
		
		
}


