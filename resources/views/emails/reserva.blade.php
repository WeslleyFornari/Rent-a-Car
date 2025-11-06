
<div style="padding:50px; background:#ededed; font-size:14px; width: 100%">
<table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-family:Arial, Helvetica, sans-serif;border:1px solid #ededed;" bgcolor="#FFFFFF">
  <tr>
    <td height="176" align="center" bgcolor="#FFFFFF" style="color:#fff; padding:15px"><img src="{{asset('min/img/logo.png')}}" width="260" height="82"  /></td>
  </tr>
  <tr>
    <td bgcolor="#84c124" style="color:#fff; font-size:16px;font-weight: bold; "><strong>Reserva</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td><strong>Status</strong></td>
        <td><strong>Grupo</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>{{$reserva_status}}</td>
        <td>{{$reserva_grupo}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
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
        <td>{{$reserva_data_inicio}}</td>
        <td>{{date('H:i',strtotime($reserva_hora_inicio))}}</td>
        <td>{{$reserva_data_termino}}</td>
        <td>{{date('H:i',strtotime($reserva_hora_termino))}}</td>
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
        <td colspan="2">{{$cliente_nome}}</td>
        <td>{{$cliente_email}}</td>
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
        <td>{{$cliente_cpf}}</td>
        <td>{{$cliente_data_nascimento}}</td>
        <td>{{$cliente_cnh}}</td>
      </tr>
      <tr>
        <td><strong>
          <label for="label2">Validade CNH</label>
        </strong></td>
        <td><strong>Telefone</strong></td>
        <td><strong>Celular</strong></td>
      </tr>
      <tr>
        <td height="18">{{$cliente_data_cnh}}</td>
        <td>{{$cliente_telefone1}}</td>
        <td>{{$cliente_telefone2}}</td>
      </tr>
      <tr>
        <td><strong>Observação</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>{{$cliente_observacao}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
   @if(!is_null($cliente_cnpj))
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
        <td>{{$cliente_nome_empresa}}</td>
        <td>{{$cliente_cnpj}}</td>
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
    @if($cliente_nome == $condutor_nome)
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
        <td>{{$condutor_nome}}</td>
        <td>{{$condutor_cpf}}</td>
        <td>{{$cliente_data_nascimento}}</td>
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
        <td>{{$condutor_cnh}}</td>
        <td>{{$condutor_data_cnh}}</td>
        <td>{{$condutor_telefone}}</td>
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
        <td>{{$cliente_cep}}</td>
        <td>{{$cliente_endereco}}</td>
        <td>{{$cliente_numero}}</td>
      </tr>
      <tr>
        <td><strong>
          <label>Complemento</label>
        </strong></td>
        <td><strong>Bairro</strong></td>
        <td><strong>Cidade/Estado</strong></td>
      </tr>
      <tr>
        <td>{{@$cliente_complemento}}</td>
        <td>{{$cliente_bairro}}</td>
        <td>{{$cliente_cidade}}/{{$cliente_estado}}</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#84c124" style="color:#fff; font-size:16px;font-weight: bold; ">Pagamento</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td><strong>
          <label for="label7">Forma de Pagamento</label>
        </strong></td>
        <td><strong>Status</strong></td>
        <td><strong>Valor</strong></td>
      </tr>
      <tr>
        <td>{{@$pagamento_tipo_pagamento}}</td>
        <td>{{@$pagamento_titulo_pagamento}}</td>
        <td>R$ {{@$reserva_valor}}</td>
      </tr>
    </table></td>
  </tr>
 

</table>
</div>