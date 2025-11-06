@extends('templates.painel')
@section('pre-assets')
@endsection
@section('content')



<section class="content-header m-bottom-lg">
  <h1>
   Cadastrar Agenda
 </h1>

 <div class="clearfix"></div>
</section>


  <section class="col-xs-12">
   {!! Form::model(null,['route'=>['painel.agenda.store'],'class'=>'']) !!}
    @include('painel.agenda._form')


<div class="clearfix m-top-lg m-bottom-lg"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="box-footer">
      <a href="{{route('painel.agenda.lista')}}" class="btn btn-default btn-flat">Voltar</a>
       {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat pull-right"])!!}
    </div>
  </div>
</div>

 {!! Form::close() !!}

</section>




@endsection

@section('pos-script')








<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>
<script type="text/javascript" src="../assets/froala_editor/js/languages/pt_br.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script>
 $(function() {
  $('#froala-editor').froalaEditor({
      // Set the image upload URL.
      language: 'pt_br',

      heightMin: 200,
      imageUploadURL: '/upload_image.php'
    });
  $('#submitButton').click(function(e){
    var helpHtml = $('div#froala-editor').froalaEditor('html.get'); // Froala Editor Inhalt auslesen
    $.post( "otherPage.php", { helpHtml:helpHtml });
  });
});
 $('#reservation').daterangepicker();

//Timepicker
$(".timepicker").timepicker({
  showInputs: false
});
</script>
@endsection