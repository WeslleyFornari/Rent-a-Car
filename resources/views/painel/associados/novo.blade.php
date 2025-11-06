@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<section class="content-header m-bottom-lg">
  <h1>
   Novo Evento
 </h1>
 
<div class="clearfix"></div>
</section>

  <section class="col-xs-12">
<div class="box box-primary">
    {!! Form::model(null,['route'=>['painel.associado.store'],'class'=>'']) !!}
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
@endsection