<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
	 protected $dateFormat = 'Y-m-d';
	protected $dates = ['data_cnh'];
	protected $fillable = [
		
  	"nome",
  	"email",
	"telefone1",
	"telefone2",
	"cep",
	"endereco",
	"numero",
	"complemento",
	"bairro",
	"cidade",
	"estado",
	"tipo",
	"data_nascimento",
	"cpf",
	"cnpj",
	"nome_empresa",
	"observacao",
	"cnh",
	"data_cnh",
	];

	public function condutor(){
        return $this->hasOne(Condutores::class,'id_cliente','id');
    }
    
}
