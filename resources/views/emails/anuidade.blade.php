
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif" >
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF" style="padding:20px;"><img src="http://abiblica.org.br/min/img/logo.png" width="191" height="63" /></td>
  </tr>
  <tr>
    <td height="151" colspan="2" align="center"><p align="center">Olá, <strong>{{$name}},</strong> nosso  site <strong>{{route('home')}}</strong> foi  reformulado e, durante os últimos meses, estávamos em fase de desenvolvimento e  validação da nova plataforma.</p>
      <p align="center"> A partir  de agora, você terá acesso a uma <strong>ÁREA DE  ASSOCIADO</strong>, onde poderá manter seu <strong>cadastro  atualizado</strong> com dados pessoais e acadêmicos.</p>
Para acessar a plataforma basta clicar no link abaixo:    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><table width="50%" border="0" cellspacing="0" cellpadding="5" bgcolor="#CCCCCC">
      <tr>
        <td colspan="2" align="center"><a href="{{route('cadastro.index')}}">{{route('cadastro.index')}}</a></td>
      </tr>
      <tr>
        <td width="26%"><strong>Login:</strong></td>
        <td width="74%">{{$email}}</td>
      </tr>
      <tr>
        <td><strong>Senha:</strong></td>
        <td>{{$password}}</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><p align="center">Estamos    utilizando, agora, o <strong>Pagseguro</strong> como intermediador dos pagamentos, o que facilitará, em muito, os pagamentos    de anuidades, inscrições para eventos promovidos pela ABIB e muito mais.</p><p align="center">
    Sua <strong>anuidade deste ano</strong> já está disponível    no botão abaixo:</p></td>
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
    <td colspan="2" align="center">Muito obrigado pela sua participação.</td>
  </tr>
  <tr>
    <td width="272" align="left" bgcolor="#333333" style="color:#ffffff; font-size:12px;"><a href="mailto:atendimento@abiblica.org.br" style="color:#fff;">E-mail: atendimento@abiblica.org.br</a> <br>
      (11) 97978-8892 | (11) 95279-7387</td>
    <td width="50%" align="right" bgcolor="#333333" style="color:#ffffff; font-size:12px;">Av. Brigadeiro Luís Antônio 993, Sala 205<br>
CEP: 01317-001 São Paulo – SP</td>
  </tr>
</table>
