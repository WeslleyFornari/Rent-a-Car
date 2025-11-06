@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')


     <section class="content-header">
                    <h1  class="col-sm-6">Categorias</h1>
                    <div class="col-sm-6 text-right">
                      @if($tipo == "blog")  
           <a href="{{route('admin.noticias.lista')}}" class="btn btn-default btn-xs btn-flat">
          <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>

            Voltar</a>
  @elseif($tipo == "site")
<a href="{{route('admin.paginas.lista')}}" class="btn btn-default btn-xs btn-flat">
         <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>

            Voltar</a>
  @endif 
                    </div>
                    
    <div class="clearfix"></div>
  </section>

   
<section class="col-xs-4">
  <div class="box box-default col-xs-12 m-top-md">
    <div class="box-header with-border">
            
            <h3 class="box-title">Cadastrar</h3>
             @if(@$categoria)
            <a href="{{route('admin.categorias.lista',['tipo'=>$tipo])}}" class="btn btn-xs btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> NOVO</a>
            @endif
            </div>
            <div class="box-body">
              @if(@$categoria)
               {!! Form::model($categoria,['route'=>['admin.categorias.update',$categoria->id],'class'=>'']) !!}

                  @else
               {!! Form::model(null,['route'=>['admin.categorias.store'],'class'=>'']) !!}
               @endif

                {!! Form::hidden('sessao_id',@$sessao) !!}
               <div class="form-group col-sm-12 ">
        <label for="">Status</label><div class="clearfix"></div>
        <div class="col-xs-6">

          <label >
            <input type="radio" name="status"  value="1" class="flat-red" @if(@$categoria->status == "1") checked @endif>
            Ativo
          </label>
        </div>
        <div class="col-xs-6">
          <label>
            <input type="radio" name="status" value="3" class="flat-red" @if(@$categoria->status == "3") checked @endif>
            Inativo
          </label>
        </div>   
      </div>
          <div class="col-sm-12 form-group ">
              <label for="">Categoria Pai</label>
           
            <select name="parent_id" id="" class=" form-control">
            <option value="0">Selecione..</option>

             @foreach ($categorias as $cat)
               <option value="{{ $cat->id }}"  @if(@$categoria->id == $cat->id) selected @endif>{{ $cat->nome_categoria }}</option>
               @foreach ($cat->children as $children1)
               <option value="{{ @$children1->id }}" @if(@$categoria->id == $children1->id) selected @endif>|-- {{ $children1->nome_categoria }}</option>
               @foreach ($children1->children as $children2)
               <option value="{{ @$children2->id }}" @if(@$categoria->id == $children2->id) selected @endif>|-- -- {{ $children2->nome_categoria }}</option>
               @foreach ($children2->children as $children3)
               <option value="{{ @$children3->id }}" @if(@$categoria->id == $children3->id) selected @endif>|-- -- -- {{ $children3->nome_categoria }}</option>
               @foreach ($children3->children as $children4)
               <option value="{{ @$children4->id }}" @if(@$categoria->id == $children4->id) selected @endif>|-- -- --  -- {{ $children4->nome_categoria }}</option>
                  @endforeach
                 @endforeach
                @endforeach
              @endforeach
           @endforeach
          </select>
          </div>
          <div class="col-sm-12 form-group ">
              {!! Form::label('Nome Categoria','Nome Categoria:') !!}
              {!! Form::text('nome_categoria',null,['class'=>'form-control']) !!}
            
          </div>
           <div class="col-sm-12 m-top-sm">
           <button type="subimit" class="btn btn-success btn-flat btn-block">SALVAR</button>
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
                @foreach ($categorias as $categoria)
                   
                    <tr>
                        <td>{{ $categoria->nome_categoria }}</td>
                        <td>@if($categoria->status == '1')
                            <span class="label label-success">Ativo</span>
                            @elseif($categoria->status == '2')
                            <span class="label label-warning">Pendente</span>
                            @elseif($categoria->status == '3')
                            <span class="label label-danger">Inativo</span>
                            @endif
                        </td>
                        <td>
                           <a href="{{route('admin.categorias.delete',['tipo'=>$tipo,'id'=>$categoria->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                        <a href="{{route('admin.categorias.editar',['tipo'=>$tipo,'id'=>$categoria->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a>
                        </td>
                     </tr>
                        @foreach ($categoria->children as $children1)
                            <tr>
                                <td>|-- {{ $children1->nome_categoria }}</td>
                                <td>@if($children1->status == '1')
                            <span class="label label-success">Ativo</span>
                            @elseif($children1->status == '2')
                            <span class="label label-warning">Pendente</span>
                            @elseif($children1->status == '3')
                            <span class="label label-danger">Inativo</span>
                            @endif</td>
                            <td>
                                <a href="{{route('admin.categorias.delete',['tipo'=>$tipo,'id'=>$children1->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                        <a href="{{route('admin.categorias.editar',['tipo'=>$tipo,'id'=>$children1->id,'tipo'=>$tipo])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a>
                            </td>
                            </tr>
                            @foreach ($children1->children as $children2)
                            <tr>
                                <td>|-- -- {{ $children2->nome_categoria }}</td>
                                <td>
                                  @if($children2->status == '1')
                            <span class="label label-success">Ativo</span>
                            @elseif($children2->status == '2')
                            <span class="label label-warning">Pendente</span>
                            @elseif($children2->status == '3')
                            <span class="label label-danger">Inativo</span>
                            @endif
                                </td>
                                <td> <a href="{{route('admin.categorias.delete',['tipo'=>$tipo,'id'=>$children2->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                        <a href="{{route('admin.categorias.editar',['id'=>$children2->id,'tipo'=>$tipo])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a></td>
                            </tr>
                                @foreach ($children2->children as $children3)
                                <tr>
                                    <td>|-- -- -- {{ $children3->nome_categoria }}</td>
                                    <td> @if($children3->status == '1')
                            <span class="label label-success">Ativo</span>
                            @elseif($children3->status == '2')
                            <span class="label label-warning">Pendente</span>
                            @elseif($children3->status == '3')
                            <span class="label label-danger">Inativo</span>
                            @endif</td>
                                    <td>
                                      <a href="{{route('admin.categorias.delete',['tipo'=>$tipo,'id'=>$children3->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                        <a href="{{route('admin.categorias.editar',['id'=>$children3->id,'tipo'=>$tipo])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>
                                   @foreach ($children3->children as $children4)
                                  <tr>
                                      <td>|-- -- --  -- {{ $children4->nome_categoria }}</td>
                                      <td> @if($children4->status == '1')
                                          <span class="label label-success">Ativo</span>
                                          @elseif($children4->status == '2')
                                          <span class="label label-warning">Pendente</span>
                                          @elseif($children4->status == '3')
                                          <span class="label label-danger">Inativo</span>
                                          @endif
                                      </td>
                                      <td> 
                                        <a href="{{route('admin.categorias.delete',['tipo'=>$tipo,'id'=>$children4->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                        <a href="{{route('admin.categorias.editar',['id'=>$children4->id,'tipo'=>$tipo])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a>
                                    </td>
                                  </tr>
                                  @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    
               
                  
                @endforeach
             </tbody>
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