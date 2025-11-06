<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<style>
body{
	font-family:'Roboto', sans-serif;

}
</style>
</head>
<body>
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0" style="font-family:'Roboto', sans-serif;">
  <tr>
    <td align="center" bgcolor="#eee"><img src="http://192.168.0.104:8000/min/img/logo.png" width="40%"/></td>
  </tr>
  <tr>
    <td align="center">
    <h2>Sua reserva foi efetuada com sucesso.</h2>
    </td>
  </tr>
</table>
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0" >

  <tr>
    <td width="200"><strong>Nome</strong></td>
    <td width="200"><strong>Data de nascimento</strong>
    </td>
    <td width="200"><strong>Tipo</strong></td>
  </tr>
  <tr>
    <td>{{$nome}}</td>
    <td>{{$data_nasc}}</td>
    <td>{{$tipo}}</td>
  </tr>
  <tr>
    <td width="200"><strong>Empresa</strong></td>
    <td width="200"><strong>CNPJ</strong></td>
    <td width="200"><strong>CPF</strong></td>
  </tr>
  <tr>
    <td width="200">{{$empresa}}</td>
    <td width="200">{{$cnpj}}</td>
    <td width="200">{{$cpf}}</td>
  </tr>
</table>
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <td><strong>Telefone</strong></td>
    <td><strong>Celular</strong></td>
  </tr>
  <tr>
    <td>{{$telefone}}</td>
    <td>{{$telefone}}</td>
  </tr>
</table>
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <td width="200"><strong>CEP</strong></td>
    <td width="200"><strong>Endereço</strong></td>
    <td width="200"><strong>Bairro</strong></td>
  </tr>
  <tr>
    <td width="200">{{$cep}}</td>
    <td width="200">{{$endereco}}</td>
    <td width="200">{{$bairro}}</td>
  </tr>
</table>
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <td width="200"><strong>Cidade</strong></td>
    <td width="200"><strong>Estado</strong></td>
    <td width="200"><strong>Complemento</strong></td>
  </tr>
  <tr>
    <td>{{$cidade}}</td>
    <td>{{$uf}}</td>
    <td>{{$complemento}}</td>
  </tr>
</table>
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <td><strong>Observação</strong></td>
  </tr>
  <tr>
    <td>{{$obervacao}}</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>