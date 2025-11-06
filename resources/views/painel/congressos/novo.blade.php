@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<section class="content-header m-bottom-lg">
  <h1>
   Novo Cadastro
 </h1>
 
 <div class="clearfix"></div>
</section>
{!! Form::model(null,['route'=>['painel.congressos.store'],'class'=>'']) !!}



@include('painel.congressos._form')






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

<div class="modal" id="novoCongressista">
 {!! Form::model(null,['route'=>['painel.conferencista.store'],'id'=>'formConferencista']) !!}
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Cadastrar Conferencistas</h4>
      </div>
      <div class="modal-body">

        <div class="col-sm-4">
          <label for="">Foto</label>
          <div class="container-upload">
            <div class="carregandoForm" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
            <input type="file"  class="uploadArquivos uploadCongressista" data-target="novo" name="file">
            <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> Foto</div>
          </div>
          <div id="preview">
            <ul></ul>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="col-sm-12">
            <div class="form-group">
              {!! Form::label('nome','Nome:') !!}
              {!! Form::text('nome',null,['class'=>'form-control']) !!}
            </div>
          </div>
          <div class="col-xs-12 fr-view">
            {!! Form::label('texto','Curriculo:') !!}
            <textarea name="texto" class="froala-editor2" cols="30" rows="10">

            </textarea>
            <div class="clearfix"></div>
          </div>

        </div>
        <div class="clearfix"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn  btn-flat btn-default pull-left" data-dismiss="modal">Cancelar</button>
        {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat pull-right"])!!}
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  {!! Form::close() !!}
  <!-- /.modal-dialog -->

</div>
<div class="modal" id="editarCongressista">
 {!! Form::model(null,['route'=>['painel.conferencista.update'],'id'=>'formConferencistaEditar']) !!}
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Editar Conferencistas</h4>
      </div>
      <div class="modal-body">

        <div class="col-sm-4">
          <label for="">Foto</label>
          <div class="container-upload">
            <div class="carregandoForm" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
            <input type="file"  class="uploadArquivos uploadCongressista" data-target="editar" name="file">
            <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> Foto</div>
          </div>
          <div id="preview">
            <ul></ul>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="col-sm-12">
            <div class="form-group">
              {!! Form::label('nome','Nome:') !!}
              {!! Form::text('nome',null,['class'=>'form-control']) !!}
            </div>
          </div>
          <div class="col-xs-12 fr-view">
            {!! Form::label('texto','Curriculo:') !!}
            <textarea name="texto" class="froala-editor2" cols="30" rows="10">

            </textarea>
            <div class="clearfix"></div>
          </div>

        </div>
        <div class="clearfix"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn  btn-flat btn-default pull-left" data-dismiss="modal">Cancelar</button>
        {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat pull-right"])!!}
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  {!! Form::close() !!}
  <!-- /.modal-dialog -->

</div>
  @endsection

  @section('pos-script')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>
  <script type="text/javascript" src="{{asset('AdminLTE/assets/froala_editor/js/languages/pt_br.js')}}"></script>
  <script>
   $(function() {
    $('.froala-editor').froalaEditor({
      // Set the image upload URL.
      language: 'pt_br',
      heightMin: 200,
      key: 'nfjf1hgenoA8E-13cuD1vg==',
    });
    $('.froala-editor2').froalaEditor({
      // Set the image upload URL.
      language: 'pt_br',
      toolbarButtons: ['bold', 'italic', 'underline'],
      heightMin: 100,
      key: 'nfjf1hgenoA8E-13cuD1vg==',

    });
    
   
  
    
       
      
       
      $('.uploadArquivosGaleria' ).on('change', function() {
           $(".carregandoForm").show(0);
          var data = new FormData();

        $.each($("input[type='file']")[0].files, function(i, file) {
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
             $("#carregandoForm").hide(0);
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
      
         
            

       

/* CONFERENCISTAS  */
 function getConferencistas(){
    $.get('{{route("painel.conferencista.lista")}}',function(data){
       var html = '';
                            $.each(data, function (index, value) {
                                  html += '<tr>';
                                  html += '<td>';
                                  html += '<img src="{{URL::to('/')}}/img_perfil/'+value.foto+'" style="width: 100px;height: auto;">';
                                  html += '</td>';
                                  html += '<td>';
                                  html += value.nome;
                                  html += '</td>';
                                  html += '<td>';
                                  html += '<input type="checkbox" name="conferencista_id[]" value="'+value.id+'" class="minimal" id="" />';
                                  html += '</td>';
                                  html += '<tr>';
                            })
                            
                            $("#tableConferencistas tbody").html(html);
    })
     $("#tableConferencistas tbody").find('.minimal').iCheck();
}
$("#tableConferencistas").on('click','.editarConferencista',function(e){
    e.preventDefault();
    var idConferencista = $(this).data('conferencista');
    $.get('/painel/conferencista/editar/'+idConferencista,function(data){
     
      $("#formConferencistaEditar").attr('action','/painel/conferencista/update/'+idConferencista)
      $("#editarCongressista input[name='nome']").val(data.nome);
      $("#editarCongressista .froala-editor2").html(data.texto);
      $("#editarCongressista .froala-editor2").froalaEditor('html.set', data.texto);
      var html = '';
      html +='<li>';
      html +='<input type="hidden" name="foto" value="'+data.foto+'" />';
      html +='<a href="#" class="remove" data-file="'+data.foto+'">';
      html +='<i class="fa fa-close" aria-hidden="true"></i> ';
      html += '</a>';
      html +='<img src="{{URL::to('/')}}/img_perfil/'+data.foto+'" alt="">';
      html +='</li>';
      $('#editarCongressista #preview ul').html(html);
      $('#editarCongressista').modal('show')
    })
  })
  $("#formConferencistaEditar").submit(function(e) {   
            var url =  $("#formConferencistaEditar").attr('action'); // the script where you handle the form input.
            $.ajax({
             type: "POST",
             url: url,
                   data: $("#formConferencistaEditar").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                    
                    getConferencistas();
                    $('#editarCongressista').modal('hide')
                  }
                });
            e.preventDefault(); // avoid to execute the actual submit of the form.
          });
  $('.uploadCongressista' ).on('change', function() {
    
    
    var data = new FormData();
    var target = $(this).data('target');
    var modalTarget = '';
    if(target == 'editar'){
      modalTarget = '#editarCongressista';
    }else{
      modalTarget = '#novoCongressista';
    }
    $(modalTarget + " .carregandoForm").show(0);
    $.each($(modalTarget +" input[type='file']")[0].files, function(i, file) {
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
       console.log(modalTarget +" .carregandoForm");
       $.each(result, function (index, value) {
        var html = '';
        html +='<li>';
        html +='<input type="hidden" name="foto" value="'+value+'" />';
        html +='<a href="#" class="remove" data-file="'+value+'">';
        html +='<i class="fa fa-close" aria-hidden="true"></i> ';
        html += '</a>';
        html +='<img src="{{URL::to('/')}}/img_perfil/'+value+'" alt="">';
        html +='</li>';
        $(modalTarget +' #preview ul').html(html);
                //console.log(value);
              });
       $(modalTarget +" .carregandoForm").hide(0);
     }
   } );
    
  });

   $("#formConferencista").submit(function(e) {   
            var url = "{{route('painel.conferencista.store')}}"; // the script where you handle the form input.
            $.ajax({
             type: "POST",
             url: url,
                   data: $("#formConferencista").serialize(), // serializes the form's elements.
                   success: function(data)
                   {

                     $.get('{{route("painel.conferencista.lista")}}',function(data){
                       getConferencistas()
                     })
                     $('#novoCongressista').modal('hide')
                   }
                 });
            e.preventDefault(); // avoid to execute the actual submit of the form.
          });




  getConferencistas()
  });
</script>
@endsection