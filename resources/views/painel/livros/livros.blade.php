@extends('templates.painel')
@section('pre-assets')
@endsection
@section('content')

<section class="content-header">
      <h1 class="col-sm-6">Livros</h1>
       {!! Form::open(['route'=>'painel.livros.lista', 'class'=>'form','method'=>'GET']) !!}
                      <div class="input-group">
                        <input class="form-control" name="search" placeholder="Pesquisar...">

                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                          <a href="{{route('painel.livros.lista')}}" type="submit" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
                        </div>
                      </div>
                    {!! Form::close() !!}
      <div class="clearfix"></div>
</section>

   
<section class="col-xs-12">
   
   

<div class="box box-default col-xs-12 m-top-md">
            <div class="box-header with-border">
              <i class="fa fa-book"></i>

              <h3 class="box-title">Catálogo</h3>
               <div class="pull-right">
           <a href="{{route('painel.livros.novo')}}" class="btn btn-xs btn-primary btn-flat btn-block"><i class="fa fa-plus"></i> Adicionar Livro</a>
         </div>
            </div>
            <!-- /.box-header -->
            <div class="">
                <table class="table box-body table-hover">
                  <tr>
                    
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Categoria</th>
                    <th class="col-xs-1 text-center">Ações</th>
                  </tr>
                  @foreach ($livros as $livro)
                  <tr>
                    
                    <td>{{@$livro->titulo_livro}}</td>
                    <td>{{@$livro->autor}}</td>
                    <td>
                      {{@$livro->categoria->nome_categoria_livros}}
                    </td>
                    <td class="col-xs-1  text-center">
                      <a href="{{route('painel.livros.delete',['id'=>$livro->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                    <a href="{{route('painel.livros.editar',['id'=>$livro->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </table>
               
            </div>
          
            <!-- /.box-body -->
          </div>
 {!!@$livros->render()!!}
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