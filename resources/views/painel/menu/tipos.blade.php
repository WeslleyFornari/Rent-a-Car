@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')


     <section class="content-header">
                    <h1  class="col-sm-6">Menus</h1>
                
                    
    <div class="clearfix"></div>
  </section>

   
<section class="col-xs-4">
  <div class="box box-default col-xs-12 m-top-md">
    <div class="box-header with-border">
            
            <h3 class="box-title">Cadastrar</h3>
            
            </div>
            <div class="box-body">
              @if(@$menu)
               {!! Form::model($menu,['route'=>['admin.tiposMenu.update',$menu->id],'class'=>'']) !!}
                  @else
               {!! Form::model(null,['route'=>['admin.tiposMenu.store'],'class'=>'']) !!}
               @endif


               <div class="form-group col-sm-12 ">
        <label for="">Status</label><div class="clearfix"></div>
        <div class="col-xs-6">

          <label >
            <input type="radio" name="status"  value="1" class="flat-red" checked="" >
            Ativo
          </label>
        </div>
        <div class="col-xs-6">
          <label>
            <input type="radio" name="status" value="3" class="flat-red" f>
            Inativo
          </label>
        </div>   
      </div>
        
          <div class="col-sm-12 form-group ">
              {!! Form::label('Nome Menu','Nome Menu:') !!}
              {!! Form::text('nome_menu',null,['class'=>'form-control']) !!}
            
          </div>
           <div class="col-sm-12 m-top-sm">
           <button type="submit" class="btn btn-success btn-flat btn-block">SALVAR</button>
          </div>

  {!! Form::close() !!}
            </div>
  </div>
</section>
<section class="col-xs-8">
   

<div class="box box-default col-xs-12 m-top-md">
            <div class="box-header with-border">
              <i class="fa fa-book"></i>

              <h3 class="box-title">Lista</h3>
             
            </div>
            <!-- /.box-header -->
          
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Ações</th>
                       
                        
                    </tr>
                </thead>
                <tbody>
                  @foreach($tiposMenu as $tipoMenu)
                <tr>
                  <td>{{$tipoMenu->nome_menu}}</td>
                  <td>@if($tipoMenu->status == '1')
                            <span class="label label-success">Ativo</span>
                            @elseif($tipoMenu->status == '2')
                            <span class="label label-warning">Pendente</span>
                            @elseif($tipoMenu->status == '3')
                            <span class="label label-danger">Inativo</span>
                            @endif</td>
                  <td>
                    <a href="{{route('admin.tiposMenu.delete',['id'=>$tipoMenu->id])}}" class="btn btn-danger btn-destroy btn-xs"><i class="fa fa-trash-o"></i></a>
                    <a href="{{route('admin.menu.index',['id'=>$tipoMenu->id])}}" class="btn btn-primary btn-xs"><i class="fa fa-bars"></i></a>
                    <a href="{{route('admin.tiposMenu.editar',['id'=>$tipoMenu->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a></td>
                </tr>
                @endforeach
             </tbody>
            </table>
               
            
          
            <!-- /.box-body -->
          </div>

    <hr class="clearfix">

</section>
 

@endsection

@section('pos-script')

  @endsection