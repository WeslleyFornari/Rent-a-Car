@extends('templates.painel')
@section('pre-assets')
@endsection
@section('content')


<section class="content-header">
  <h1  class="col-sm-6">Cotações</h1>
  <div class="col-sm-6">
    {!! Form::open(['route'=>'admin.cotacoes.lista', 'class'=>'form','method'=>'GET']) !!}
    <div class="input-group">
      <input class="form-control" name="search" placeholder="Pesquisar...">

      <div class="input-group-btn">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        <a href="{{route('admin.cotacoes.lista')}}" type="submit" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
  <div class="clearfix"></div>
</section>


<section class="col-xs-12">
  <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
    <div class="row">
      <div class="col-sm-2"><strong>Veículo</strong></div>
      <div class="col-sm-4"><strong>Dados</strong></div>
      
      <div class="col-sm-1 p-all-0"><strong>Entrada</strong></div>
      <div class="col-sm-1"><strong>Parcela</strong></div>
      <div class="col-sm-2"><strong>Data</strong></div>
      <div class="col-sm-1 pull-right"><strong>Ações</strong></div>
    </div>
  </div>
  <div class="visible-xs m-top-lg clearfix"></div>
  @foreach($cotacoes as $cotacao)
  <div class="box box-solid p-all-sm ">
    <div class="row">
      <div class="col-sm-2 col-xs-12">
        <label for="" class="visible-xs">Veículo</label>
        <a class="text-muted" href="{{route('admin.veiculos.show',['id'=>$cotacao->veiculo_id])}}"><strong>{{$cotacao->veiculo->titulo}}</strong><br>{{$cotacao->veiculo->modelo_versao}}</a>
      </div>

      <div class="col-sm-4 col-xs-12">
        <label for="" class="visible-xs">Nome</label>
        {{$cotacao->nome}} <br> {{$cotacao->email}} |  {{$cotacao->telefone}}
      </div>
        
          <div class="col-sm-1 col-xs-3 p-all-0">
           <label for="" class="visible-xs">Entrada</label>
           R$ {{$cotacao->valor_entrada}}
         </div>
          <div class="col-sm-1 col-xs-3">
           <label for="" class="visible-xs">Parcela</label>
           R$ {{$cotacao->valor_parcela}}
         </div>
         <div class="col-sm-2 col-xs-3">
           <label for="" class="visible-xs">Data</label>
          {{gmdate('d/m/Y H:m',strtotime($cotacao->created_at))}}

         </div>
           <hr class="visible-xs col-xs-12 m-top-xs m-bottom-xs clearfix">
        
          <div class="col-sm-2 col-xs-4 text-center">
            <label for="" class="visible-xs">Destaque</label>
            
          </div>
          <div class="col-sm-1 col-xs-4 pull-right text-center"> 
           <label for="" class="visible-xs">Ações</label>
           <a href="{{route('admin.cotacoes.delete',['id'=>$cotacao->id])}}" class="btn btn-danger btn-destroy btn-xs"><i class="fa fa-trash-o"></i>
           </a>
           
         </div>
       </div>
     </div>


     @endforeach
     <hr class="clearfix">
     {!!$cotacoes->render()!!}
   </section>


   @endsection

   @section('pos-script')
   <script type="text/javascript">
    
   </script>
   @endsection