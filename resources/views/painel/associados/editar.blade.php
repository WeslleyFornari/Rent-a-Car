@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<section class="content-header m-bottom-lg">
  <div class="col-sm-6">
     <h1 class="m-all-0 p-all-0" style="margin: 0;">
   Novo Associado
 </h1>
  </div>
  <div class="col-sm-6 text-right">
      <a href="{{route('painel.faturamento.associado',['id'=>$associado->id])}}" class="btn btn-default"><i class="fa fa-money"></i> Historico de Faturamento</a>
  </div>
 
 
<div class="clearfix"></div>
</section>

  <section class="col-xs-12">
<div class="box box-primary">
     {!! Form::model($associado,['route'=>['painel.associado.update',$associado->id],'id'=>'form']) !!}
    <input type="hidden" name="redirect" value="painel.associado.lista">
    <div class="box-body">
     @include('painel.associados._form-dados')
    </div>
        <div class="clearfix m-top-lg m-bottom-lg"></div>
        <div class="row">
          <div class="col-xs-12">
            <div class="box-footer">
             <div class="pull-left">
                  <a href="{{route('painel.associado.lista')}}" class="btn btn-default btn-flat">Voltar</a>
              </div>
                <div class="list-action">
                                  <ul>
                                    <li><button type="button" class="btn btn-flat btn-default " data-action="sair">Sair</button></li>
                                    <li><button type="button" class="btn btn-flat btn-primary " data-action="salvar_sair">Salvar e Sair</button></li>
                                    <li><button type="button" class="btn btn-flat btn-success " data-action="salvar">Salvar</button></li>
                                  </ul>
                    </div>
           
             

            </div>
              

          </div>
        </div>
  
</div>
    {!! Form::close() !!}
    
  </section>

@endsection

@section('pos-script')
<script>
  $(document).ready(function(){

 $(".list-action").on('click','button',function(e){
      e.preventDefault();
      var action = $(this).data('action');

      if(action == 'sair'){
         swal({
            title: "Tem certeza?",
            text: "As alterações não salvas no formulário seram perdidas",
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
              window.location = '{{route("painel.associado.lista")}}'
             }
         });
      }else if(action == 'salvar_sair'){
          if($('input[name="email_autorizacao"]').is(":checked") && $("select[name='modelo_email']").val() == ""){
          swal("Atenção!", 'Selecione o modelo do e-mail', "info");
          return false;
        }
        $.post($("#form").attr('action'),$("#form").serialize(),function(data){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
              });

             
              window.location = '{{route("painel.associado.lista")}}'
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }else if(action == 'salvar'){
        if($('input[name="email_autorizacao"]').is(":checked") && $("select[name='modelo_email']").val() == ""){
          swal("Atenção!", 'Selecionar um modelo de cobrança', "info");
          return false;
        }
        $.post($("#form").attr('action'),$("#form").serialize(),function(data){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
                timer:1000,
              });
              //$("#form")[0].reset();
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }

    });
    $('input[name="email_autorizacao"]').on('ifToggled', function(event){
      if ($("select[name='modelo_email']").attr('disabled')){
      $("select[name='modelo_email']").attr('required');
          $("select[name='modelo_email']").removeAttr('disabled');
      }else{
        $("select[name='modelo_email']").attr('disabled', 'disabled');
        $("select[name='modelo_email']").attr('required', 'disabled');
         $("select[name='modelo_email']").removeAttr('required');
      } 
            
     
    });
      

    $("#btAddSuperior").click(function(e){
      e.preventDefault();
       var total = $(".row_sup").length + 1;
       total = total -1;
       $("#total_superior").val(total);
      var html = '';
        html += '<div class="col-sm-12 row_sup" >';
        html += '<div class="col-sm-3 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Curso Superior em:</label>';
        html += '<input type="text" class="form-control btn-flat" name="curso_superior['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Instituição de Ensino:</label>';
        html += '<input type="text" class="form-control btn-flat" name="instituicao_superior['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3"><br>';
        html += '<div class="form-group m-top-sm">';
        html += '<label class="">Cursando ';
        html += '<input type="radio" name="status_curso_superior['+total+']" value="Cursando"  class="minimal" required="required"  />';

        html += '</label>';
        html += '<label class="">Concluído ';
        html += '<input type="radio" name="status_curso_superior['+total+']" value="Concluído"  class="minimal"  required="required" />';
       
        html += '</label>';
        html += '</div>';
        html += '</div>';
          html += '<div class="col-sm-3" >';
        html += '<div class="clear hidden-xs m-top-lg" ></div>';
        html += '<a href="" class="btn btn-xs btn-flat btn-danger removerCurso" >';  
        html += '<i class="fa fa-minus"></i> remover</a>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $("#box-superior").append(html);
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
  });
    })

    $("#btAddPos").click(function(e){
      e.preventDefault();
       var total = $(".row_pos").length + 1;
        total = total -1;
       $("#total_pos").val(total);
      var html = '';
        html += '<div class="col-sm-12 row_pos" >';
        html += '<div class="col-sm-3 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Pós-Graduação:</label>';
        html += '<input type="text" class="form-control btn-flat" name="pos_graduacao['+total+']">';
        html += '</div>';
        html += '</div>';
          html += '<div class="col-sm-3 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Instituição de Ensino:</label>';
        html += '<input type="text" class="form-control btn-flat" name="instituicao_pos['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3"><br>';
        html += '<div class="form-group m-top-sm">';
        html += '<label class="">Cursando ';
        html += '<input type="radio" name="status_pos_graduacao['+total+']" value="Cursando"/>';
        html += '</label>';
        html += '<label class="">Concluído ';
        html += '<input type="radio" name="status_pos_graduacao['+total+']" value="Concluído"/>';
        html += '</label>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3" >';
        html += '<div class="clear hidden-xs m-top-lg" ></div>';
        html += '<a href="" class="btn btn-xs btn-flat btn-danger removerCurso" >';  
        html += '<i class="fa fa-minus"></i> remover</a>';
        html += '</div>';
        html += '</div>';
        $("#box-pos").append(html);
       
    });
    $("#btAddMestrado").click(function(e){
      e.preventDefault();
       var total = $(".row_mestrado").length + 1;
        total = total -1;
       $("#total_mestrado").val(total);
      var html = '';
        html += '<div class="col-sm-12 row_mestrado" >';
        html += '<div class="col-sm-3 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Mestrado em:</label>';
        html += '<input type="text" class="form-control btn-flat" name="mestrado['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Instituição de Ensino:</label>';
        html += '<input type="text" class="form-control btn-flat" name="instituicao_mestrado['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3"><br>';
        html += '<div class="form-group m-top-sm">';
        html += '<label class="">Cursando ';
        html += '<input type="radio" name="status_mestrado['+total+']" value="Cursando" />';
   
        html += '</label>';
        html += '<label class="">Concluído ';
        html += '<input type="radio" name="status_mestrado['+total+']" value="Concluído"  />';
      
        html += '</label>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $("#box-mestrado").append(html);
    })

      $("#btAddDoutorado").click(function(e){
      e.preventDefault();
       var total = $(".row_doutorado").length + 1;
        total = total -1;
       $("#total_doutorado").val(total);
      var html = '';
        html += '<div class="col-sm-12 row_doutorado" >';
        html += '<div class="col-sm-6 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Doutorado em:</label>';
        html += '<input type="text" class="form-control btn-flat" name="doutorado['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Instituição de Ensino:</label>';
        html += '<input type="text" class="form-control btn-flat" name="instituicao_doutorado['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3"><br>';
        html += '<div class="form-group m-top-sm">';
        html += '<label class="">Cursando';
        html += '<input type="radio" name="status_doutorado['+total+']" value="Cursando" />';
     
        html += '</label>';
        html += '<label class="c">Concluído';
        html += '<input type="radio" name="status_doutorado['+total+']" value="Concluído"  />';
        
        html += '</label>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $("#box-doutorado").append(html);
    })
      
$("#btAddpos-doutorado").click(function(e){
      e.preventDefault();
       var total = $(".row_pos-doutorado").length + 1;
        total = total -1;
       $("#total_pos-doutorado").val(total);
      var html = '';
        html += '<div class="col-sm-12 row_pos-doutorado" >';
        html += '<div class="col-sm-6 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Pós-Doutorado em:</label>';
        html += '<input type="text" class="form-control btn-flat" name="pos-doutorado['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3 p-left-0">';
        html += '<div class="form-group">';
        html += '<label for="">Instituição de Ensino:</label>';
        html += '<input type="text" class="form-control btn-flat" name="instituicao_pos_doutorado['+total+']">';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-3"><br>';
        html += '<div class="form-group m-top-sm">';
        html += '<label class="">Cursando ';
        html += '<input type="radio" name="status_pos-doutorado['+total+']" value="Cursando" />';

        html += '</label>';
        html += '<label class="">Concluído';
        html += '<input type="radio" name="status_pos-doutorado['+total+']" value="Concluído"  />';

        html += '</label>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $("#box-pos-doutorado").append(html);
    })
  $("body").on('click','.removerCurso',function(e){
    e.preventDefault();
    $(this).closest('.col-sm-12').remove();
  })
  })
</script>
@endsection