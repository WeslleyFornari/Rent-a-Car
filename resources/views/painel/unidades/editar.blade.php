@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<section class="content-header m-bottom-lg">
<h1> Editar</h1>
 
<div class="clearfix"></div>
</section>

   {!! Form::model($unidade,['route'=>['admin.unidades.update',$unidade->id],'id'=>'formUnidades']) !!}
  
  @include('painel.unidades._form')
  
  {!! Form::close() !!}
@endsection
@section('pos-script')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<!--
<script type="text/javascript" src="{{asset('AdminLTE/plugins/froala_editor/js/plugins/codemirror.min.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/plugins/froala_editor/js/xml.min.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/plugins/froala_editor/js/froala_editor.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/plugins/froala_editor/js/languages/pt_br.js')}}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/plugins/froala_editor/js/plugins/image.min.js')}}"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  /*
 $(function() {
    $('#froala-editor').froalaEditor({
      // Set the image upload URL.
        language: 'pt_br',
        key: 'nfjf1hgenoA8E-13cuD1vg==',
        heightMin: 500,
       // Set the image upload parameter.
        imageUploadParam: 'image_param',
        
        // Set the image upload URL.
        imageUploadURL: '{{route("admin.ajax.upload-froala")}}',
 
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
*/

  $(document).ready(function() {
     $( ".ordenar" ).sortable({
        cancel:'.remover',
        update: function( event, ui ) {
           $(".ordenar tr").each(function( index ) {
             $(this).find('.ordemGaleria').val(index)
          });
        }
      });

  $('#summernote').summernote({
    toolbar: [
    // [groupName, [list of button]]
    ['style', ['style','bold', 'italic', 'underline', 'clear','underline']],
    ['Insert', ['picture', 'link', 'video', 'table','hr']],
   
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['Misc',['codeview','undo','redo']]
  ],
     placeholder: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione voluptatem praesentium natus temporibus vel. Quos nulla, odit. Optio, earum, delectus perferendis soluta dicta dolorem, ex enim omnis nulla sed consequuntur.',
      tabsize: 1,
        height: 300,
        lang: 'pt-BR',
        popover: {
      image: [

        // This is a Custom Button in a new Toolbar Area
        ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
        ['float', ['floatLeft', 'floatRight', 'floatNone']],
        ['remove', ['removeMedia']]
      ]
    },callbacks: {
        onImageUpload: function(image) {
            uploadImage(image[0]);
        }
    }
  });
  function uploadImage(image) {
    var data = new FormData();
    console.log(image);
    data.append("file[]", image);
    $.ajax({
        url: "{{route('admin.ajax.upload-foto-unidade')}}",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "post",
        success: function(url) {

            var image = $('<img>').attr('src',"{{URL::to('img')}}/"+url);
            $('#summernote').summernote("insertNode", image[0]);
        },
        error: function(data) {
            console.log(data);
        }
    });
}
  function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "{{route('admin.ajax.upload-foto')}}",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
                }
            });
        }
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
$("input[name='cep']").keyup(function(){
        var length = $(this).val().length;
        if(length == 9){
          var cep = $("input[name='cep']").val();
          cep = cep.replace("-","");
          $.get("https://viacep.com.br/ws/"+cep+"/json/",function(response){
            $("input[name='endereco']").val(response.logradouro)
            $("input[name='bairro']").val(response.bairro)
            $("input[name='cidade']").val(response.localidade)
            $("input[name='estado']").val(response.uf)
            $("#camposEndereco").removeClass("hidden");
          })
        }
      })

    $('#uploadArquivos' ).on('change', function() {
          $(".carregandoDestaque").show(0);
          var data = new FormData();
          console.log($("input[id='uploadArquivos']")[0].files);
            $.each($("input[id='uploadArquivos']")[0].files, function(i, file) {
                  data.append('file[]', file);
            });

          $.ajax({
            url: '{{route("admin.ajax.upload-foto-unidade")}}',
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
              html +='<img src="{{URL::to('/')}}/img/unidades/'+value+'" alt="">';
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
          $.get("{{route('admin.ajax.delete-foto-unidade')}}",{name: $(this).data("file")},function(data){
          
            if(data == 1){

              $(".del").remove();
               $("#boxImage").slideUp();
            }
          })
        })
      
        
            

     

 $("#formUnidades").submit(function(e) { 
          $(".ordenar tr").each(function( index ) {
             $(this).find('.ordemGaleria').val(index)
          });
          
            var url =  $("#formUnidades").attr('action'); // the script where you handle the form input.
            $.ajax({
             type: "POST",
             url: url,
                   data: $("#formUnidades").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                   // console.log(data)
                    
                  swal("Sucesso!", "Página alterada com sucesso!", "success");
                   
                  }
                });
            e.preventDefault(); // avoid to execute the actual submit of the form.
          });
  });
</script>
@endsection