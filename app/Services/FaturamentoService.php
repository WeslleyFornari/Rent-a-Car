<?php 
namespace RW940cms\Services;

use RW940cms\Repositories\Dados_FaturamentoRepository;
use RW940cms\Repositories\Tipo_FaturamentoRepository;
use RW940cms\Repositories\InscricoesRepository;
use RW940cms\Repositories\AlunosRepository;
use RW940cms\Repositories\StatusPagamentoRepository;
class FaturamentoService{
	
	public function __construct( 
        InscricoesRepository $inscricoesRepository,
        AlunosRepository $alunosRepository,
        Dados_FaturamentoRepository $Dados_FaturamentoRepository,
        Tipo_FaturamentoRepository $Tipo_FaturamentoRepository,
        StatusPagamentoRepository $statuspagamentoRepository
    ){
        $this->inscricoesRepository = $inscricoesRepository;
        $this->alunosRepository = $alunosRepository;
        $this->dadosFaturamentoRepository = $Dados_FaturamentoRepository;
        $this->tipoFaturamentoRepository = $Tipo_FaturamentoRepository;
        $this->statuspagamentoRepository = $statuspagamentoRepository;
    }


    public function faturamentoBoleto($dados){

    	$inscricoes = $this->inscricoesRepository->findWhere(['token_inscricao'=>$dados['token_inscricao']])->all();



    	foreach ($inscricoes as $key => $inscricao) {
    		$this->tipoFaturamentoRepository->deleteWhere([
                'id_inscricao'=>$inscricao->id,
                'status_pagamento_aluno'=>'1',
            ]);
    		$this->tipoFaturamentoRepository->create([
    		"tipo_pagamento"=>"boleto",
			"cod_transacao_pagseguro"=>$dados['retorno_xml']['code'],
			"id_inscricao"=>$inscricao->id,
			"status_pagamento_aluno"=>1
			]);
			$nome_fantasia = "";
			if($inscricao->aluno->cpf_aluno != $dados['doc_pagador']){

				$doc_pagador = preg_replace("([^0-9])","",$dados['doc_pagador']);
		        if(strlen($doc_pagador) == "11"){ 
		            $opcao_faturamento = 'PF';
		        }
		        if(strlen($doc_pagador) > "11"){
		            $opcao_faturamento = "PJ";
		            $nome_fantasia = $dados['nome_contato'];

		        }
			}else{
				 $opcao_faturamento = "aluno";
			}
			$this->inscricoesRepository->update([
					'valor_pago'=>$dados['valor_curso'],
					'status_inscricao'=>'pendente',
					'opcao_faturamento'=> $opcao_faturamento
				],$inscricao->id);
			if($inscricao->aluno->cpf_aluno != $dados['doc_pagador']){


			$this->dadosFaturamentoRepository->deleteWhere([
                'id_inscricao'=>$inscricao->id,
            ]);


    		$this->dadosFaturamentoRepository->create([
    				"id_inscricao"=>$inscricao->id,
					"nome_contato"=>$dados['nome_pagador'],
					"email_contato" =>$dados['email_pagador'],
					"tel_contato" =>$dados['tel_pagador'],
					"data_nascimento_contato"=>$dados['data_nascimento_pagador'],
					"nome_fantasia"=>$nome_fantasia,
					"razao_social"=>$nome_fantasia,
					"cnpj"=>$doc_pagador ,
					"cpf"=>$doc_pagador,
					
					"cep_faturamento"=>$dados['cep_pagador'],
					"endereco_faturamento"=>$dados['endereco_pagador'],
					"numero_faturamento"=>$dados['numero_pagador'],
					"complemento_faturamento"=>$dados['complemento_pagador'],
					"bairro_faturamento"=>$dados['bairro_pagador'],
					"cidade_faturamento"=>$dados['cidade_pagador'],
					"estado_faturamento"=>$dados['estado_pagador']
    		]);
    		}
    	}

    }
     public function faturamentoCartao($dados){

    	$inscricoes = $this->inscricoesRepository->findWhere(['token_inscricao'=>$dados['token_inscricao']])->all();



    	foreach ($inscricoes as $key => $inscricao) {
    		$this->tipoFaturamentoRepository->deleteWhere([
                'id_inscricao'=>$inscricao->id,
                'status_pagamento_aluno'=>'1',
            ]);
    		$this->tipoFaturamentoRepository->create([
    		"tipo_pagamento"=>"cartão",
			"cod_transacao_pagseguro"=>$dados['retorno_xml']['code'],
			"id_inscricao"=>$inscricao->id,
			"status_pagamento_aluno"=>$dados['retorno_xml']['statusCode']
			]);
			$nome_fantasia = "";
			if($inscricao->aluno->cpf_aluno != $dados['doc_pagador']){

				$doc_pagador = preg_replace("([^0-9])","",$dados['doc_pagador']);
		        if(strlen($doc_pagador) == "11"){ 
		            $opcao_faturamento = 'PF';
		        }
		        if(strlen($doc_pagador) > "11"){
		            $opcao_faturamento = "PJ";
		            $nome_fantasia = $dados['nome_contato'];

		        }
			}else{
				 $opcao_faturamento = "aluno";
			}
			if($dados['retorno_xml']['statusCode'] = "3"){
				$status_inscricao = "ativo";
			}else{
				$status_inscricao = "pendente";
			}
			$this->inscricoesRepository->update([
					'valor_pago'=>$dados['valor_curso'],
					'status_inscricao'=>$status_inscricao,
					'opcao_faturamento'=> $opcao_faturamento
				],$inscricao->id);
			if($inscricao->aluno->cpf_aluno != $dados['doc_pagador']){

			//deleta por garantia de não ter inscrição repetida
			$this->dadosFaturamentoRepository->deleteWhere([
                'id_inscricao'=>$inscricao->id,
            ]);


    		$this->dadosFaturamentoRepository->create([
    				"id_inscricao"=>$inscricao->id,
					"nome_contato"=>$dados['nome_pagador'],
					"email_contato" =>$dados['email_pagador'],
					"tel_contato" =>$dados['tel_pagador'],
					"data_nascimento_contato"=>$dados['data_nascimento_pagador'],
					"nome_fantasia"=>$nome_fantasia,
					"razao_social"=>$nome_fantasia,
					"cnpj"=>$doc_pagador ,
					"cpf"=>$doc_pagador,
					
					"cep_faturamento"=>$dados['cep_pagador'],
					"endereco_faturamento"=>$dados['endereco_pagador'],
					"numero_faturamento"=>$dados['numero_pagador'],
					"complemento_faturamento"=>$dados['complemento_pagador'],
					"bairro_faturamento"=>$dados['bairro_pagador'],
					"cidade_faturamento"=>$dados['cidade_pagador'],
					"estado_faturamento"=>$dados['estado_pagador'],
					'status_faturamento'=>$status_inscricao
    		]);
    		}
    	}

    }
}
 ?>