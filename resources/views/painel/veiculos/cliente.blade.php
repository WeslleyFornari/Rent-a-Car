@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')
<section class="content-header p-all-0 m-top-md">
                    <h1 class="col-sm-12">Cliente </h1>
    <div class="clearfix"></div>
  </section>




<div class="panel m-top-md col-sm-12">
  <div class="panel-heading">
     <h2 class="panel-title"><strong></strong></h2> 
  </div>
  <div class="panel-body">
    <div class="col-sm-5 col-xs-12">
      <label for="">Nome</label>
            <h3 class="m-top-0">{{@$cliente->nome}}</h3>
     </div>
   <div class="col-sm-3">
     <div class="form-group">
       <label>Data Nascimento</label>
       <h4>{{@$cliente->data_nascimento}}</h4>
     </div>
   </div>
     <div class="col-sm-4">
     <div class="form-group">
       <label>Tipo</label>
       <h4><input type="radio" name="iCheck" class="flat-green" @if($cliente->tipo == "pessoa_fisica") checked @endif> Pessoa Física 
       <input type="radio" name="iCheck" class="flat-green" @if($cliente->tipo == "pessoa_juridica") checked @endif> Pessoa Jurídica</h4>
     </div>
   </div>
     <div class="clearfix"></div>
     <div class="col-sm-3 col-xs-12">
      <label for="">Empresa</label>
            <H4>{{@$cliente->nome_empresa}}</H4>
     </div>
      <div class="col-sm-4 col-xs-12">
      <label for="">CPF/CNPJ</label>
            <H4>{{@$cliente->cpf}} | {{@$cliente->cnpj}}</H4>
     </div>
      <div class="col-sm-3 col-xs-12">
      <label for="">Telefone</label>
            <H4>{{@$cliente->telefone1}}</H4>
     </div>
      <div class="col-sm-2 col-xs-12">
      <label for="">Celular</label>
            <H4>{{@$cliente->telefone2}}</H4>
     </div>
      <div class="col-sm-3 col-xs-12">
      <label for="">CEP</label>
            <H4>{{@$cliente->cep}}</H4>
     </div>
     <div class="col-sm-4 col-xs-12">
      <label for="">Endereço</label>
            <H4>{{@$cliente->endereco}}</H4>
     </div>
     <div class="col-sm-3 col-xs-12">
      <label for="">Bairro</label>
            <H4>{{@$cliente->bairro}}</H4>
     </div>
     <div class="col-sm-2 col-xs-12">
      <label for="">Número</label>
            <H4>{{@$cliente->numero}}</H4>
     </div>
      <div class="col-sm-3 col-xs-12">
      <label for="">Cidade</label>
            <H4>{{@$cliente->cidade}}</H4>
     </div>
      <div class="col-sm-4 col-xs-12">
      <label for="">Estado</label>
            <H4>{{@$cliente->estado}}</H4>
     </div>
      <div class="col-sm-3 col-xs-12">
      <label for="">Complemento</label>
            <H4>{{@$cliente->complemento}}</H4>
     </div>
      </div>
      <div class="col-sm-12">
        <button class="btn btn-primary btn-md pull-left m-bottom-md" onclick="history.go(-1);">Voltar</button>
      </div>
</div>




   @endsection

   @section('pos-script')
   <script type="text/javascript">

   </script>
   @endsection