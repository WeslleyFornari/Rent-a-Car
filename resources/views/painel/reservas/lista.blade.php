@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')
<section class="content-header">
  <h1  class="col-sm-6">Reservas</h1>

  <div class="col-sm-6">
    {!! Form::open(['route'=>'admin.reservas.lista', 'class'=>'form','method'=>'GET']) !!}
    <div class="input-group">
      <input class="form-control" name="search" placeholder="Pesquisar...">

      <div class="input-group-btn">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        <a href="{{route('admin.reservas.lista')}}" type="submit" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
  <div class="clearfix"></div>
</section>
<div class="col-sm-12 m-top-md">

<a href="{{route('admin.reservas.novo')}}" class="btn btn-primary btn-xs pull-right">Cadastrar</a>
</div>

<section class="col-xs-12">
  <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
    <div class="row">
       <div class="col-sm-4"><strong>Cliente</strong></div>
      <div class="col-sm-2"><strong>Grupo</strong></div>
        <div class="col-sm-2"><strong>Inicio</strong></div>     
      <div class="col-sm-2 text-left"><strong>Valor</strong></div>
      <div class="col-sm-1 text-center"><strong>Status</strong></div>
      <div class="col-sm-1 pull-right"><strong>Ações</strong></div>
    </div>
  </div>
  <div class="visible-xs m-top-lg clearfix"></div>
  @foreach($reservas as $reserva)
  <div class="box box-solid p-all-xs m-bottom-xs ">
    <div class="row">
      <div class="col-sm-4 col-xs-6">
        <label for="" class="visible-xs">Cliente</label>
        <a href="{{route('admin.reservas.show',['id'=>$reserva->id])}}" class="">{{$reserva->cliente->nome}}</a>
      </div>
      <div class="col-sm-2 col-xs-6">
        <label for="" class="visible-xs">Grupo</label>
       {{$reserva->grupo_veiculo->nome_grupo}}
      </div>
      <div class="col-sm-2 col-xs-6">
        <label for="" class="visible-xs">Inicio</label>
       {{$reserva->data_inicio}}
      </div>
      
        <div class="col-sm-2 col-xs-4">
          <label for="" class="visible-xs">Fim</label>
        {{$reserva->data_termino}}
        </div>
       
           <div class="col-sm-1 col-xs-4 text-center  p-all-0">
            <label for="" class="visible-xs">Status</label>
           {{$reserva->status}}
          </div>
          <div class="col-sm-1 col-xs-4 pull-right text-center"> 
           <label for="" class="visible-xs">Ações</label>
           <a href="#" class="btn btn-danger btn-destroy btn-xs"><i class="fa fa-trash-o"></i>
           </a>
           <a href="{{route('admin.reservas.show',['id'=>$reserva->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-eye"></i></a>
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