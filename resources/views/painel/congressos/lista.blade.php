@extends('templates.painel')
@section('pre-assets')
@endsection
@section('content')

<section class="content-header">
  <h1>Congressos</h1>
  <div class="clearfix"></div>
</section>
<section class="col-xs-12">
  <div class="box box-default col-xs-12 m-top-md">
    <div class="box-header with-border">
      <i class="fa fa-book"></i>

      <h3 class="box-title">Lista</h3>
      <div class="pull-right p-all-0">
        <a href="{{route('painel.congressos.novo')}}" class="btn btn-primary btn-xs btn-flat">Cadastrar Congresso</a>
      </div>
    </div>
    <!-- /.box-header -->

    <table class="table box-body table-hover">
      <tr>
        <th>Congresso</th>
        <th>Ano</th>                   
        <th>Status</th>                   
        <th class="col-xs-1">Ações</th>
      </tr>
      <tr>
        @foreach($congressos as $congresso)
        <td>{{$congresso->titulo}}</td>
        <td>{{@$congresso->ano_edicao}}</td>
        <td>@if($congresso->status == '1')
              <span class="label label-success">Ativo</span>
              @elseif($congresso->status == '2')
              <span class="label label-warning">Pendente</span>
              @elseif($congresso->status == '3')
              <span class="label label-danger">Inativo</span>
              @endif</td>
        <td>
          <a href="{{route('painel.congressos.delete',['id'=>$congresso->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
          <a href="{{route('painel.congressos.editar',['id'=>$congresso->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a></td>
        </tr>
        @endforeach
      </table>



      <!-- /.box-body -->
    </div>

    <hr class="clearfix">

  </section>


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