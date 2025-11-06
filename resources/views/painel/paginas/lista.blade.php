@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')


     <section class="content-header">
                    <h1  class="col-sm-6">Páginas</h1>
                     <div class="col-sm-6">
                    {!! Form::open(['route'=>'admin.paginas.lista', 'class'=>'form','method'=>'GET']) !!}
                      <div class="input-group">
                        <input class="form-control" name="search" placeholder="Pesquisar...">

                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                          <a href="{{route('admin.paginas.lista')}}" type="submit" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
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
                  <a href="{{route('admin.categorias.lista',['tipo'=>'site'])}}" class="btn btn-warning btn-xs btn-flat">
                    <i class="fa fa-folder"></i>
                      Categorias</a>
                      <a href="{{route('admin.paginas.novo')}}" class="btn btn-primary btn-xs btn-flat ">
                    <i class="fa fa-plus"></i>
                      Cadastrar</a>
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

                    @foreach($paginas as $pagina)
                    <td><a href="{{route('admin.paginas.editar',['id'=>$pagina->id])}}">{{$pagina->titulo_conteudo}}</a></td>
                    <td>{{@$pagina->categoria->nome_categoria}}</td>
                   
                    <td>{{$pagina->updated_at}}</td>
                    <td>@if($pagina->status == '1')
              <span class="label label-success">Ativo</span>
              @elseif($pagina->status == '2')
              <span class="label label-warning">Pendente</span>
              @elseif($pagina->status == '3')
              <span class="label label-danger">Inativo</span>
              @endif</td>
                    <td>
                    <a href="{{route('admin.paginas.delete',['id'=>$pagina->id])}}" class="btn btn-danger btn-destroy btn-xs"><i class="fa fa-trash-o"></i></a>
                    <a href="{{route('admin.paginas.editar',['id'=>$pagina->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a></td>
                  </tr>
                  @endforeach
                </table>
               
            <div class="box-footer">
              {!!$paginas->render()!!}
            </div>
          
            <!-- /.box-body -->
          </div>

    <hr class="clearfix">

</section>
 

@endsection

@section('pos-script')
<script type="text/javascript">
   
</script>
  @endsection