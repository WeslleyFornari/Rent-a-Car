@extends('layouts.painel')
@section('pre-assets')
<style>
  
  @media (min-width: 1024px) {
   
    .box{
      margin-bottom: 0px !important;
      border-radius: 0 !important;
    } 
  }
</style>
@endsection
@section('content')
<section class="content-header">
  <h1  class="col-sm-6">Grupo de Veículos</h1>

  <div class="col-sm-6">
    {!! Form::open(['route'=>'admin.grupo_veiculos.lista', 'class'=>'form','method'=>'GET']) !!}
    <div class="input-group">
      <input class="form-control" name="search" placeholder="Pesquisar...">

      <div class="input-group-btn">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        <a href="{{route('admin.grupo_veiculos.lista')}}" type="submit" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
  <div class="clearfix"></div>
</section>
<div class="col-sm-12 m-top-md pull-right text-right">
    
    <a href="{{route('admin.opcionais.index')}}" class="btn btn-success btn-xs">Opcionais</a>
    <a href="{{route('admin.grupo_veiculos.novo')}}" class="btn btn-primary btn-xs">Cadastrar</a>
</div>

<section class="col-xs-12">
  <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
    <div class="row">
       <div class="col-sm-1"><strong>Sigla</strong></div>
      <div class="col-sm-7"><strong>Grupo</strong></div>
     
     
     
      <div class="col-sm-2 text-left"><strong>Valor Padrão</strong></div>
      <div class="col-sm-1 text-center"><strong>Status</strong></div>
      <div class="col-sm-1 pull-right"><strong>Ações</strong></div>
    </div>
  </div>
  <div class="visible-xs m-top-lg clearfix"></div>
  @foreach($veiculos as $veiculo)
  <div class="box box-solid p-all-sm ">
    <div class="row">
      <div class="col-sm-1 col-xs-2">
        <label for="" class="visible-xs">Sigla</label>
        {{$veiculo->sigla_grupo}}
      </div>
      <div class="col-sm-7 col-xs-10">
        <label for="" class="visible-xs">Grupo</label>
        <a class="text-muted" href="{{route('admin.grupo_veiculos.editar',['id'=>$veiculo->id])}}"><strong>{{$veiculo->nome_grupo}}</strong></a>
      </div>

      
        <div class="col-sm-2 col-xs-3">
          <label for="" class="visible-xs">Valor Padrão</label>
          R$ {{number_format($veiculo->valor_padrao,2,',','.')}}
        </div>
       
           <div class="col-sm-1 col-xs-4 text-center  p-all-0">
            <label for="" class="visible-xs">Status</label>
           {{$veiculo->status}}
          </div>
          <hr class="visible-xs col-xs-12 p-all-0 m-all-xs">
          <div class="col-sm-1 col-xs-4 pull-right text-center"> 
           <label for="" class="visible-xs">Ações</label>
           <a href="{{route('admin.grupo_veiculos.delete',['id'=>$veiculo->id])}}" class="btn btn-danger btn-destroy btn-xs"><i class="fa fa-trash-o"></i>
           </a>
           <a href="{{route('admin.grupo_veiculos.editar',['id'=>$veiculo->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a>
         </div>
       </div>
     </div>


     @endforeach

       
  <hr class="clearfix">
     
  </section>
   <h3  class="col-sm-6 m-top-0">Promoções</h3>
   <div class="col-sm-6 text-right">
     <a href="{{route('admin.grupo_veiculos.promo')}}" class="btn btn-warning btn-xs">Promoções</a>
   </div>
<section class="col-xs-12">
  <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
    <div class="row">
       <div class="col-sm-5"><strong>Nome</strong></div>
      <div class="col-sm-3"><strong>Grupos</strong></div>
      <div class="col-sm-2 text-left"><strong>Desconto</strong></div>
      <div class="col-sm-1 text-center"><strong>Status</strong></div>
      <div class="col-sm-1 pull-right"><strong>Ações</strong></div>
    </div>
  </div>




       
  <hr class="clearfix">
     
  </section>

   @endsection

   @section('pos-script')
   <script type="text/javascript">
  
   </script>
   @endsection