@extends('templates.painel')
@section('pre-assets')
@endsection
@section('content')



<section class="content-header">
  <h1>Todos os Evendos</h1>
  
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
      
        <table class="table box-body table-hover">
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
            <td>{{gmdate('d/m/Y',strtotime($evento->data_inicio_agenda))}}@if($evento->data_final_agenda) - {{gmdate('d/m/Y',strtotime($evento->data_final_agenda))}}@endif
            </td>
            <td>@if($evento->status_agenda == '1')
              <span class="label label-success">Ativo</span>
              @elseif($evento->status_agenda == '2')
              <span class="label label-warning">Pendente</span>
              @elseif($evento->status_agenda == '3')
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
<script type="text/javascript">
  $(".btn-danger").click(function(e){
    var url = $(this).attr('href');
      e.preventDefault();
      $(this).closest('tr').addClass("remove-row");
         swal({
        title: 'Tem certeza?',
        text: "Você irá remover definitivamente este item",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, remover!'
      }).then(function () {
      
        $.get(url,function(data){
         $(".remove-row").remove()
           swal({
            title: 'Sucesso!',
            text: 'Item removido com sucesso.',
             type:'success',
            timer: 2500,
            }
          )
        })
       
      })
  })
</script>
  @endsection
  