@extends('templates.painel')
@section('pre-assets')
@endsection
@section('content')


     <section class="content-header">
                    <h1  class="col-sm-6">Notícias</h1>
                     <div class="col-sm-6">
                    {!! Form::open(['route'=>'painel.noticias.lista', 'class'=>'form','method'=>'GET']) !!}
                      <div class="input-group">
                        <input class="form-control" name="search" placeholder="Pesquisar...">

                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                          <a href="{{route('painel.noticias.lista')}}" type="submit" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
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
  <a href="{{route('painel.noticias.novo')}}" class="btn btn-primary btn-xs btn-flat btn-block">
<i class="fa fa-plus"></i>
  Cadastrar Notícia</a>
</div>
            </div>
            <!-- /.box-header -->
          
                <table class="table box-body table-hover">
                  <tr>
                    
                    <th>Título</th>
                    <th>Categoria</th>                   
                                       
                    <th>Data</th>                   
                    <th>Status</th>                   
                    <th class="col-xs-1">Ações</th>
                  </tr>
                  <tr>

                    @foreach($noticias as $noticia)
                    <td>{{$noticia->titulo_conteudo}}</td>
                    <td>{{@$noticia->categoria->nome_categoria}}</td>
                   
                    <td>{{gmdate('d/m/Y',strtotime($noticia->created_at))}}</td>
                    <td>@if($noticia->status == '1')
              <span class="label label-success">Ativo</span>
              @elseif($noticia->status == '2')
              <span class="label label-warning">Pendente</span>
              @elseif($noticia->status == '3')
              <span class="label label-danger">Inativo</span>
              @endif</td>
                    <td>
                    <a href="{{route('painel.noticias.delete',['id'=>$noticia->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                    <a href="{{route('painel.noticias.editar',['id'=>$noticia->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a></td>
                  </tr>
                  @endforeach
                </table>
               
            
          
            <!-- /.box-body -->
          </div>
 {!!@$noticias->render()!!}
    <hr class="clearfix">

</section>
 

@endsection

@section('pos-script')
<script type="text/javascript">
  $("table .btn-danger").click(function(e){
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