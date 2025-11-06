@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')
<section class="content-header">
  <h1  class="col-sm-6">Veículos</h1>

  <div class="col-sm-6">
    {!! Form::open(['route'=>'admin.veiculos.lista', 'class'=>'form','method'=>'GET']) !!}
    <div class="input-group">
      <input class="form-control" name="search" placeholder="Pesquisar...">

      <div class="input-group-btn">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        <a href="{{route('admin.veiculos.lista')}}" type="submit" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
  <div class="clearfix"></div>
</section>
<div class="col-sm-12 m-top-md">

<a href="{{route('admin.veiculos.novo')}}" class="btn btn-primary btn-xs pull-right">Cadastrar</a>
</div>

<section class="col-xs-12">
  <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
    <div class="row">
      <div class="col-sm-5"><strong>Veículo</strong></div>
    
      
      <div class="col-sm-1"><strong>Placa</strong></div>
      <div class="col-sm-1"><strong>Cor</strong></div>
     
      <div class="col-sm-2 text-center"><strong>Histórico</strong></div>
      <div class="col-sm-1 text-center"><strong>Status</strong></div>
      <div class="col-sm-2 text-center"><strong>Ações</strong></div>
    </div>
  </div>
  <div class="visible-xs m-top-lg clearfix"></div>
  @foreach($veiculos as $veiculo)
  <div class="box box-solid p-all-sm ">
    <div class="row">
      <div class="col-sm-5 col-xs-12">
        <label for="" class="visible-xs">Veículo</label>
        <a class="text-muted" href="{{route('admin.veiculos.show',['id'=>$veiculo->id])}}"><strong>{{$veiculo->nome}}</strong></a>
      </div>

    
        <div class="col-sm-1 col-xs-3">
          <label for="" class="visible-xs">Placa</label>
          {{$veiculo->final_placa}}
        </div>
          <div class="col-sm-1 col-xs-3">
           <label for="" class="visible-xs">Cor</label>
           {{$veiculo->cor}}
         </div>
          
      
         
           <div class="col-sm-2 col-xs-4 text-center  p-all-0">
            <label for="" class="visible-xs">Histórico</label>
             <a href="{{route('admin.veiculos.show',['id'=>$veiculo->id])}}" class="btn btn-default btn-xs m-left-xs"><i class="fa fa-eye"></i> Reservas</a>
          </div>
           <div class="col-sm-1 col-xs-4 text-center  p-all-0">
            <label for="" class="visible-xs">Status</label>
            @if($veiculo->status == 'disponivel')
              <div class="label label-success">{{$veiculo->status}}</div>
            @endif 
            @if($veiculo->status == 'inativo')
            <div class="label label-danger">{{$veiculo->status}}</div>
            @endif
            @if($veiculo->status == 'reservado')
            <div class="label label-warning">{{$veiculo->status}}</div>
            @endif
              
          </div>
          <div class="col-sm-2 col-xs-4 pull-right text-center"> 
           <label for="" class="visible-xs">Ações</label>
           <a href="{{route('admin.veiculos.delete',['id'=>$veiculo->id])}}" class="btn btn-danger btn-destroy btn-xs"><i class="fa fa-trash-o"></i>
           </a>
         
           <a href="{{route('admin.veiculos.editar',['id'=>$veiculo->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a>
         </div>
       </div>
     </div>


     @endforeach

    
  <hr class="clearfix">
     
  </section>


   @endsection

   @section('pos-script')
   <script type="text/javascript">

   </script>
   @endsection