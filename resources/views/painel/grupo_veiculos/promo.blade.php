@extends('layouts.painel')
@section('title')
Home | Novo Usuário
@stop

@section('content')
    
 
<section class="content-header p-all-0 m-top-md">
                    <h1 class="col-sm-6">Promoção</h1>
                    <div class="col-sm-6">
                    <div class="list-action">
                      <ul>
                        <li><button type="button" class="btn btn-flat btn-default" data-action="sair">Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-primary" data-action="salvar_sair">Salvar e Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-success" data-action="salvar">Salvar</button></li>
                      </ul>
                    </div>
              </div>
    <div class="clearfix"></div>
  </section>


<div class="panel">
  <div class="panel-heading">
    
     <h2 class="panel-title"><strong></strong></h2> 
    
  </div>
  <div class="panel-body">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome_promo" value="">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Grupo</label>
            <select name="" id="" class="form-control">
             <option value="">Grupo A</option>
             <option value="">Grupo B</option>
             <option value="">Grupo C</option>
           </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
           <div class="form-group">
            <label for="">Desconto</label>
            <input type="text" class="form-control moneyMask" name="valor_padrao" value="">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <label for="">Descricão</label>
           {!! Form::textarea('texto',null,['class'=>'form-control','id'=>'summernote']) !!}
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
           <div class="form-group">
            <label for="">Status</label><Br>
            <label class="switch">
              <input type="checkbox" name="status">
              <span class="slider round" ></span>
            </label>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
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
        height: 150,
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
<script>
  
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
                    text: "Cancel",
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
              window.location = '{{route("admin.grupo_veiculos.lista")}}'
             }
         });
      }else if(action == 'salvar_sair'){
        $.post($("#form").attr('action'),$("#form").serialize(),function(data){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
              });

             
              window.location = '{{route("admin.grupo_veiculos.lista")}}'
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }else if(action == 'salvar'){
        $.post($("#form").attr('action'),$("#form").serialize(),function(data){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
                timer:1000,
              });
              $("#form")[0].reset();
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }

    })
  })
</script>
@endsection