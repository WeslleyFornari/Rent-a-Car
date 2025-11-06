@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<section class="content-header">
  <h1 class="col-sm-6">Todos Materiais</h1>
    
               
                <div class="col-sm-6">
                   {!! Form::open(['route'=>'painel.material.lista', 'class'=>'form','method'=>'GET']) !!}
                      <div class="input-group">
                        <input class="form-control" name="search" placeholder="Pesquisar...">

                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                          <a href="{{route('painel.material.lista')}}" type="submit" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
                        </div>
                      </div>
                    {!! Form::close() !!}
              </div>
      
  <div class="clearfix"></div>
</section>
<section class="col-xs-12">

  <div class="box box-default col-xs-12 m-top-md">
    <div class="box-header with-border">
      <i class="fa fa-book"></i>
      <h3 class="box-title">Lista</h3>
      <div class="pull-right">
     <a href="{{route('painel.material.novo')}}" class="btn btn-xs btn-primary btn-flat btn-block"><i class="fa fa-plus"></i> Cadastrar</a>
   </div>
    </div>
    <!-- /.box-header -->
   
      <table class="table box-body table-hover">
        <tr>

          <th>Título</th>
          <th>Tipo</th>                   
          <th>Acesso</th>                   
          <th>Status</th>                   
          <th style="width: 120px">Ações</th>
        </tr>
        <tr>
        @foreach($materiais as $material)
          <td>{{$material->titulo}}</td>
          <td>{{$material->tipo}}</td>
          <td>@if($material->somente_assinante == 'sim')
              <div class="col-sm-2 col-xs-2"><i class="fa fa-lock nivel-seguranca"></i></div>
              @else
              <div class="col-sm-2 col-xs-2"><i class="fa fa-unlock "></i></div>
              @endif</td>
          <td>@if($material->status == '1')
              <span class="label label-success">Ativo</span>
              @elseif($material->status == '2')
              <span class="label label-warning">Pendente</span>
              @elseif($material->status == '3')
              <span class="label label-danger">Inativo</span>
              @endif
          </td>
          <td>
        
            <a href="{{route('painel.material.delete',['id'=>$material->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
            <a href="{{route('painel.material.editar',['id'=>$material->id])}}" class="btn btn-primary btn-xs "><i class="fa fa-pencil"></i></a></td>
          </tr>
          @endforeach
        </table>

     <div class="box-footer">
     <div class="col-sm-8 col-sm-offset-2 text-center">
       
        </div>
     </div>

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
