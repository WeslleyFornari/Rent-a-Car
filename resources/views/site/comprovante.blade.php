<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
   font-size: 13px;
 }
    td{
      padding-bottom: 2px;
    }
  
</style>
<title>Comprovante Reserva - {{$reserva->cliente->nome}}</title>

<table width="90%" border="0" cellspacing="0" cellpadding="5" style=" margin: 0 auto; font-family:Arial, Helvetica, sans-serif;border:none;" bgcolor="#FFFFFF">
  <tr>
    <td height="" align="center" bgcolor="#FFFFFF" style="color:#fff; padding:15px"><img src="{{asset('min/img/logo.png')}}" width="217" height="68"  /></td>
  </tr>
  <tr>
    <td bgcolor="#84c124" style="color:#fff; font-size:16px;font-weight: bold; "><strong>Reserva</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td><strong>Status</strong></td>
        <td><strong>
          <label>Data Inicio</label>
          </strong></td>
        <td><strong>
          <label>Hora Inicio</label>
          </strong></td>
        <td><strong>
          <label>Data Fim</label>
          </strong></td>
        <td><strong>
          <label>Hora Término</label>
          </strong></td>
      </tr>
      <tr>
        <td>{{$reserva->status}}</td>
        <td>{{$reserva->data_inicio->format('d/m/Y')}}</td>
        <td>{{date('H:i',strtotime($reserva->hora_inicio))}}</td>
        <td>{{$reserva->data_termino->format('d/m/Y')}}</td>
        <td>{{date('H:i',strtotime($reserva->hora_termino))}}</td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td bgcolor="#84c124" style="color:#fff; font-size:16px;font-weight: bold;; font-weight: bold; " >Cliente</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td><strong>Nome</strong></td>
        <td>&nbsp;</td>
        <td><strong>Email</strong></td>
      </tr>
      <tr>
        <td colspan="2">{{$reserva->cliente->nome}}</td>
        <td>{{$reserva->cliente->email}}</td>
      </tr>
      <tr>
        <td><strong>CPF</strong></td>
        <td><strong>
          <label for="label">Data Nascimento</label>
          <br />
        </strong></td>
        <td><strong>CNH</strong></td>
      </tr>
      <tr>
        <td>{{$reserva->cliente->cpf}}</td>
        <td>{{$reserva->cliente->data_nascimento}}</td>
        <td>{{$reserva->cliente->cnh}}</td>
      </tr>
      <tr>
        <td><strong>
          <label for="label2">Validade CNH</label>
        </strong></td>
        <td><strong>Telefone</strong></td>
        <td><strong>Celular</strong></td>
      </tr>
      <tr>
        <td height="18">{{$reserva->cliente->data_cnh->format('d/m/Y')}}</td>
        <td>{{$reserva->cliente->telefone1}}</td>
        <td>{{$reserva->cliente->telefone2}}</td>
      </tr>
      <tr>
        <td><strong>Observação</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>{{$reserva->cliente->observacao}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
   @if(!is_null($reserva->cliente->nome_empresa))
  <tr>
    <td bgcolor="#84c124" style="color:#fff; font-size:16px;font-weight: bold; " >Empresa</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td><strong>Empresa</strong></td>
        <td><strong>CNPJ</strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>{{$reserva->cliente->nome_empresa}}</td>
        <td>{{$reserva->cliente->cnpj}}</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
    @endif
  <tr>
    <td bgcolor="#84c124" style="color:#fff; font-size:16px;font-weight: bold; ">Condutor</td>
  </tr>
  <tr>
    <td>
    @if($reserva->cliente->nome == $reserva->condutor->nome)
     <div class="row">
          <div class="col-sm-12"><label for="">Cliente irá conduzir o veículo</label></div>

     
      </div>
        @else
    <table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td width="24%"><strong>Nome</strong></td>
        <td width="30%"><strong>CPF</strong></td>
        <td width="46%"><label for="label5"><strong>Data Nascimento</strong></label>
          <br /></td>
      </tr>
      <tr>
        <td>{{$reserva->condutor->nome}}</td>
        <td>{{$reserva->condutor->cpf}}</td>
        <td>{{$reserva->cliente->data_nascimento}}</td>
      </tr>
      <tr>
        <td><strong>CNH</strong></td>
        <td><strong>
        <label for="label6">Validade CNH</label>
        <br />
        </strong></td>
        <td><strong>Telefone</strong></td>
      </tr>
      <tr>
        <td>{{$reserva->condutor->cnh}}</td>
        <td>{{$reserva->condutor->data_cnh->format('d/m/Y')}}</td>
        <td>{{$reserva->condutor->telefone}}</td>
      </tr>
    </table>
   @endif
    </td>
  </tr>
  <tr>
    <td bgcolor="#84c124" style="color:#fff; font-size:16px;font-weight: bold; ">Endereço</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td><strong>CEP</strong></td>
        <td><strong>Endereço</strong></td>
        <td><strong>Número</strong></td>
      </tr>
      <tr>
        <td>{{$reserva->cliente->cep}}</td>
        <td>{{$reserva->cliente->endereco}}</td>
        <td>{{$reserva->cliente->numero}}</td>
      </tr>
      <tr>
        <td><strong>
          <label>Complemento</label>
        </strong></td>
        <td><strong>Bairro</strong></td>
        <td><strong>Cidade/Estado</strong></td>
      </tr>
      <tr>
        <td>{{@$reserva->cliente->complemento}}</td>
        <td>{{$reserva->cliente->bairro}}</td>
        <td>{{$reserva->cliente->cidade}}/{{$reserva->cliente->estado}}</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#84c124" style="color:#fff; font-size:16px;font-weight: bold; ">Pagamento</td>
  </tr>
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="5" cellpadding="0">
      
      @if(!is_null($reserva->compovante_transferencia))
       <tr>
        <td><strong><label for="label7">A Vísta </label></strong></td>
        <td><strong>Status</strong></td>
        <td><strong>Valor</strong></td>
      </tr>
       <tr>
        <td>Transferência</td>
        <td>Aguardando Confirmação</td>
        <td>R$ {{number_format($reserva->valor_transferencia,2,',','.')}}</td>
      </tr>
      @else
      <tr>
        <td><strong>
          <label for="label7">Forma de Pagamento:</label>
        </strong> {{@$reserva->pagamento->tipo_pagamento}}</td>
        <td><strong>Status:</strong> {{@$reserva->pagamento->titulo_pagamento}}</td>
        <td><strong>Valor:</strong> R$ {{@number_format($reserva->valor,2,',','.')}}</td>
      </tr>
  
      
      @endif
    </table>
  </td>
  </tr>
 <tr>
    <td bgcolor="#84c124" style="color:#fff; font-size:16px;font-weight: bold; ">INFORMAÇÕES GERAIS SOBRE A RESERVA
</td>
  </tr>
  <tr>
  <td style="font-size:13px;">
    <p><strong>Participação</strong>: CO PARTICIPAÇÃO EM CASO DE COLISÃO/ AVARIA VALOR: R$3.500,00 COPARTICIPAÇÃO EM CASO DE ROUBO/FURTO/INCÊNDIO/PERDA TOTAL. VALOR: R$5.000,00 Observação:    Em caso de multas e infrações de trânsito, será cobrado R$50,00 por multa, referente a taxa administrativa, mais o valor integral da multa sem qualquer desconto. O veículo é entregue no início da locação limpo, em caso de necessidade de lavagem na devolução, será cobrado R$40,00 ref. À lavagem simples ou R$90,00 ref. À lavagem completa (motor, caixa de ar, assoalho, etc). O valor deverá ser pago no ato da devolução. </p>
   
    <hr style="margin:5px 0" />
    <p><strong>TAXA DE ENTREGA/DEVOLUÇÃO ENTRE FILIAIS</strong><br />
      ATENÇÃO: Não estão descritos nesta confirmação os valores de entrega / devolução em caso de retirada e entrega fora da LOCADORA ou ainda caso o veículo seja devolvido em outra filial - A TABELA ESTÁ DISPONÍVEL NA LOCADORA NO MOMENTO DA LOCAÇÃO</p>
    <p>&nbsp;</p>
    <p><strong>VALIDADE DA RESERVA</strong><br />
      IMPORTANTE: O Prazo desta reserva é valido até 1 (hora) da data / hora para entrega do veículo, após este horário a Vestro Multimarcas LTDA EPP não garante a efetividade e validade da mesma.</p>
    <p>&nbsp;</p>
    <p><strong>REQUISITOS PARA LOCAÇÃO</strong><br />
      O CLIENTE, para retirar o veículo, deve possuir 21 anos de idade, no mínimo 2 anos de habilitação e crédito pré-aprovado pela Vestro Multimarcas LTDA  EPP com cartão de crédito a aprovação poderá ser imediata.</p>
    <p>&nbsp;</p>
    <p><strong>INFORMAÇÕES CADASTRAIS</strong><br />
      ATENÇÃO: Para sua comodidade e segurança, as informações inseridas em seu cadastro estão sujeitas à confirmação após qualquer reserva realizada na Vestro Multimarcas LTDA EPP. Caso haja qualquer divergência dos dados que possa acarretar em problemas na reserva, você será informado através do seu e-mail cadastrado.<br />
      </p>
    <p><strong>ONDE RETIRAR O VEÍCULO:</strong><br />
      FILIAL Vestro Locadora de Veiculos LTDA EPP </p>
    <p>AV. DR. JOÃO BATISTA SOARES DE QUEIROZ JUNIOR, 1210 <br />
      TEL. 12 39336225</p></td>
  </tr>

</table>
<script>
window.print();

</script>