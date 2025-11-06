@extends('templates.painel')
@section('pre-assets')
@endsection
@section('content')



<section class="content-header">
  <h1>Agenda</h1>
  
  <div class="clearfix"></div>
</section>
<form action='teste.php' method='post' >
 
  <section class="col-xs-12">
   
   
    <div class="clearfix" style="margin-top: 50px"></div>
    <div class="pull-right col-xs-4 col-sm-2 p-all-0">
      <a href="new-agenda.php" class="btn btn-success btn-flat btn-block">Cadastrar Evento</a>
    </div>
    <div class="box box-default col-xs-12 m-top-md">
      <div class="box-header with-border">
        <i class="fa fa-book"></i>

        <h3 class="box-title">Lista</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table">
          <tr>
            
            <th>Evento</th>
            <th>Local</th>                   
            <th>Data</th>                   
            <th>Status</th>                   
            <th class="col-xs-1">Ações</th>
          </tr>
          <tr>
            
            <td>Nome Evento</td>
            <td>Local</td>
            <td>00/00/0000</td>
            <td>ATIVO</td>
            <td>
              <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
              <a href="#" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a></td>
            </tr>
          </table>
          
        </div>
        
        <!-- /.box-body -->
      </div>

      <hr class="clearfix">

    </section>
    
  </form>
  

  @endsection

  @section('pos-script')

  @endsection