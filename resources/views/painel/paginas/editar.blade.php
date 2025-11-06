@extends('layouts.painel')
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

   {!! Form::model($conteudo,['route'=>['admin.paginas.update',$conteudo->id],'id'=>'formPaginas']) !!}
   <input type="hidden" name="sessao_id" value="1">
   <input type="hidden" name="redirect" value="{{route('admin.paginas.editar',['id'=>$conteudo->id])}}">
  @include('painel.paginas._form')
  
  {!! Form::close() !!}
@endsection
@section('pos-script')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>


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
        url: "{{route('admin.ajax.upload-foto')}}",
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


    $('#uploadArquivos' ).on('change', function() {
          $(".carregandoDestaque").show(0);
          var data = new FormData();
          console.log($("input[id='uploadArquivos']")[0].files);
            $.each($("input[id='uploadArquivos']")[0].files, function(i, file) {
                  data.append('file[]', file);
            });

          $.ajax({
            url: '{{route("admin.ajax.upload-foto")}}',
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
              html +='<img src="{{URL::to('/')}}/img/'+value+'" alt="">';
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
          $.get("{{route('admin.ajax.delete-foto')}}",{name: $(this).data("file")},function(data){
          
            if(data == 1){

              $(".del").remove();
               $("#boxImage").slideUp();
            }
          })
        })
      
        
            $('#uploadArquivosGaleria' ).on('change', function() {
    $("#carregandoGaleria").show(0);
    var data = new FormData();

    $.each($("input[id='uploadArquivosGaleria']")[0].files, function(i, file) {
      data.append('file[]', file);
    });
    data.append('conteudo_id', '{{$conteudo->id}}');
    $.ajax({
      url: '{{route("admin.ajax.upload-galeria")}}',
      type: 'POST',

      cache: false,
      contentType: false,
      processData: false,
      data : data,
      success: function(result){
       $.each(result, function (index, value) {
        var html = '';
         html +=' <tr>';
                html +='<td></td>';
               html += '<td><input type="hidden" class="ordemGaleria" name="ordem[]" value=""><input type="hidden" name="fotos[]" value="'+value+'" />';
               html +=   '<img src="{{URL::to('/')}}/img/galeria/'+value+'" style="max-height: 50px" alt=""></td>'
               html +=   '<td> ';

                 html +=   '<a href="" class="btn btn-danger  remove "  data-file="'+value+'">'
                 html +=     '<i class="fa fa-trash-o"></i>';
                 html +=   '</a>';
                 html += '</td>';
              html +=  '</tr>';
        $('.ordenar').append(html);
        console.log(value);
      });
        $("#carregandoGaleria").hide(0);
     }
   });

  });

         $("#previewGaleria").on('click','.remove',function(e){
          e.preventDefault();
          $(this).closest('tr').addClass("del")
          $.get("{{route('admin.ajax.delete-galeria')}}",{name: $(this).data("file")},function(data){


            if(data.status == "deletado"){

             $("#previewGaleria").find(".del").remove();

           }
         })
  })

 $("#formPaginas").submit(function(e) { 
          $(".ordenar tr").each(function( index ) {
             $(this).find('.ordemGaleria').val(index)
          });
          
            var url =  $("#formPaginas").attr('action'); // the script where you handle the form input.
            $.ajax({
             type: "POST",
             url: url,
                   data: $("#formPaginas").serialize(), // serializes the form's elements.
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