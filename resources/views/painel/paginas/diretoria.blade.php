@extends('templates.painel')
@section('pre-assets')

@section('content')
<section class="content-header">
  <h1>Diretoria <small>Texto introdutório</small></h1>
  
  <div class="clearfix"></div>
</section>


<section class="col-xs-12">
  {!! Form::model($conteudo,['route'=>['painel.update-paginas',$conteudo->id],'class'=>'']) !!}
  <input type="hidden" name="redirect" value="{{route('painel.diretoria')}}">
  <div class="row">
    <div class="col-xs-12">
     <textarea name="texto" id="froala-editor" cols="30" rows="10">
      {!!$conteudo->texto!!}

    </textarea>

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
{!! Form::close() !!}
<div class="clearfix" style="margin-top: 50px"></div>
<div class="pull-right col-xs-4 col-sm-2 p-all-0">
 
</div>
<div class="box box-default col-xs-12 m-top-md">
  <div class="box-header with-border">
    <i class="fa fa-suitcase" aria-hidden="true"></i>
    <h3 class="box-title">Diretoria</h3>
    <div class="pull-right">
     <a href="{{route('painel.diretoria.novo')}}" class="btn btn-xs btn-primary btn-flat btn-block"><i class="fa fa-plus"></i> Cadastrar</a>
   </div>
 </div>
 <!-- /.box-header -->
 
 <table class="table box-body">
  <tr>
   
    <th>Foto</th>
    <th>Nome</th>
    <th>Cargo</th>
    <th>E-mail</th>
    
    <th>Telefone</th>
    
    <th>Ações</th>
  </tr>
  
  @foreach($diretoria as $diretor)
  
  <tr>
   
    <td><img src="{{URL::to('/')}}/img_perfil/{{@$diretor->dados->foto_perfil}}" height="50px" width="auto" alt=""></td>
    <td>{{@$diretor->name}}</td>

    <td>{{@$diretor->dados->cargo}}</td>
    <td>{{@$diretor->email}}</td>
    
    <td>{{@$diretor->dados->telefone}}</td>
    
    <td>
      <a href="{{route('painel.diretoria.delete',['id'=>$diretor->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
      <a href="{{route('painel.diretoria.editar',['id'=>$diretor->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a></td>
    </tr>
    @endforeach
    
  </table>
  
  
  
  <!-- /.box-body -->
</div>


</section>


@endsection

@section('pos-script')
<script type="text/javascript" src="{{asset('AdminLTE/assets/froala_editor/js/codemirror.min.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/assets/froala_editor/js/xml.min.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/assets/froala_editor/js/froala_editor.pkgd.min.js')}}"></script>
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