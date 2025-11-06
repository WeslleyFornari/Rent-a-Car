@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
     <section class="content-header m-bottom-lg">
      <h1> Cadastrar Categoria </h1>
     
      <div class="clearfix"></div>
    </section>
    <section class="col-sm-6">
      <div class="box box-primary">

        <!-- /.box-header -->
        <!-- form start -->
     {!! Form::model(null,['route'=>['painel.categorias-conteudo.store'],'class'=>'']) !!}
          
          <!-- /.box-body -->
     @include('painel.categorias-conteudo._form')
  <div class="box-footer">
    <a href="{{route('painel.categorias-conteudo.lista')}}" class="btn btn-default btn-flat">Voltar</a>
      {!! Form::submit('Cadastrar',['class'=>"btn btn-success btn-flat pull-right"])!!}
    
  </div>


        {!! Form::close() !!}
      </div>
    </section>
  
   



   
   

@endsection