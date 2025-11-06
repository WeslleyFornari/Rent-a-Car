@extends('layouts.painel')
@section('pre-assets')
<style>
  .lido_0{
    color:#000;
    font-weight: bold;
  }
  .lido_1{
    color:#000;
    font-weight: normal;
  }
</style>
@endsection
@section('content')
 <!-- /.col -->
     <section class="content-header m-bottom-md">
                    <h1  class="col-sm-6">Contatos</h1>
                   
    <div class="clearfix"></div>
  </section>
        <div class="col-md-5">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title col-sm-4 p-all-0"></h3>
                {!! Form::open(['route'=>'admin.fale-conosco.index', 'class'=>'form col-sm-8 p-all-0','method'=>'GET']) !!}
              <div class="input-group">
                        <input class="form-control" name="search" placeholder="Pesquisar...">

                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                          <a href="{{route('admin.fale-conosco.index')}}" type="submit" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
                        </div>
                      </div>
               {!! Form::close() !!}
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
             {!! Form::open(['route'=>'admin.fale-conosco.delete', 'class'=>'form','method'=>'POST']) !!}
            <div class="box-body no-padding">
              
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                 
                </div>
                <!-- /.btn-group -->
                <a  href="{{route('admin.fale-conosco.index')}}" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></a>
                <div class="pull-right">
                 
                  {{$contatos->currentPage()}}/{{$contatos->lastPage()}}
                 
                  <div class="btn-group">

                    <a href="{!!$prevPage!!}" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></a>
                    <a href="{!!$nextPage!!}" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></a>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @if($contatos->total() == 0)
                      <tr>
                        <td colspan="4"> Nenhum resultado encontrado</td>
                      </tr>
                    @endif

                    @foreach($contatos as $item)
                  <tr>
                    <td><input type="checkbox" name="contato[]" value="{{$item->id}}"></td>
                    
                    <td class="mailbox-name"><a href="{{route('admin.fale-conosco.ler',['id'=>$item->id])}}" 
                      class="lido_{{$item->lido}}">{{$item->nome}}</a></td>
                    
                    <td class="mailbox-attachment"></td>
                    <td class="text-right">{{gmdate('d/m/Y H:m:s',strtotime($item->created_at))}}</td>
                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
             
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                 
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                   {{$contatos->currentPage()}}/{{$contatos->lastPage()}}
                  <div class="btn-group">
                   <a href="{!!$prevPage!!}" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></a>
                    <a href="{!!$nextPage!!}" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></a>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
           {!! Form::close() !!}
        </div>
        <!-- /.col -->

         <!-- /.col -->
          @if(@$ler)
        <div class="col-md-7">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{gmdate('d/m/Y  H:m:s',strtotime(@$ler->created_at))}}</h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
              <!-- /.mailbox-read-info -->
              
              <div class="mailbox-read-message">
                
                <div class="col-sm-4 p-xs-all-0">
          <label for="">Nome</label><br>
          {{@$ler->nome}}
        </div>
        <div class="col-sm-4 p-xs-all-0">
          <label for="">E-mail</label><br>
          {{@$ler->email}}
        </div>
        <div class="col-sm-4 p-xs-all-0">
          <label for="">Telefone</label><br>
          {{@$ler->telefone}}
        </div>
        <hr class="clearfix m-top-md col-sm-12">
        
    
       
       
        <div class="col-sm-12 m-top-sm">
          <label for="">Mensagem</label><br>
         {{@$ler->mensagem}}
        </div>
       
              </div>
              <!-- /.mailbox-read-message -->
            </div>
           
            <!-- /.box-footer -->
<hr class="clearfix m-top-md col-sm-12">
           <div class="mailbox-controls with-border p-all-sm ">

                <div class="btn-group">
                  <a href="{{route('admin.fale-conosco.del',['id'=>@$ler->id])}}" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="fa fa-trash-o"></i></a>
                </div>
                
              </div>
              <!-- /.mailbox-controls -->
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        @else
        <div class="col-md-7">
          <div class="box box-primary">
            <div class="box-body">
            <h5><< Selecione um item da lista</h5>
            </div>
          </div>
        </div>

        @endif
        <!-- /.col -->



@endsection

@section('pos-script')
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

 
  });
</script>
  @endsection