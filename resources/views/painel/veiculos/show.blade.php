@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')
<section class="content-header p-all-0 m-top-md">
                    <h1 class="col-sm-12">Veículo </h1>
    <div class="clearfix"></div>
  </section>


<div class="panel m-top-md col-sm-12">
  <div class="panel-heading">
     <h2 class="panel-title"><strong></strong></h2> 
  </div>
  <div class="panel-body">
      <div class="col-sm-6 col-xs-12 text-center">

       <img src="{{@$veiculo->grupo->media->fullpatch()}}" alt="">
      </div>
   <div class="col-sm-6">
     <div class="form-group">
       <label>Grupo {{@$veiculo->grupo->sigla_grupo}} - {{@$veiculo->grupo->nome_grupo}}</label>
     </div>
   </div>
  
        <div class="col-sm-2 col-xs-4">
          <div class="form-group">
            <label for="">Nome</label>
            <h3> {{@$veiculo->nome}} </h3>
          </div>
        </div>
        <div class="col-sm-2 col-xs-4">
          <div class="form-group">
            <label for="">Final Placa</label>
            <h3> {{@$veiculo->final_placa}}</h3>
          </div>
        </div>
        <div class="col-sm-2 col-xs-4">
          <div class="form-group">
            <label for="">Cor</label>
           <h3> {{@$veiculo->cor}}</h3>
          </div>
        </div>
      </div>

</div>


<div class="col-sm-12 p-all-0">
  <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
    <div class="row">
      <div class="col-sm-3"><strong>Nome</strong></div>
    
      
      <div class="col-sm-4"><strong>Endereço</strong></div>
      <div class="col-sm-2"><strong>Telefone</strong></div>
     
      <div class="col-sm-2"><strong>Celular</strong></div>
      <div class="col-sm-1 text-center"><strong>Ações</strong></div>
    </div>
  </div>
  <div class="visible-xs m-top-lg clearfix"></div>
  

     <div class="box box-solid p-all-sm ">
       @foreach($veiculo->reservas as $item)
    <div class="row">
      <div class="col-sm-3 col-xs-10">
        <label for="" class="visible-xs">Nome</label>
        <a class="text-muted" href="#"><strong>{{@$item->cliente->nome}}</strong></a>
      </div>
          <div class="col-sm-1 col-xs-2 pull-right text-center"> 
           <label for="" class="visible-xs">Ações</label>
           <a href="{{route('admin.veiculos.cliente',@$item->cliente->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
         </div>
    
        <div class="col-sm-4 col-xs-6">
          <label for="" class="visible-xs">Endereço</label>
          {{@$item->cliente->endereco}}, {{@$item->cliente->numero}}, {{@$item->cliente->complemento}}<br>
          {{@$item->cliente->bairro}}, {{@$item->cliente->cidade}}, {{@$item->cliente->estado}}, {{@$item->cliente->cep}}
        </div>
          <div class="col-sm-2 col-xs-3">
           <label for="" class="visible-xs">Telefone</label>
           {{@$item->cliente->telefone1}}
         </div>
          
     
         
           <div class="col-sm-2 col-xs-3">
            <label for="" class="visible-xs">Celular</label>
          {{@$item->cliente->telefone2}}
          </div>
       </div>
       <hr>
     @endforeach
     </div>

  <hr class="clearfix">
     
  </div>


   @endsection

   @section('pos-script')
   <script type="text/javascript">

   </script>
   @endsection