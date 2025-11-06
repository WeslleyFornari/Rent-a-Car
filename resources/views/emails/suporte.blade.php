
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif" bgcolor="">
  <tr>
    <td colspan="2" align="center" style="padding:20px;">
 <img src="{{asset('min/img/logo.png')}}" width="auto" height="50">
      </td>
  </tr>
  <tr>
    <td width="200"><strong>Nome</strong></td>
    <td width="200"><strong>E-mail</strong></td>
  </tr>
  <tr>
    <td>{{$nome}}</td>
    <td>{{$email}}</td>
  </tr>
  <tr>
    <td><strong>Telefone</strong></td>
    <td><strong>Assunto</strong></td>
  </tr>
  <tr>
    <td>{{$telefone}}</td>
    <td>{{$assunto}}</td>
  </tr>
  <tr>
    <td><strong>Mensagem</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">{{$mensagem}}</td>
  </tr>
</table>