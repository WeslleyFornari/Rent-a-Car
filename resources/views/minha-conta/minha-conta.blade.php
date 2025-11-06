@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')

<div class="">
   @include('errors._check')
<div class="col-sm-12 m-top-lg col-xs-9 bhoechie-tab-container">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
      <div class="list-group">
        <a href="#" class="list-group-item active text-center">
          <i class="fa fa-user-circle-o" aria-hidden="true"></i>
          <br/>DADOS PESSOAIS
      </a>
      <a href="#" class="list-group-item text-center">
          <i class="fa fa-money" aria-hidden="true"></i>
          <br/>ANUIDADE<br>(pagamentos)
      </a>
      <a href="#" class="list-group-item text-center">
          <i class="fa fa-key" aria-hidden="true"></i>
          <br/>ACESSO
      </a>

  </div>
</div>

<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
    <!-- flight section -->
    <div class="bhoechie-tab-content active">
       @include('minha-conta._form-dados')
    <div class="clear m-bottom-lg"></div>
   </div>
   <!-- train section -->
   <div class="bhoechie-tab-content">
       @include('minha-conta.faturamento')
   </div>

   <!-- hotel search -->
   <div class="bhoechie-tab-content">
          @include('minha-conta._form-acesso')
   </div>

</div>
</div>
</div>





@endsection

@section('pos-script')
<script>
	$(document).ready(function() {
       $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
           e.preventDefault();
           $(this).siblings('a.active').removeClass("active");
           $(this).addClass("active");
           var index = $(this).index();
           $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
           $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
       });

        $(document).ready(function(){

 
    
      

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
   });
</script>
@endsection