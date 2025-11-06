
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif" >
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF" style="padding:20px;"><img src="http://abiblica.org.br/min/img/logo.png" width="191" height="63" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><p>Olá, <strong>{{$name}}</strong> sua assinatura anual no valor de <strong>R$ {{$anuidade}}, </strong>já está disponível pra pagamento.</p>
      @if(!empty($observacao))
      {!!$observacao!!}
      @endif
    <p>Clique no botão abaixo para realizar o pagamento</p></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><div><!--[if mso]>
  <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{route('faturamento.anuidade',['id'=>$id])}}" style="height:40px;v-text-anchor:middle;width:200px;" arcsize="0%" strokecolor="#29562f" fillcolor="#3cbe43">
    <w:anchorlock/>
    <center style="color:#ffffff;font-family:sans-serif;font-size:13px;font-weight:bold;">REALIZAR PAGAMENTO</center>
  </v:roundrect>
<![endif]--><a href="{{route('faturamento.anuidade',['id'=>$id])}}"
style="background-color:#3cbe43;border:1px solid #29562f;border-radius:0px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:40px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;mso-hide:all;">REALIZAR PAGAMENTO</a></div></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="272" align="left" bgcolor="#333333" style="color:#ffffff; font-size:12px;"><a href="mailto:atendimento@abiblica.org.br" style="color:#fff;">E-mail: atendimento@abiblica.org.br</a> <br>
      (11) 97978-8892 | (11) 95279-7387</td>
    <td width="50%" align="right" bgcolor="#333333" style="color:#ffffff; font-size:12px;">Av. Brigadeiro Luís Antônio 993, Sala 205<br>
CEP: 01317-001 São Paulo – SP</td>
  </tr>
</table>
