@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
     <section class="content-header m-bottom-lg">
      <h1> Adicionar Material </h1>
      
      <div class="clearfix"></div>
    </section>
    <section class="col-sm-6">
      <div class="box box-primary">

        <!-- /.box-header -->
        <!-- form start -->
     {!! Form::model($material,['route'=>['painel.material.update',$material->id],'class'=>'']) !!}
          
          <!-- /.box-body -->
     @include('painel.material._form')
  <div class="box-footer">
    <a href="{{route('painel.material.lista')}}" class="btn btn-default btn-flat">Voltar</a>
      {!! Form::submit('Cadastrar',['class'=>"btn btn-success btn-flat pull-right"])!!}
    
  </div>


        {!! Form::close() !!}
      </div>
    </section>
  
   



   
   

@endsection
@section('pos-script')
<script type="text/javascript">
  $(document).ready(function() {
    $('#uploadArquivos' ).on('change', function() {
          $("#carregandoForm").show(0);
          var data = new FormData();

        $.each($("input[type='file']")[0].files, function(i, file) {
              data.append('file[]', file);
        });


          $.ajax({
            url: '{{route("painel.material.upload-file")}}',
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
              html += value;
          html +='</li>';
            $('#preview-arquivo ul').html(html);
                //console.log(value);
            });
             $("#carregandoForm").hide(0);
          }
          } );
         
        });
        $("#preview-arquivo").on('click','.remove',function(e){
          e.preventDefault();

          $(this).parent().addClass("del")
          $.get("{{route('painel.material.delete-file')}}",{arquivo: $(this).data("file")},function(data){
          
            if(data == 1){
              $(".container-upload").fadeIn();
              $(".del").remove();
            }
          })
        })
      
        
            

       


  });
</script>
@endsection