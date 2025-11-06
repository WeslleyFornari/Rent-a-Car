@extends('templates.painel')
@section('pre-assets')
 
@endsection
@section('content')
     <section class="content-header m-bottom-lg">
      <h1>
        Seja Associado
     </h1>
     
    <div class="clearfix"></div>
  </section>
  
   
<section class="col-xs-12">
{!! Form::model($conteudo,['route'=>['painel.update-paginas',$conteudo->id],'class'=>'']) !!}
    <input type="hidden" name="redirect" value="{{route('painel.seja-associado')}}">
<div class="row">
  <div class="col-xs-12">
     <textarea name="texto" id="froala-editor" cols="30" rows="10">  {!!$conteudo->texto!!}</textarea>

  </div>
</div>
  <div class="clearfix m-top-lg m-bottom-lg"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="box-footer">
      
      {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat pull-right "])!!}
    </div>
  </div>
     {!! Form::close() !!}


</section>
 
  </form>
<div class="clearfix"></div>
@endsection

@section('pos-script')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>
<script type="text/javascript" src="{{asset('AdminLTE/assets/froala_editor/js/languages/pt_br.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/assets/froala_editor/js/plugins/image.min.js')}}"></script>
<script>
 $(function() {
    $('#froala-editor').froalaEditor({
      // Set the image upload URL.
        language: 'pt_br',
        key: 'nfjf1hgenoA8E-13cuD1vg==',
        heightMin: 500,
       // Set the image upload parameter.
        imageUploadParam: 'image_param',
        
        // Set the image upload URL.
        imageUploadURL: '{{route("painel.upload-froala")}}',
 
        // Additional upload params.
        imageUploadParams: {id: 'froala-editor'},
 
        // Set request type.
        imageUploadMethod: 'POST',
 
        // Set max image size to 5MB.
        imageMaxSize: 5 * 1024 * 1024,
 
        // Allow to upload PNG and JPG.
        imageAllowedTypes: ['jpeg', 'jpg', 'png']
      })
      .on('froalaEditor.image.beforeUpload', function (e, editor, images) {
        // Return false if you want to stop the image upload.
      })
      .on('froalaEditor.image.uploaded', function (e, editor, response) {
        // Image was uploaded to the server.
      })
      .on('froalaEditor.image.inserted', function (e, editor, $img, response) {
        // Image was inserted in the editor.
      })
      .on('froalaEditor.image.replaced', function (e, editor, $img, response) {
        // Image was replaced in the editor.
      })
      .on('froalaEditor.image.error', function (e, editor, error, response) { });
  
    $('#submitButton').click(function(e){
      var helpHtml = $('div#froala-editor').froalaEditor('html.get'); // Froala Editor Inhalt auslesen
      $.post( "otherPage.php", { helpHtml:helpHtml });
      });
  });
</script>
@endsection