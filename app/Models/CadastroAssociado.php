<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CadastroAssociado extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'cadastro_associado';
    protected $fillable = [
        'id',
       "numero_associado",
        "user_id",
        "telefone",
        "cpf",
        "data_nascimento",
        "sexo",
        "profissao",
        "cep",
        "endereco",
        "numero",
        "complemento",
        "bairro",
        "cidade",
        "estado",
        "pais",
        "tradicao_religiosa",
        "especializacao_biblica_antigo_testamento",
        "especializacao_biblica_novo_testamento",
        "docente",
        "diciplica_docente",
        "instituicao_docente",
        "pesquisador",
        "grupo_pesquisa",
        "instituicao_pesquisa",
        "cv_lattes",
        "website",
        "status_associado",
        "foto_perfil",
        "cargo"
];

    public function formacao(){
        return $this->belongsTo(FormacaoAssociado::class);
    }
    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
     public function faturamento(){
        return $this->hasMany(Faturamento::class,'user_id','user_id');
    }
    public function getTelefoneAttribute($value){
        $numero = $value;

        if(strlen($numero) == 10){
            $novo = substr_replace($numero, '(', 0, 0);
            $novo = substr_replace($novo, ' ', 3, 0);
            $novo = substr_replace($novo, '-', 8, 0);
            $novo = substr_replace($novo, ')', 3, 0);
        }else{

            $novo = $numero;
        }
        return $novo;
   
     }
}
