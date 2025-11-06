@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
     <section class="content-header m-bottom-lg">
      <h1> Editar Categoria Livros </h1>
     
      <div class="clearfix"></div>
    </section>
    <section class="col-sm-6">
      <div class="box box-primary">

        <!-- /.box-header -->
        <!-- form start -->
       {!! Form::model($categoria,['route'=>['painel.categoria-livros.update',$categoria->id],'class'=>'']) !!}
          
          <!-- /.box-body -->
     @include('painel.categoria-livros._form')
  <div class="box-footer">
    <a href="{{route('painel.categoria-livros.lista')}}" class="btn btn-default btn-flat">Voltar</a>
      {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat pull-right"])!!}
    
  </div>


        {!! Form::close() !!}
      </div>
    </section>
  
   



   
   

@endsection