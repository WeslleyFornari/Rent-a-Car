<!DOCTYPE html>
<html>
<head>
  <?php require_once('head.php') ?>
 
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="hold-transition skin-black sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <?php require_once('header.php') ?>
    </header>
    <aside class="main-sidebar">
      <?php require_once('aside.php') ?>
  </aside>
  <div class="content-wrapper">
     <section class="content-header m-bottom-lg">
      <h1> Cadastrar Regionais </h1>
     
    <div class="clearfix"></div>
  </section>
  <section class="col-sm-6">
  <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group col-xs-6 p-left-0">
                  <label for="">Responsável</label>
                  <input type="text" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group col-xs-6  p-right-0">
                  <label for="">Telefone</label>
                  <input type="text" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group col-xs-4 p-left-0">
                  <label for="">Cep</label>
                  <input type="text" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group col-xs-6">
                  <label for="">Endereço</label>
                  <input type="text" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group col-xs-2  p-right-0">
                  <label for="">Número</label>
                  <input type="text" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group col-xs-4 p-left-0">
                  <label for="">Complemento</label>
                  <input type="text" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group col-xs-4 ">
                  <label for="">Bairro</label>
                  <input type="text" class="form-control" id="" placeholder="">
                </div>
                 <div class="form-group col-xs-4 p-right-0">
                  <label for="">Cidade</label>
                  <input type="text" class="form-control" id="" placeholder="">
                </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <a href="regionais.php" class="btn btn-default btn-flat">Voltar</a>
                <button type="submit" class="btn btn-success btn-flat pull-right">Cadastrar</button>
              </div>
            </form>
          </div>
</section>
<div class="clearfix"></div>
</div>

   
   


      <?php require_once('footer.php') ?>



    </body>
    </html>