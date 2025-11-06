@extends('templates.painel')
@section('pre-assets')
@endsection
@section('content')



<section class="content-header m-bottom-lg">
      <h1>
       Novo Evento
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
  <label for="">Valor</label>
    <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input type="text" class="form-control">
                <span class="input-group-addon"> 
                  <input type="checkbox" class="minimal">  Gratuito</span>
              </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-8">
     <textarea name="froala-editor" id="froala-editor" cols="30" rows="10"></textarea>

  </div>
  <div class="col-xs-4">
   <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Evento</h3>
            </div>
            <div class="box-body">
              <!-- Date range -->
              <div class="form-group col-xs-12">
                <label>Data:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
<!-- time Picker -->
              <div class="bootstrap-timepicker col-xs-6">
                <div class="form-group">
                  <label>Hora Início:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
<!-- time Picker -->
              <div class="bootstrap-timepicker col-xs-6">
                <div class="form-group">
                  <label>Hora Término:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
            </div>
            <!-- /.box-body -->
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