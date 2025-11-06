
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif" bgcolor="#f1f1f1">
  <tr>
    <td colspan="2" align="center" style="padding:20px; background: #000;"><img src="{{asset('min/img/logo.png')}}" style="max-width:100%;height:auto;" /></td>
  </tr>
  <tr>
    <td><strong>Veículo</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><a href="{{$link}}" style="color:#000" target="_blank">{!!$veiculo!!}</a></td>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>{{$telefone}}</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Valor Entrada</strong></td>
    <td><strong>Valor Parcela Pretendida</strong></td>
  </tr>
  <tr>
    <td>{{$valor_entrada}}</td>
    <td>{{$valor_parcela}}</td>
  </tr>
</table>