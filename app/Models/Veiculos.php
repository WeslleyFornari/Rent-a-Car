<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculos extends Model
{
    protected $fillable = 
   [
   	
		'grupo_veiculo_id',
		'nome',
		'final_placa',
		'cor',
		'status',
		'data_inicio_reserva',
		'data_final_reserva'
	];
	public function grupo(){
        return $this->hasOne(GruposVeiculos::class,'id','grupo_veiculo_id');
    }
     public function reservas(){
        return $this->hasMany(Reservas::class,'id_veiculo','id')->orderBy("id","desc");
    } 
}
