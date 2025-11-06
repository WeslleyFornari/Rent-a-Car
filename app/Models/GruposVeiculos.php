<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use RW940cms\Models\PrecosGrupos;
use RW940cms\Models\GruposVeiculos;
use RW940cms\Models\Configuracoes;
class GruposVeiculos extends Model
{
   protected $fillable = 
   [
   	'sigla_grupo',
   	'nome_grupo',
   	'valor_padrao',
   	'status',
   	'media_id'
	];

public function setValorPadraoAttribute($value)
    {	
    	$value = str_replace(".", "", $value);
    	$value = str_replace(",", ".", $value);
      $this->attributes['valor_padrao'] = $value;
    }
    public function media(){
        return $this->hasOne(Media::class,'id','media_id');
    }

    public function opcionais(){
        return $this->hasMany(OpcionaisGrupos::class,'id_grupo','id');
    } 
    public function promocoes(){
        return $this->hasMany(Promocoes::class,'grupo_veiculos_id','id');
    } 

    public function veiculos(){
        return $this->hasMany(Veiculos::class,'grupo_veiculo_id','id');
    }
    public function adicionais(){
        return $this->hasMany(AdicionaisGrupos::class,'grupo_veiculos_id','id');
    }
    public function tabela_precos(){
        return $this->hasMany(PrecosGrupos::class,'grupo_veiculos_id','id');
    }
    public function qtdEstoque(){
       
       return $this->hasMany(Veiculos::class,'grupo_veiculo_id','id')->where('status','!=','inativo')->count();
    }
    public function qtdEstoqueDisponivel($data_inicio_reserva){
     
     $date = new Carbon($data_inicio_reserva);
     $date->addDays(1);

      //$datetime = new Carbon::createFromFormat('Y-m-d',$data_inicio_reserva)->addDays(1);

       return $this->hasMany(Veiculos::class,'grupo_veiculo_id','id')
       ->where('data_final_reserva','<',$date->format('Y-m-d'))
       ->where('status','!=',['inativo','removido'])
      
        ->count();
    }
    public function valorDiaria($id_grupo,$data_inicio_reserva,$qtd_dias){
       $qtdEstoque = $this->qtdEstoque();
       
       $qtdEstoqueDisponivel = $this->qtdEstoqueDisponivel($data_inicio_reserva);
       if($qtdEstoque > 0){
       $calc = ($qtdEstoqueDisponivel * 100) / $qtdEstoque;
       $calc = ceil($calc);
     }else{
       return null;
     }
      // dd($id_grupo);
      $valor = PrecosGrupos::where('grupo_veiculos_id',$id_grupo)->where('qtd_inicio','<=', $calc)->where('qtd_fim','>=',$calc)->first();
      if(!$valor){
        return GruposVeiculos::find($id_grupo)->valor_padrao;
      }
      return $valor->valor_padrao;
       
    }
    public function descontoAvista(){
       $descontoAvista = Configuracoes::where('parametro','desconto-avista')->first()->value;
          $valorDescontoAvista = $descontoAvista/100;
          $valorDescontoAvista =  round($this->valor_padrao * $valorDescontoAvista,2);
          $valorDescontoAvista =  $this->valor_padrao - $valorDescontoAvista;
          return $valorDescontoAvista;
    }

}
