<!DOCTYPE html>
<html>
<head>
  <?php require_once('head.php') ?>
 
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="hold-transition skin-black sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <?php require_once('header.php') ?>
    </header>
    <aside class="main-sidebar">
      <?php require_once('aside.php') ?>
  </aside>
  <div class="content-wrapper">
     <section class="content-header m-bottom-lg">
      <h1>
       Nova Notícia
     </h1>
     
    <div class="clearfix"></div>
  </section>
  <form action='teste.php' method='post' >
   
<section class="col-xs-12">
<div class="row">
     <div class="form-group col-xs-6 ">
              <label for="">Status</label><div class="clearfix"></div>
              <div class="col-xs-3">
                <label>
                  <input type="radio" name="r3" class="flat-red" checked="">
                  Ativo
                </label>
              </div>
              <div class="col-xs-3">
                <label>
                  <input type="radio" name="r3" class="flat-red">
                  Inativo
                </label>
              </div>
               
            </div>
</div>
<div class="row">
  <div class="col-sm-8">
     <div class="form-group ">
                  <label for="">Titulo</label>
                  <input type="text" class="form-control" id="" placeholder="">
                </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
                  <label>Categoria</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-8">
     <textarea name="froala-editor" id="froala-editor" cols="30" rows="10"></textarea>

          <div class="col-sm-12  m-top-lg">
            <label for="">Galeria de Fotos</label>
            <div class="container-upload">
                <div id="carregandoForm"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
              <input type="file"  class="uploadArquivos uploadArquivosGaleria" name="file" multiple>
              <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER FOTOS</div>
            </div>
            <div id="previewGaleria">
              <ul>
                @if(@$galeria)
                @foreach(@$galeria as $foto)
                <li>
                        <input type="hidden" name="fotos[]" value="{{$foto->foto}}" />
                        <a href="#" class="remove" data-file="{{$foto->foto}}">
                        <i class="fa fa-close" aria-hidden="true"></i>
                        </a>
                        <img src="{{URL::to('/')}}/galeria/{{$foto->foto}}" alt="">
                   </li>
                   @endforeach
                   @endif
              </ul>
            </div>


          </div>
        
        <div class="containerbtn">
        <div class="carregnadobtn">
          <i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>

        </div>
          
        </div>
  </div>
  <div class="col-xs-4">
    <div class="box box-default">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                
               
                
               
               
               
                <div class="form-group col-xs-12 ">
              <label for="exampleInputFile">Imagem em Destaque</label>
              <input type="file" id="exampleInputFile">

              <p class="help-block"></p>
            </div>
                
                
              </div>
              <!-- /.box-body -->

            
            </form>
          </div>
  </div>
</div>
   <div class="clearfix m-top-lg m-bottom-lg"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="box-footer">
              <a href="livros.php" class="btn btn-default btn-flat">Voltar</a>
                <button type="submit" class="btn btn-success btn-flat pull-right">Cadastrar</button>
              </div>
</div>
</div>

   
    
</section>
 
  </form>
<div class="clearfix"></div>
</div>

   
   


      <?php require_once('footer.php') ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>
<script type="text/javascript" src="../assets/froala_editor/js/languages/pt_br.js"></script>
<script type="text/javascript" src="{{asset('AdminLTE/assets/froala_editor/js/plugins/image.min.js')}}"></script>
<script>
 $(function() {
  $('.uploadArquivosGaleria' ).on('change', function() {
           $(".carregandoGaleria").show(0);
          var data = new FormData();

        $.each($(this).closets('.container-upload').find("input[type='file']")[0].files, function(i, file) {
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
        $.each($(this).closets('.container-upload').find("input[type='file']")[0].files, function(i, file) {
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
    </body>
    </html>