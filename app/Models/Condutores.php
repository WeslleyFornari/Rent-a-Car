<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;

class Condutores extends Model
{
	protected $dateFormat = 'Y-m-d';
	protected $dates = ['data_cnh'];
	 protected $fillable = [
		"id_cliente",
		"nome",
		"cnh",
		"data_cnh",
		"cpf",
		"data_nascimento",
		"telefone"
		];


 	
}
