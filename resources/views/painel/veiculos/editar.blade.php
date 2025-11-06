


  @extends('layouts.painel')
@section('title')
Home | Novo Usuário
@stop

@section('content')

<section class="content-header p-all-0 m-top-md">
                    <h1 class="col-sm-6">Cadastrar Veículo  </h1>
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
     {!! Form::model(null,['route'=>['admin.veiculos.update',$veiculo->id],'id'=>'form']) !!}

      <div class="col-sm-12 m-bottom-md">
        <label for="">Status</label><br>
        <label for="">Disponivel
          <input type="radio" name="status" value="disponivel" @if($veiculo->status == "disponivel") checked @endif class="flat-green">
      </label>
        <label for="">Inativo
          <input type="radio" name="status" value="inativo" @if($veiculo->status == "inativo") checked @endif  class="flat-red">
      </label>
      <label for="">Reservado
          <input type="radio" name="status" value="reservado" @if($veiculo->status == "reservado") checked @endif  class="flat-orange">
      </label>
      </div>
   <div class="col-sm-4">
     <div class="form-group">
       <label for="">Grupo de Veículos</label>
       <select name="grupo_veiculo_id" id="" class="form-control">
        @foreach($grupo as $key => $item)
        <option value="{{$key}}" @if($veiculo->grupo_veiculo_id == $key) selected @endif>{{$item}}</option>
        @endforeach
       </select>
     </div>
   </div>
  
        <div class="col-sm-4">
          <div class="form-group">
            <label for="">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{$veiculo->nome}}">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="">Final Placa</label>
            <input type="text" name="final_placa" class="form-control" value="{{$veiculo->final_placa}}">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="">Cor</label>
            <input type="text" name="cor" class="form-control" value="{{$veiculo->cor}}">
          </div>
        </div>

         {!! Form::close() !!}
      </div>

</div>

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
              window.location = '{{route("admin.veiculos.lista")}}'
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

             
              window.location = '{{route("admin.veiculos.lista")}}'
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



    })
  })
</script>
@endsection