@extends('layouts.painel')
@section('pre-assets')
<!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@endsection
@section('content')
  <section class="content-header m-bottom-lg">
      <h1>
        Quem Somos
     </h1>
     
    <div class="clearfix"></div>
  </section>
  
    {!! Form::model($conteudo,['route'=>['admin.paginas.update',$conteudo->id],'class'=>'']) !!}
    <input type="hidden" name="redirect" value="{{route('admin.paginas.editar',['id'=>$conteudo->id])}}">
<section class="col-xs-12">
<div class="row">
  <div class="col-xs-12">
     
<textarea id="editor1" name="texto" rows="10" cols="80">{!!$conteudo->texto!!}</textarea>
  </div>
</div>
   
<div class="clearfix m-top-lg m-bottom-lg"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="box-footer">
      {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat pull-right"])!!}
    </div>
  </div>
</div>
    
</section>
 
  {!! Form::close() !!}
<div class="clearfix"></div>

@endsection

@section('pos-script')
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
  
  
    var editor = CKEDITOR.replace( 'editor1', {
    allowedContent: true
} );

editor.on( 'instanceReady', function() {
    console.log( editor.filter.allowedContent );
} );
  });
</script>

@endsection