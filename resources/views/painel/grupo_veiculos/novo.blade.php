@extends('layouts.painel')
@section('title')
Home | Novo Usuário
@stop

@section('content')
 {!! Form::model(null,['route'=>['admin.grupo_veiculos.store'],'id'=>'form']) !!}
  
  
 
<section class="content-header p-all-0 m-top-md">
                    <h1 class="col-sm-6">Cadastrar Grupo</h1>
                    <div class="col-sm-6">
                    <div class="list-action">
                      <ul>
                        <li><button type="button" class="btn btn-flat btn-default" data-action="sair">Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-primary" data-action="salvar_sair">Salvar e Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-success" data-action="salvar">Salvar</button></li>
                      </ul>
                    </div>
              </div>
    <div class="clearfix"></div>
  </section>


<div class="panel">
  <div class="panel-heading">
    
     <h2 class="panel-title"><strong></strong></h2> 
    
  </div>
  <div class="panel-body">
    <div class="col-sm-4">
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          
          
            <div class="col-xs-12">
              <div id="preview">
                <ul class="targetUseImage">
                  
                 
               
                </ul>
              </div>
            </div>
            <div class="col-xs-12">
              <button class="btn btn-default btn-block openPopUpMedia">
                <i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGEM
              </button>
          
            </div>

  </div>
</div>
</div>
    <div class="col-sm-8">
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="">Sigla</label>
            <input type="text" class="form-control" name="sigla_grupo">
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <label for="">Nome do Grupo</label>
            <input type="text" class="form-control" name="nome_grupo">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
           <div class="form-group">
            <label for="">Valor Padrão</label>
            <input type="text" class="form-control moneyMask" name="valor_padrao">
          </div>
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label for="">Valor Médio</label>
            <input type="text" class="form-control moneyMask" name="">
          </div>
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label for="">Valor Baixo</label>
            <input type="text" class="form-control moneyMask" name="">
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-sm-4">
           <div class="form-group">
            <label for="">Status</label><Br>
            <label class="switch">
              <input type="checkbox" name="status" checked="" id="" value="1">
              <span class="slider round" ></span>
            </label>
          </div>
        </div>
      </div>

    </div>
<hr>
<div class="row">
  <div class="col-sm-12">
  <h3>Opcionais</h3>

  <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
    <div class="row">
       <div class="col-sm-10"><strong>Opcional</strong></div>
      <div class="col-sm-2"><strong>Status</strong></div>
     
     
     
      
    </div>
  </div>
  <div class="visible-xs m-top-lg clearfix"></div>
  @foreach($opcional as $op)
  <div class="box box-solid p-all-sm ">
    <div class="row">
      <div class="col-sm-10 col-xs-2">
        <label for="" class="visible-xs">Opcional</label>
        {{$op->nome}}
      </div>
      <div class="col-sm-2 col-xs-10">
       <div class="form-group">
            <label for="" class="visible-xs">Status</label>
            <label class="switch">
              <input type="checkbox" name="opcional[]" id="" value="{{$op->id}}">
              <span class="slider round" ></span>
            </label>
          </div>
      </div>

      
       
       </div>
     </div>


     @endforeach
  </div>
</div>
  </div>
</div>
<div class="col-sm-12">
                    <div class="list-action">
                      <ul>
                        <li><button type="button" class="btn btn-flat btn-default" data-action="sair">Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-primary" data-action="salvar_sair">Salvar e Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-success" data-action="salvar">Salvar</button></li>
                      </ul>
                    </div>
              </div>
 {!! Form::close() !!}
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
            text: "As alterações no formulário seram perdidas",
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
              window.location = '{{route("admin.grupo_veiculos.lista")}}'
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

             
              window.location = '{{route("admin.grupo_veiculos.lista")}}'
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
              $("#form")[0].reset();
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }



    })
  })
</script>
@endsection