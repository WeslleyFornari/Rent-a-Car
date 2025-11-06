@extends('layouts.painel')
@section('title',' Locadora - Reserva - '. $reserva->cliente->nome)
@section('pre-assets')

<style>
@media print {
  p{
    margin-bottom: 0;
  }
   .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
        float: left;
        padding:0 5px;

   }
   .col-sm-12 {
        width: 100%;
   }
   .col-sm-11 {
        width: 91.66666667%;
   }
   .col-sm-10 {
        width: 83.33333333%;
   }
   .col-sm-9 {
        width: 75%;
   }
   .col-sm-8 {
        width: 66.66666667%;
   }
   .col-sm-7 {
        width: 58.33333333%;
   }
   .col-sm-6 {
        width: 50%;
   }
   .col-sm-5 {
        width: 41.66666667%;
   }
   .col-sm-4 {
        width: 33.33333333%;
   }
   .col-sm-3 {
        width: 25%;
   }
   .col-sm-2 {
        width: 16.66666667%;
   }
   .col-sm-1 {
        width: 8.33333333%;
   }
   .col-print-1 {width:8% !important;  float:left;}
  .col-print-2 {width:16% !important; float:left;}
  .col-print-3 {width:25% !important; float:left;}
  .col-print-4 {width:33% !important; float:left;}
  .col-print-5 {width:42% !important; float:left;}
  .col-print-6 {width:50% !important; float:left;}
  .col-print-7 {width:58% !important; float:left;}
  .col-print-8 {width:66% !important; float:left;}
  .col-print-9 {width:75% !important; float:left;}
  .col-print-10{width:83% !important; float:left;}
  .col-print-11{width:92% !important; float:left;}
  .col-print-12{width:100% !important; float:left;}
}
</style>
@endsection
@section('content')
<section class="content-header p-all-0 m-top-md">
   <h1 class="col-sm-12">Reserva </h1>
    <div class="clearfix"></div>
  </section>
{!! Form::model(null,['route'=>['admin.reservas.update',$reserva->id],'id'=>'formClienteReserva']) !!}

<div class="panel m-top-md col-sm-12">
  <div class="panel-heading">
     <h2 class="panel-title"><strong></strong></h2> 
  </div>
  <div class="panel-body" id="nota">
    <div class="row">
      <div class="col-sm-4 col-print-12">
        <label for="">Grupo Reserva</label>
        <div class="col-print-4">
        <img src="{{$reserva->grupo_veiculo->media->fullpatch()}}" alt="">
        <h3 class="text-center bg-gray p-all-xs">Grupo {{$reserva->grupo_veiculo->sigla_grupo}} - {{$reserva->grupo_veiculo->nome_grupo}}</h3>
        <hr class="no-print">
        </div>
          <div style="max-height: 430px;overflow-y: auto; ">
          <table class="table">
            <thead>
              <tr class="bg-gray">
                <th>Veiculo</th>
              </tr>
            </thead>
          
            <tbody>
              <tr>
                <td>{{@$reserva->veiculo->nome}} - Cor: {{@$reserva->veiculo->cor}}<br> Placa: {{@$reserva->veiculo->final_placa}}</td>
              </tr>
              </tbody>
             
          </table>
          </div>

      </div>
      <div class="col-sm-8  col-print-12">
        <h4 class="row bg-blue p-all-sm">Reserva</h4>
        <div class="row">
          <div class="col-sm-3">
            <label for="">Status</label>
            <p>{{$reserva->status}}</p>
            
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              <label>Data Inicio</label>
              <p>{{$reserva->data_inicio}}</p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Hora Inicio</label>
             <p>{{date('H:i',strtotime($reserva->hora_inicio))}}</p>
            </div>
          </div>
           <div class="col-sm-3 col-xs-3 text-left">
            <label>Data Fim</label>
            <p>{{$reserva->data_termino}}</p>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Hora Término</label>
              <p>{{date('H:i',strtotime($reserva->hora_termino))}}</p>
            </div>
          </div>
        </div>
       
         <h4 class="row bg-blue p-all-sm">Cliente</h4>
        <div class="row">
          <div class="col-sm-8">
          <label for="">Nome</label><br>          
            <p>{{$reserva->cliente->nome}}</p>
         </div>
          <div class="col-sm-4">
          <label for="">Email</label><br>
          <p>{{$reserva->cliente->email}}</p>
         </div>
          <div class="col-sm-4">
          <label for="">CPF</label><br>
        <p>{{$reserva->cliente->cpf}}</p>
         </div>
          <div class="col-sm-4">
          <label for="">Data Nascimento</label><br>
            <p>{{$reserva->cliente->data_nascimento}}</p>
               </div>
          <div class="col-sm-4">
          <label for="">CNH</label><br>
        
           <p>{{$reserva->cliente->cnh}}</p>
         </div>
         <div class="col-sm-4  @if( $reserva->cliente->data_cnh->format('Y-m-d') <= date('Y-m-d')) has-error @endif">
          <label for="">Validade CNH</label><br>
          
           <p>{{$reserva->cliente->data_cnh->format('d/m/Y')}}</p>
         </div>
        
        <div class="col-sm-4">
          <label for="">Telefone</label><br>
          
          <p>{{$reserva->cliente->telefone1}}</p>
        </div>
        <div class="col-sm-4">
            <label>Celular</label>
            
            <p>{{$reserva->cliente->telefone2}}</p>
        </div>
        <div class="col-sm-4"></div>
        
        </div> <h4 class="row bg-blue p-all-sm">Condutor</h4>
        @if($reserva->cliente->nome == $reserva->condutor->nome)
        <div class="row">
          <div class="col-sm-12"><label for="">Cliente irá conduzir o veículo</label></div>

     
      </div>
        @else
        <div class="row ">
          <div class="col-sm-8">
          <label for="">Nome</label>
          <p>{{$reserva->condutor->nome}}</p>
         </div>
         
          <div class="col-sm-4">
          <label for="">CPF</label>
          <p>{{$reserva->condutor->cpf}}</p>
         </div>
          <div class="col-sm-3">
          <label for="">Data Nascimento</label>
          <p>{{$reserva->cliente->data_nascimento}}</p>
         </div>
          <div class="col-sm-3">
          <label for="">CNH</label>
         
            <p>{{$reserva->condutor->cnh}}</p>
         </div>
          <div class="col-sm-3 @if($reserva->condutor->data_cnh->format('Y-m-d') <= date('Y-m-d') ) has-error @endif ">
          <label for="">Validade CNH</label>
          
            <p>{{$reserva->condutor->data_cnh->format('d/m/Y')}}</p>
         </div>
        
        <div class="col-sm-3">
          <label for="">Telefone</label>
           <p>{{$reserva->condutor->telefone}}</p>
        </div>
     
      </div>
       
        @endif
        @if(!is_null($reserva->cliente->cnpj))
        <h4 class="row bg-blue p-all-sm">Empresa</h4>
        <div class="row">
          <div class="col-sm-4">
          <label for="">Empresa</label>
          <p>{{$reserva->cliente->nome_empresa}}</p>
         </div>
          <div class="col-sm-4">
          <label for="">CNPJ</label><br>
           <p>{{$reserva->cliente->cnpj}}</p>
         </div>
        </div>
        @endif
        <h4 class="row bg-blue p-all-sm">Endereço</h4>
        <div class="row">
          <div class="col-sm-4 col-xs-4">
          <label>CEP</label>
           
             <p>{{$reserva->cliente->cep}}</p>
          </div>
          <div class="col-sm-4 col-xs-6">
              <label>Endereço</label>
          
               <p>{{$reserva->cliente->endereco}}</p>
        
          </div>
          <div class="col-sm-4 col-xs-4 ">
            <label>Número</label>
          
                <p>{{$reserva->cliente->numero}}</p>
         
          </div>
         
          <div class="col-sm-4 col-xs-4 ">
            <label>Complemento</label>
           @if(!is_null(@$reserva->cliente->complemento))
                <p>{{@$reserva->cliente->complemento}}</p>
               @else
               <p>Sem Complemento</p> 
            @endif 
          
          </div>
      
          <div class="col-sm-4 col-xs-12 ">
            <label>Cidade</label>
          
                <p>{{$reserva->cliente->cidade}}</p>
          </div>
          <div class="col-sm-4 col-xs-12 text-left">
            <label>Estado</label>
          
                <p>{{$reserva->cliente->estado}}</p>
          </div>
        
        </div>
        @if(!is_null($reserva->cliente->observacao))

        <h4 class="row bg-blue p-all-sm">Observação</h4>
        <div class="row">
          <div class="col-sm-12">
            <p>{{$reserva->cliente->observacao}}</p>
          </div>
        </div>
        @endif
        
        <h4 class="row bg-blue p-all-sm">Pagamento</h4>
        <div class="row">
          <div class="col-sm-4">
            <label for="">Forma de Pagamento</label>
            <div>{{@$reserva->pagamento_reserva->tipo_pagamento}}</div>
          </div>
          <div class="col-sm-4">
            <label for="">Status</label>
            <div>{{@$reserva->pagamento_reserva->statusPagamento->titulo_pagamento}}</div>
          </div>
          <div class="col-sm-4">
            <label for="">Valor</label>
            <div>R$ {{@number_format($reserva->valor,2,',','.')}}</div>
          </div>
        </div>
        <div class="row no-print">
          <div class="col-sm-4">
            <label for="">Valor Líquido</label>
            @if(@$reserva->pagamento_reserva->valor_liquido)
              <div>R$ {{@number_format($reserva->pagamento_reserva->valor_liquido,2,',','.')}}</div>
            @endif
          </div>
          <div class="col-sm-4">
             <label for="">Taxa Pagseguro</label>
            @if(@$reserva->pagamento_reserva->taxa_pagseguro)
              <div>R$ {{@number_format($reserva->pagamento_reserva->taxa_pagseguro,2,',','.')}}</div>
            @endif
          </div>
          <div class="col-sm-4">
             <label for="">Data Liberação Pagseguro</label>
            @if(@$reserva->pagamento_reserva->data_valor_disponivel)
              <div>{{$reserva->pagamento_reserva->data_valor_disponivel}}</div>
            @endif
          </div>
        </div>
       
    </div>
  
      
      </div>
  </div>
<p>*Reserva não oficial</p>

</div>

 {!! Form::close() !!}


   @endsection

   @section('pos-script')
   <script type="text/javascript">
    window.print();
   setTimeout(window.close, 0);

$('input[name="checkCondutor"]').change(function(e){
  
    $("#informarCondutor").toggleClass("hidden")
      if($(this).is(":checked")){
    $("#informarCondutor input").attr("required","true")
  }else{
  $("#informarCondutor input").removeAttr("required")
  }

  });
   </script>
   @endsection