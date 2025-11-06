
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
        <td>&nbsp;</td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong>Celular</strong></td>
      </tr>
      <tr>
        <td height="18">&nbsp;</td>
        <td>&nbsp;</td>
        <td><a href="https://api.whatsapp.com/send?phone=55{{ preg_replace('([^0-9])','',$cliente_telefone2)}}">{{$cliente_telefone2}}</a></td>
      </tr>
    </table></td>
  </tr>
   
  <tr>
    <td bgcolor="#84c124" style="color:#fff; font-size:16px;font-weight: bold; ">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
 

</table>
</div>