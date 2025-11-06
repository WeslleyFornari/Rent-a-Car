@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
     <section class="content-header">
      <h1>Categorias Livros</h1>
     
    <div class="clearfix"></div>
  </section>

   
<section class="col-xs-12">
   

<div class="box box-default col-xs-12 m-top-md">
            <div class="box-header with-border">
              <i class="fa fa-book"></i>

              <h3 class="box-title">Lista</h3>
<div class="pull-right">
  <a href="{{route('painel.categoria-livros.novo')}}" class="btn btn-xs btn-primary btn-flat btn-block">Cadastrar Categoria</a>
</div>

            </div>
            <!-- /.box-header -->
           
                <table class="table box-body table-hover">
                  <tr>
                    
                    <th>Categoria</th>
                    <th>Livros Cadastrados</th>                   
                    <th class="col-xs-1">Ações</th>
                  </tr>
                  @foreach($categorias as $categoria)
                  <tr>
                    
                    <td>{{$categoria->nome_categoria_livros}}</td>
                    <td>10</td>
                    
                    <td>
                    <a href="{{route('painel.categoria-livros.delete',['id'=>$categoria->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                    <a href="{{route('painel.categoria-livros.editar',['id'=>$categoria->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a></td>
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