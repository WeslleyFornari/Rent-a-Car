@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
     <section class="content-header m-bottom-lg">
      <h1> Cadastrar Regionais </h1>
     
    <div class="clearfix"></div>
  </section>
  <section class="col-sm-8">
  {!! Form::model(null,['route'=>['painel.regionais.store'],'class'=>'']) !!}
  <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                 @include('painel.regionais._form')
                
              </div>
              <!-- /.box-body -->

             
            
          </div>
            <div class="clearfix m-top-lg m-bottom-xs"></div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box-footer">
                <a href="{{route('painel.regionais')}}" class="btn btn-default btn-flat">Voltar</a>
                {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat pull-right"])!!}

              </div>
            </div>
          </div>
  {!! Form::close() !!}

</section>

@endsection
   
   


   