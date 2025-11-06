@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<section class="content-header m-bottom-lg">
<h1> Editar Notícia</h1>
 
<div class="clearfix"></div>
</section>

  {!! Form::model($conteudo,['route'=>['painel.noticias.update',$conteudo->id],'id'=>'formNoticias']) !!}
  @include('painel.noticias._form')
  {!! Form::close() !!}
@endsection
@section('pos-script')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>
<script type="text/javascript" src="{{asset('/AdminLTE/assets/froala_editor/js/languages/pt_br.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/assets/froala_editor/js/plugins/file.min.js')}}"></script>
<script>
 $(function() {
    $('#froala-editor').froalaEditor({
      // Set the image upload URL.
        language: 'pt_br',
        key: 'nfjf1hgenoA8E-13cuD1vg==',
        heightMin: 500,
       // Set the image upload parameter.
        imageUploadParam: 'image_param',
        fileUploadParam: 'image_param',
        // Set the image upload URL.
        imageUploadURL: '{{route("painel.upload-froala")}}',
        fileUploadURL:  '{{route("painel.upload-froala")}}',
      
        // Additional upload params.
        imageUploadParams: {id: 'froala-editor'},
       
        // Set request type.
        imageUploadMethod: 'POST',
 
        // Set max image size to 5MB.
        imageMaxSize: 5 * 1024 * 1024,
 
        // Allow to upload PNG and JPG.
        imageAllowedTypes: ['jpeg', 'jpg', 'png','doc','docx','pdf','xls','xlsx']
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
  
   
  });
</script>

<script type="text/javascript">

  $(document).ready(function(){
    $(".list-action").on('click','button',function(e){
      e.preventDefault();
      var action = $(this).data('action');

      if(action == 'sair'){
         swal({
            title: "Tem certeza?",
            text: "As alterações no formulário seram perdidas",
            icon: "warning",
            dangerMode: false,
              buttons:{
                  cancel: {
                    text: "Cancelar",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: true,
                  },
                  confirm: {
                    text: "Sim, Sair",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true
                  }
                }
          }) .then(confirmar => {
             if (confirmar) {
              window.location = '{{route("painel.noticias.lista")}}'
             }
         });
      }else if(action == 'salvar_sair'){
        $.post($("#formNoticias").attr('action'),$("#formNoticias").serialize(),function(data){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
              });

             
              window.location = '{{route("painel.noticias.lista")}}'
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }else if(action == 'salvar'){
        $.post($("#formNoticias").attr('action'),$("#formNoticias").serialize(),function(data,error){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
                timer:1000,
              });
              $("#formNoticias")[0].reset();
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }
    })
  })
  $(document).ready(function() {
$('.uploadArquivosGaleria' ).on('change', function() {
        $(".carregandoGaleria").show(0);
          var data = new FormData();

        $.each($(this).closest('.container-upload').find("input[type='file']")[0].files, function(i, file) {
              data.append('file[]', file);
        });


          $.ajax({
            url: '{{route("painel.ajax.upload-galeria-congresso")}}',
           type: 'POST',
          
          cache: false,
          contentType: false,
          processData: false,
          data : data,
          success: function(result){
             $.each(result, function (index, value) {
              var html = '';
              html +='<li>';
              html +='<input type="hidden" name="fotos[]" value="'+value+'" />';
              html +='<a href="#" class="remove" data-file="'+value+'">';
              html +='<i class="fa fa-close" aria-hidden="true"></i>';
              html += '</a>';
              html +='<img src="{{URL::to('/')}}/galeria/'+value+'" alt="">';
          html +='</li>';
            $('#previewGaleria ul').append(html);
                console.log(value);
            });
             $(".carregandoGaleria").hide(0);
          }
          } );
         
        });
        $("#previewGaleria").on('click','.remove',function(e){
          e.preventDefault();
          $(this).parent().addClass("del")
          $.get("{{route('painel.ajax.delete-galeria-congresso')}}",{name: $(this).data("file")},function(data){
           
            
            if(data.status == "deletado"){
            
               $("#previewGaleria").find(".del").remove();
            
            }
          })
        })
   
    $('#uploadArquivos' ).on('change', function() {
          $(".carregandoDestaque").show(0);
          var data = new FormData();
        $.each($(this).closest('.container-upload').find("input[type='file']")[0].files, function(i, file) {
              data.append('file[]', file);
        });


          $.ajax({
            url: '{{route("painel.ajax.upload-foto-noticias")}}',
           type: 'POST',
          
          cache: false,
          contentType: false,
          processData: false,
          data : data,
          success: function(result){
             $.each(result, function (index, value) {
              var html = '';
              html +='<li>';
              html +='<input type="hidden" name="arquivo" value="'+value+'" />';
              html +='<a href="#" class="remove" data-file="'+value+'">';
              html +='<i class="fa fa-close" aria-hidden="true"></i> ';
              html += '</a>';
              html +='<img src="{{URL::to('/')}}/img_noticias/'+value+'" alt="">';
          html +='</li>';
            $('#preview ul').html(html);
                //console.log(value);
            });
             $(".carregandoDestaque").hide(0);
             $("#boxImage").slideDown();
          }
          } );
         
        });
        $("#preview").on('click','.remove',function(e){
          e.preventDefault();

          $(this).parent().addClass("del")
          $.get("{{route('painel.ajax.delete-foto-noticias')}}",{name: $(this).data("file")},function(data){
          
            if(data == 1){

              $(".del").remove();
               $("#boxImage").slideUp();
            }
          })
        })
  });
</script>
@endsection