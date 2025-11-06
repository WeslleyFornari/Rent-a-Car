@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<section class="content-header m-bottom-lg">
  <h1>
   Editar Cadastro
 </h1>
 
<div class="clearfix"></div>
</section>
{!! Form::model($associado,['route'=>['painel.associado.update',$associado->id],'class'=>'']) !!}
  <section class="col-sm-8">
<div class="box box-primary">
     
    <input type="hidden" name="redirect" value="painel.diretoria">
    <div class="box-body">
     @include('painel.diretoria._form-dados')
    </div>
      
  
</div>
   
    
  </section>
  <section class="col-sm-4">
    <div class="box box-primary">

    <!-- /.box-header -->
    <!-- form start -->
   
      <div class="box-body">
        <div class="form-group col-xs-12 ">
          <label for="exampleInputFile">Imagem do Perfil</label>
             <div class="container-upload">
                <div id="carregandoForm" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
              <input type="file"  id="uploadArquivos" class="uploadArquivos" name="file">
              <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGEM</div>
            </div>
            <div class="col-xs-12">
            <div id="preview">
              <ul>
              @if(isset($associado->dados->foto_perfil))
                <li>
              <input type="hidden" name="arquivo" value="{{@$associado->dados->foto_perfil}}" />
             <a href="#" class="remove" data-file="{{@$associado->dados->foto_perfil}}">
              <i class="fa fa-close" aria-hidden="true"></i> 
              </a>
              <img src="{{URL::to('/')}}/img_perfil/{{@$associado->dados->foto_perfil}}" alt="">
          </li>
          @endif
              </ul>
            </div>
            </div>
          </div>
        </div>
     
    </div>
  </section>

    <div class="clearfix m-top-lg m-bottom-lg"></div>
        <div class="row">
          <div class="col-xs-12">
            <div class="box-footer">
              <a href="{{route('painel.associado.lista')}}" class="btn btn-default btn-flat">Voltar</a>
              {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat pull-right"])!!}

            </div>
          </div>
        </div>
 {!! Form::close() !!}
@endsection

@section('pos-script')
<script>
  $(document).ready(function(){

 
    
      

    $("#btAddSuperior").click(function(e){
      e.preventDefault();
       var total = $(".row_sup").length + 1;
       $("#total_superior").val(total);
      var html = '';
        html += '<div class="col-sm-12 row_sup" >';
        html += '<div class="col-sm-6 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Curso Superior em:</label>';
        html += '<input type="text" class="form-control btn-flat" name="curso_superior['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3"><br>';
        html += '<div class="form-group m-top-sm">';
        html += '<label class="control control--radio">Cursando';
        html += '<input type="radio" name="status_curso_superior['+total+']" value="cursando" />';
        html += '<div class="control__indicator"></div>';
        html += '</label>';
        html += '<label class="control control--radio">Concluído';
        html += '<input type="radio" name="status_curso_superior['+total+']" value="concluido"  />';
        html += '<div class="control__indicator"></div>';
        html += '</label>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $("#box-superior").append(html);
    })

    $("#btAddPos").click(function(e){
      e.preventDefault();
       var total = $(".row_pos").length + 1;
       $("#total_pos").val(total);
      var html = '';
        html += '<div class="col-sm-12 row_pos" >';
        html += '<div class="col-sm-6 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Pós-Graduação:</label>';
        html += '<input type="text" class="form-control btn-flat" name="pos_graduacao['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3"><br>';
        html += '<div class="form-group m-top-sm">';
        html += '<label class="control control--radio">Cursando';
        html += '<input type="radio" name="status_pos_graduacao['+total+']" value="cursando" />';
        html += '<div class="control__indicator"></div>';
        html += '</label>';
        html += '<label class="control control--radio">Concluído';
        html += '<input type="radio" name="status_pos_graduacao['+total+']" value="concluido"  />';
        html += '<div class="control__indicator"></div>';
        html += '</label>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $("#box-pos").append(html);
    });
    $("#btAddMestrado").click(function(e){
      e.preventDefault();
       var total = $(".row_mestrado").length + 1;
       $("#total_mestrado").val(total);
      var html = '';
        html += '<div class="col-sm-12 row_mestrado" >';
        html += '<div class="col-sm-6 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Mestrado em:</label>';
        html += '<input type="text" class="form-control btn-flat" name="mestrado['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3"><br>';
        html += '<div class="form-group m-top-sm">';
        html += '<label class="control control--radio">Cursando';
        html += '<input type="radio" name="status_mestrado['+total+']" value="cursando" />';
        html += '<div class="control__indicator"></div>';
        html += '</label>';
        html += '<label class="control control--radio">Concluído';
        html += '<input type="radio" name="status_mestrado['+total+']" value="concluido"  />';
        html += '<div class="control__indicator"></div>';
        html += '</label>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $("#box-mestrado").append(html);
    })

      $("#btAddDoutorado").click(function(e){
      e.preventDefault();
       var total = $(".row_doutorado").length + 1;
       $("#total_doutorado").val(total);
      var html = '';
        html += '<div class="col-sm-12 row_doutorado" >';
        html += '<div class="col-sm-6 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Doutorado em:</label>';
        html += '<input type="text" class="form-control btn-flat" name="doutorado['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3"><br>';
        html += '<div class="form-group m-top-sm">';
        html += '<label class="control control--radio">Cursando';
        html += '<input type="radio" name="status_doutorado['+total+']" value="cursando" />';
        html += '<div class="control__indicator"></div>';
        html += '</label>';
        html += '<label class="control control--radio">Concluído';
        html += '<input type="radio" name="status_doutorado['+total+']" value="concluido"  />';
        html += '<div class="control__indicator"></div>';
        html += '</label>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $("#box-doutorado").append(html);
    })
      
$("#btAddpos-doutorado").click(function(e){
      e.preventDefault();
       var total = $(".row_pos-doutorado").length + 1;
       $("#total_pos-doutorado").val(total);
      var html = '';
        html += '<div class="col-sm-12 row_pos-doutorado" >';
        html += '<div class="col-sm-6 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Pós-Doutorado em:</label>';
        html += '<input type="text" class="form-control btn-flat" name="pos-doutorado['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3"><br>';
        html += '<div class="form-group m-top-sm">';
        html += '<label class="control control--radio">Cursando';
        html += '<input type="radio" name="status_pos-doutorado['+total+']" value="cursando" />';
        html += '<div class="control__indicator"></div>';
        html += '</label>';
        html += '<label class="control control--radio">Concluído';
        html += '<input type="radio" name="status_pos-doutorado['+total+']" value="concluido"  />';
        html += '<div class="control__indicator"></div>';
        html += '</label>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $("#box-pos-doutorado").append(html);
    })
  })
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#uploadArquivos' ).on('change', function() {
          $("#carregandoForm").show(0);
          var data = new FormData();

        $.each($("input[type='file']")[0].files, function(i, file) {
              data.append('file[]', file);
        });


          $.ajax({
            url: '{{route("painel.ajax.upload-foto-perfil")}}',
           type: 'POST',
          
          cache: false,
          contentType: false,
          processData: false,
          data : data,
          success: function(result){
             $.each(result, function (index, value) {
              var html = '';
              html +='<li>';
              html +='<input type="hidden" name="foto_perfil" value="'+value+'" />';
              html +='<a href="#" class="remove" data-file="'+value+'">';
              html +='<i class="fa fa-close" aria-hidden="true"></i> ';
              html += '</a>';
              html +='<img src="{{URL::to('/')}}/img_perfil/'+value+'" alt="">';
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
          $.get("{{route('painel.ajax.delete-foto-perfil')}}",{name: $(this).data("file")},function(data){
          
            if(data == 1){

              $(".del").remove();
            }
          })
        })
      
        
            

       


  });
</script>
@endsection