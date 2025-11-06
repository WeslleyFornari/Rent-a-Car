@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
  <section class="content-header m-bottom-lg">
      <h1> Cadastrar Faturamento </h1>
    <div class="clearfix"></div>
  </section>
  <section class="col-sm-8">
  {!! Form::model($faturamento,['route'=>['painel.faturamento.update',$faturamento->id],'id'=>'form']) !!}
  <div class="box box-primary">     
            <!-- /.box-header -->
            <!-- form start -->            
              <div class="box-body">
                 @include('painel.faturamento._form')      
              </div>
              <!-- /.box-body -->
          </div>
            <div class="clearfix m-top-lg m-bottom-xs"></div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box-footer">
                <div class="pull-left">
                <a href="{{route('painel.faturamento.associado',['id'=>$associado->id])}}" class="btn btn-default btn-flat">Voltar</a></div>
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
              window.location = '{{route("painel.faturamento.associado",$associado->id)}}'
             }
         });
      }else if(action == 'salvar_sair'){
       
        $.post($("#form").attr('action'),$("#form").serialize(),function(data){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
              });

             
              window.location = '{{route("painel.faturamento.associado",$associado->id)}}'
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }else if(action == 'salvar'){
        
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

     })
</script>
@endsection