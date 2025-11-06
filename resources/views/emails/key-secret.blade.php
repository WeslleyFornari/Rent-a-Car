
<div style="padding:50px; background:#ededed; font-size:14px; width:100%;">
<table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-family:Arial, Helvetica, sans-serif;border:1px solid #ededed;" bgcolor="#FFFFFF">
  <tr>
    <td height="176" align="center" bgcolor="#FFFFFF" style="color:#fff; padding:15px"><img src="{{asset('min/img/logo.png')}}" width="260" height="82"  /></td>
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
    <td bgcolor="#84c124" style="color:#fff; font-size:16px;font-weight: bold; ">Palavra secreta</td>
  </tr>
  <tr>
    <td><strong>{{$key}}</strong></td>
  </tr>

  <tr>
    <td></td>
  </tr>

 

</table>
</div>