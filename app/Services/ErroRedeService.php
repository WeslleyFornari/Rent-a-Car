<?php 
namespace RW940cms\Services;


/**
* 
*/
class ErroRedeService{
	

 public function consultaErro($code,$mensagem){


 	$arrayErros = array(

 	'erro_00'=>'Reserva realizada com sucesso.',
 	'erro_53'=>'Transação não permitida para o emissor.',
	'erro_56'=>'Erro nos dados reportados. Tente novamente.',
	'erro_57'=>'afiliação: comerciante inválido.',
	'erro_58'=>'Não autorizado. Entre em contato com o emissor.',
	'erro_69'=>'Transação não permitida para este produto ou serviço.',
	'erro_72'=>'Entre em contato com o emissor.',
	'erro_74'=>'Falha de comunicação. Tente novamente.',
	'erro_79'=>'Cartão expirado. A transação não pode ser reenviada. Entre em contato com o emissor.',
	'erro_80'=>'Não autorizado. Entre em contato com o emissor. (Fundos insuficientes).',
	'erro_83'=>'Não autorizado. Entre em contato com o emissor.',
	'erro_84'=>'Não autorizado. A transação não pode ser reenviada. Entre em contato com o emissor.',
	'erro_101'=>'Não autorizado. Problemas no cartão, entre em contato com o emissor.',
	'erro_102'=>'Não autorizado. Verifique a situação da loja com o emissor.',
	'erro_103'=>'Não autorizado. Por favor, tente novamente.',
	'erro_104'=>'Não autorizado. Por favor, tente novamente.',
	'erro_105'=>'Não autorizado. Cartao restrito.',
	'erro_106'=>'Erro no processamento do emissor. Por favor, tente novamente.',
	'erro_107'=>'Não autorizado. Por favor, tente novamente.',
	'erro_108'=>'Não autorizado. Valor não permitido para este tipo de cartão.',
	'erro_109'=>'Não autorizado. Cartão inexistente.',
	'erro_110'=>'Não autorizado. Tipo de transação não permitido para este cartão.',
	'erro_111'=>'Não autorizado. Fundos insuficientes.',
	'erro_112'=>'Não autorizado. A data de validade expirou.',
	'erro_113'=>'Não autorizado. Risco moderado identificado pelo emissor.',
	'erro_114'=>'Não autorizado. O cartão não pertence à rede de pagamento.',
	'erro_115'=>'Não autorizado. Excedeu o limite de transações permitido no período.',
	'erro_116'=>'Não autorizado. Entre em contato com o emissor do cartão.',
	'erro_117'=>'Transação não encontrada.',
	'erro_118'=>'Não autorizado. Cartão bloqueado.',
	'erro_119'=>'Não autorizado. Código de segurança inválido',
	'erro_121'=>'Erro no processamento. Por favor, tente novamente.',
	'erro_122'=>'Transação enviada anteriormente.',
	'erro_123'=>'Não autorizado. O portador solicitou o fim das recorrências no emissor.',
	'erro_124'=>'Não autorizado. Entre em contato com a Rede',
	'erro_204'=>'O titular do cartão não está registrado no programa de autenticação do emissor.',
);

	if(!array_key_exists('erro_'.$code,$arrayErros)){
		return $mensagem;
	}else{
		return $arrayErros['erro_'.$code];
	}
 }
	
	
	
	
}
?>