@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{!! Form::model($livro,['route'=>['painel.livros.update',$livro->id],'class'=>'']) !!}
<section class="content-header m-bottom-lg">
  <h1> Editar Livro: {{$livro->titulo_livro}} </h1>
  
  <div class="clearfix"></div>
</section>
@include('painel.livros._form')
<div class="col-xs-12">
  <div class="box-footer">
    <a href="{{route('painel.livros.lista')}}" class="btn btn-default btn-flat">Voltar</a>
      {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat pull-right"])!!}
    
  </div>
</div>
<div class="clearfix"></div>

  {!! Form::close() !!}

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

<script type="text/javascript">
  $(document).ready(function() {

    $("#btOndeComprar").click(function(){
      var local = $("#nome_loja").val();
      var url_local = $("#site_loja").val();
      var total = $(".cont_onde_comprar").length + 1;

      var html  = '<tr>';
          html += '<td class="col-xs-5"><input type="hidden" name="onde_comprar['+total+'][nome_local]" class="cont_onde_comprar" value="'+local+'" />'+local+'</td>';
          html += '<td class="col-xs-5"><input type="hidden" name="onde_comprar['+total+'][url_local]" value="'+url_local+'"/><a href="'+url_local+'">'+url_local+'</a></td>';
          html += '<td class="col-xs-2"><a href="#" class="btn btn-danger btn-xs removeOndeComprar"><i class="fa fa-trash-o"></i></a>'
          html += '</td>'
          html += '</tr>';
        $("#tableOndeComprar tbody").append(html);

      $("#nome_loja").val('');
      $("#site_loja").val('');
    })
    $("#tableOndeComprar").on('click','.removeOndeComprar',function(){
      $(this).closest('tr').remove()
    })
    $('#uploadArquivos' ).on('change', function() {
          $("#carregandoForm").show(0);
          var data = new FormData();
        $.each($("input[type='file']")[0].files, function(i, file) {
              data.append('file[]', file);
        });


          $.ajax({
            url: '{{route("painel.ajax.upload-foto")}}',
           type: 'POST',
          
          cache: false,
          contentType: false,
          processData: false,
          data : data,
          success: function(result){
             $.each(result, function (index, value) {
              var html = '';
              html +='<li>';
              html +='<input type="hidden" name="foto_capa" value="'+value+'" />';
              html +='<a href="#" class="remove" data-file="'+value+'">';
              html +='<i class="fa fa-close" aria-hidden="true"></i> ';
              html += '</a>';
              html +='<img src="{{URL::to('/')}}/img_livros/'+value+'" alt="">';
          html +='</li>';
            $('#preview ul').html(html);
                //console.log(value);
            });
             $("#carregandoForm").hide(0);
          }
          } );
         
        });
        $("#preview").on('click','.remove',function(e){
          e.preventDefault();

          $(this).parent().addClass("del")
          $.get("{{route('painel.ajax.delete-foto')}}",{name: $(this).data("file")},function(data){
          
            if(data == 1){

              $(".del").remove();
            }
          })
        })
      
        
            

       


  });
</script>
@endsection