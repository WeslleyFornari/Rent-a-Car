@extends('layouts.painel')
@section('title')
Home | Novo Usuário
@stop

@section('content')

  
  
 
<section class="content-header p-all-0 m-top-md">
                    <h1 class="col-sm-6">Cadastrar Opcionais</h1>
                   
    <div class="clearfix"></div>
  </section>
<section class="col-xs-4">
  <div class="box box-default col-xs-12 m-top-md">
    <div class="box-header with-border">
            
            <h3 class="box-title">Cadastrar</h3>
                         </div>
            <div class="box-body" id="carregaForm">

                @include('painel.opcionais.novo')
          </div>
  </div>
</section>
<section class="col-xs-8">
  <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
    <div class="row">
       <div class="col-sm-6"><strong>Opcional</strong></div>
      <div class="col-sm-6 text-right"><strong>Ações</strong></div>
    </div>
  </div>

  <div class="visible-xs m-top-lg clearfix"></div>
  <div class="box box-solid p-all-sm " id="listaOpcionais">

 
     </div>
  </section>


@endsection

@section('pos-script')
<script>
  
  $(document).ready(function(){

    function loadOpcionais(){
      $.get("{{route('admin.opcionais.getOpcionais')}}",function(data){
         $("#listaOpcionais").html(data);
      })
    }
    function loadNovo(){
      $.get("{{route('admin.opcionais.novo')}}",function(data){
        $("#carregaForm").html(data)
      })
    }
    loadOpcionais();

    $("#listaOpcionais").on('click','.btnEdit',function(e){
      e.preventDefault();
      var href = $(this).attr('href');
      $.get(href,function(data){
        $("#carregaForm").html(data)
      })
    });
    $("#listaOpcionais").on('click','.btnDelete',function(e){
      e.preventDefault();
 swal({
        title: "Tem certeza?",
        text: "Você irá remover definitivamente este item",
        icon: "warning",
        dangerMode: true,
          buttons:{
              cancel: {
                text: "Cancel",
                value: null,
                visible: true,
                className: "",
                closeModal: true,
              },
              confirm: {
                text: "Sim,Remover",
                value: true,
                visible: true,
                className: "",
                closeModal: true
              }
            }
      })
      
      .then(willDelete => {
         if (willDelete) {
           
           $.get($(this).attr('href'),function(data){
           swal({
                  title: "Sucesso!",
                  text: data.msg,
                  icon: "success",
                  button: false,
                  timer:1000,
                });
              loadOpcionais();
            });

         }
     });

     


     
    })
    $("#carregaForm").on('click','.btSubmit',function(e){
      e.preventDefault();

            $.post($("#form").attr('action'),$("#form").serialize(),function(data){
              if(data.erro == '0'){
              swal({
                  title: "Sucesso!",
                  text: data.msg,
                  icon: "success",
                  button: false,
                  timer:1000,
                });
              loadOpcionais();
               loadNovo();
              }else{
                 swal("Atenção!", data.msg, "info");
              }
          })
      })
  })
</script>
@endsection