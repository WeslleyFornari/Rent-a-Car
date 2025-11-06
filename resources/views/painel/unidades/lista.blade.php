@extends('templates.painel')
@section('pre-assets')
@endsection
@section('content')


     <section class="content-header">
                    <h1  class="col-sm-6">Páginas</h1>
                     <div class="col-sm-6">
                    {!! Form::open(['route'=>'admin.unidades.lista', 'class'=>'form','method'=>'GET']) !!}
                      <div class="input-group">
                        <input class="form-control" name="search" placeholder="Pesquisar...">

                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                          <a href="{{route('admin.unidades.lista')}}" type="submit" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
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
                 
                      <a href="{{route('admin.unidades.novo')}}" class="btn btn-primary btn-xs btn-flat ">
                    <i class="fa fa-plus"></i>
                      Cadastrar</a>
              </div>
            </div>
            <!-- /.box-header -->
          
                <table class="table box-body table-hover">
                  <tr>
                    
                    <th>Título</th>
                                  
                                       
                    <th>Data</th>                   
                                
                    <th class="col-xs-1">Ações</th>
                  </tr>
                  <tr>

                    @foreach($unidades as $unidade)
                    <td><a href="{{route('admin.unidades.editar',['id'=>$unidade->id])}}">{{$unidade->titulo}}</a></td>
                   
                    <td>{{$unidade->updated_at}}</td>
                    
                    <td>
                    <a href="{{route('admin.unidades.delete',['id'=>$unidade->id])}}" class="btn btn-danger btn-destroy btn-xs"><i class="fa fa-trash-o"></i></a>
                    <a href="{{route('admin.unidades.editar',['id'=>$unidade->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a></td>
                  </tr>
                  @endforeach
                </table>
               
            <div class="box-footer">
              {!!$unidades->render()!!}
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