@extends('templates.painel')
@section('pre-assets')
@endsection
@section('content')



<section class="content-header">
  <h1>Agenda</h1>
  
  <div class="clearfix"></div>
</section>
<form action='teste.php' method='post' >
 
  <section class="col-xs-12">
   
   
   
    
    <div class="box box-default col-xs-12 m-top-md">
      <div class="box-header with-border">
        <i class="fa fa-book"></i>

        <h3 class="box-title">Lista</h3>
        <div class="pull-right">
      <a href="{{route('painel.agenda.novo')}}" class="btn btn-primary btn-xs btn-flat "> <i class="fa fa-plus"></i> Cadastrar</a>
    </div>
      </div>
      <!-- /.box-header -->
      
        <table class="table box-body">
          <tr>
            
            <th>Evento</th>
            <th>Local</th>                   
            <th>Data</th>                   
            <th>Status</th>                   
            <th class="col-xs-1">Ações</th>
          </tr>
          @foreach ($agenda as $evento)
          <tr>
            
            <td>{{$evento->titulo_agenda}}</td>
            <td>{{$evento->local_agenda}}</td>
            <td>{{$evento->data_inicio_agenda}}@if(@$evento->data_final_agenda) - {{$evento->data_final_agenda}} @endif
            
            </td>
            <td>@if($evento->status == '1')
              <span class="label label-success">Ativo</span>
              @elseif($evento->status == '2')
              <span class="label label-warning">Pendente</span>
              @elseif($evento->status == '3')
              <span class="label label-danger">Inativo</span>
              @endif</td>
            <td>
              <a href="{{route('painel.agenda.delete',['id'=>$evento->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
              <a href="{{route('painel.agenda.editar',['id'=>$evento->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a></td>
            </tr>
            @endforeach
          </table>
          
        
        
        <!-- /.box-body -->
      </div>

      <hr class="clearfix">

    </section>
    
  </form>
  

  @endsection

  @section('pos-script')

  @endsection