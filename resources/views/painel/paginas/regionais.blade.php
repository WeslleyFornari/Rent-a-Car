@extends('templates.painel')
@section('pre-assets')

@endsection
@section('content')
<section class="content-header">
  <h1>Regionais</h1>
  
  <div class="clearfix"></div>
</section>

 
  <section class="col-xs-12">
  {!! Form::model($conteudo,['route'=>['painel.update-paginas',$conteudo->id],'class'=>'']) !!}
    <input type="hidden" name="redirect" value="{{route('painel.regionais')}}">
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
      
      {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat pull-right "])!!}
    </div>
  </div>
</div>
     {!! Form::close() !!}
   <div class="clearfix" style="margin-top: 50px"></div>
  
  <div class="box box-default col-xs-12 m-top-md">
    <div class="box-header with-border">
      <i class="fa fa-globe"></i>

      <h3 class="box-title">Unidades</h3>
       <div class="pull-right">
     <a href="{{route('painel.regionais.novo')}}" class="btn btn-xs btn-primary btn-flat btn-block"><i class="fa fa-plus"></i> Cadastrar</a>
   </div>
    </div>
    <!-- /.box-header -->
    
      <table class="table box-body">
        <tr>
          <th>#</th>
          <th>Região</th>
          <th>Responsavel</th>
          <th>Endereço</th>
          <th>Telefone</th>
          <th>Ações</th>
        </tr>
        @foreach($regionais as $regional)
        <tr>
          <td>{{$regional->id}}</td>
          <td>{{$regional->regiao}}</td>
          <td>{{$regional->nome_responsavel}}</td>
          <td>{{$regional->endereco}},{{$regional->numero}} - {{$regional->complemento}}<br>{{$regional->cidade}}/{{$regional->estado}}</td>
          <td>{{$regional->telefone}}</td>
          <td>
            <a href="{{route('painel.regionais.delete',['id'=>$regional->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
            <a href="{{route('painel.regionais.editar',['id'=>$regional->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a></td>
          </tr>
          @endforeach
        </table>
        
     
      
      <!-- /.box-body -->
    </div>

   
  </section>
  

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