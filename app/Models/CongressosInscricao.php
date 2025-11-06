<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CongressosInscricao extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'congressos_inscricoes';
    protected $fillable = [
    	"id",
        "congresso_id",
        "nome",
        "email",
        "cpf",
        "cep",
        "endereco",
        "numero",
        "complemento",
        "bairro",
        "cidade",
        "estado",
        "pais",
        "telefone_residencial",
        "telefone_trabalho",
        "telefone_celular",
        "whatsapp",
        "filiacao_religiosa",
        "nome_filiacao_religiosa",
        "instituicao_vinculado",
        "atividade_profissional",
        "fazer_comunicado",
        "token_pagseguro",
        "valor_inscricao"
			];
	public function congresso(){
        return $this->hasOne(Congressos::class,'id','congresso_id');
    }		
	public function dadosPagamento(){
        return $this->hasOne(CongressosPagamentoInscricao::class,'token_pagseguro','token_pagseguro');
    }	

    public function tema(){
        return $this->hasMany(CongressosTemaInscricao::class,'congresso_inscricao_id','id');
    }
}


