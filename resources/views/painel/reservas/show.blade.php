@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')
<section class="content-header p-all-0 m-top-md">
   <h1 class="col-sm-6">Reserva </h1>
    <div class="list-action">
                      <ul>
                        <li><a href="{{route('admin.reservas.print',$reserva->id)}}" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> IMPRIMIR</a></li>
                        <li><button type="button" class="btn btn-flat btn-default" data-action="sair">Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-primary" data-action="salvar_sair">Salvar e Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-success" data-action="salvar">Salvar</button></li>
                      </ul>
                    </div>
    <div class="clearfix"></div>
  </section>
{!! Form::model(null,['route'=>['admin.reservas.update',$reserva->id],'id'=>'formClienteReserva']) !!}

<div class="panel m-top-md col-sm-12">
  <div class="panel-heading">
     <h2 class="panel-title"><strong></strong></h2> 

  </div>
 
  <div class="panel-body">
    <div class="row">
      <div class="col-sm-4">
        <label for="">Grupo Reserva</label>
        <img src="{{$reserva->grupo_veiculo->media->fullpatch()}}" alt="">
        <h3 class="text-center bg-gray p-all-xs">{{$reserva->grupo_veiculo->sigla_grupo}} - {{$reserva->grupo_veiculo->nome_grupo}}</h3>
        <hr>
          <label for="">Veículos Disponiveis</label>
          <div style="max-height: 430px;overflow-y: auto; ">
          <table class="table">
            <thead>
              <tr class="bg-gray">
                <th>Veiculo | Grupo</th>
                <th class="text-center">Reservar</th>
              </tr>
            </thead>
          
            <tbody>
               @foreach($veiculos_estoque as $veiculo)
               @if($veiculo->grupo_veiculo_id == $reserva->grupo_veiculo->id)
              <tr class="">
                <td>{{$veiculo->nome}} - Cor: {{$veiculo->cor}}<br> Placa: {{$veiculo->final_placa}}</td>
                <td class="text-center"><input type="radio" name="reservas[id_veiculo]" value="{{$veiculo->id}}" class="flat-green" 
                  @if ($reserva->id_veiculo == $veiculo->id) checked @endif></td>
              </tr>
              @endif
              @endforeach
  <tr class="bg-gray">
                <th colspan="2">Outros em estoque:</th>
               
              </tr>
              @foreach($veiculos_estoque as $veiculo)
               @if($veiculo->grupo_veiculo_id != $reserva->grupo_veiculo->id)
              <tr>
                <td>{{$veiculo->nome}} - Cor: {{$veiculo->cor}}<br> Placa: {{$veiculo->final_placa}}</td>
                <td class="text-center"><input type="radio" name="reservas[id_veiculo]" value="{{$veiculo->id}}" class="flat-green" @if ($reserva->id_veiculo == $veiculo->id) checked @endif></td>
              </tr>
              @endif
              @endforeach
              </tbody>
             
          </table>
          </div>
      </div>
      <div class="col-sm-8">
        <h4 class="row bg-blue p-all-sm">Reserva</h4>
        <div class="row">
          <div class="col-sm-3">
            <label for="">Status</label>
            <select name="reservas[status]" id="" class="form-control">
              <option value="em_aberto" @if($reserva->status == "em_aberto") selected @endif>Em Aberto</option>
              <option value="confirmada" @if($reserva->status == "confirmada") selected @endif>Confirmada</option>
              <option value="pendente" @if($reserva->status == "pendente") selected @endif>Pendente</option>
              <option value="cancelada" @if($reserva->status == "cancelada") selected @endif>Cancelada</option>
              <option value="finalizada" @if($reserva->status == "finalizada") selected @endif>Finalizada</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              <label>Data Inicio</label>
              <input type="text" name="reservas[data_inicio]" class="form-control data-mask calendar"  value="{{@$reserva->data_inicio->format('d/m/Y')}}">
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Hora Inicio</label>
              <input type="text" name="reservas[hora_inicio]" class="form-control timeMask"  value="{{date('H:i',strtotime($reserva->hora_inicio))}}">
            </div>
          </div>
           <div class="col-sm-3 col-xs-3 text-left">
            <label>Data Fim</label>
            <input type="text" name="reservas[data_termino]" class="form-control data-mask calendar"  value="{{$reserva->data_termino->format('d/m/Y')}}">
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Hora Término</label>
              <input type="text" name="reservas[hora_termino]" class="form-control timeMask"  value="{{date('H:i',strtotime($reserva->hora_termino))}}">
            </div>
          </div>
        </div>
       
         <h4 class="row bg-blue p-all-sm">Cliente</h4>
        <div class="row">
          <div class="col-sm-8">
          <label for="">Nome</label><br>
          

            <input type="text" class="form-control" name="cliente[nome]" value="{{$reserva->cliente->nome}}">
         </div>
          <div class="col-sm-4">
          <label for="">Email</label><br>
          
            <input type="text" class="form-control" name="cliente[email]" value="{{$reserva->cliente->email}}">
         </div>
          <div class="col-sm-4">
          <label for="">CPF</label><br>
        
           <input type="text" class="form-control" name="cliente[cpf]" value="{{$reserva->cliente->cpf}}">
         </div>
          <div class="col-sm-4">
          <label for="">Data Nascimento</label><br>
          
              <input type="text" class="form-control" name="cliente[data_nascimento]" value="{{$reserva->cliente->data_nascimento}}">
         </div>
          <div class="col-sm-4">
          <label for="">CNH</label><br>
        
            <input type="text" class="form-control" name="cliente[cnh]" value="{{$reserva->cliente->cnh}}">
         </div>
         <div class="col-sm-3  @if( @$reserva->cliente->data_cnh != "" &&  @$reserva->cliente->data_cnh->format('Y-m-d') <= date('Y-m-d')) has-error @endif">
          <label for="">Validade CNH</label><br>
          
            <input type="text" class="form-control" name="cliente[data_cnh]" value="@if(@$reserva->cliente->data_cnh != "") {{@$reserva->cliente->data_cnh->format('d/m/Y')}} @endif">
         </div>
        
        <div class="col-sm-4">
          <label for="">Telefone</label><br>
          
          <input type="text" class="form-control" name="cliente[telefone1]" value="{{@$reserva->cliente->telefone1}}">
        </div>
        <div class="col-sm-4">
            <label>Celular</label>
            
            <input type="text" class="form-control" name="cliente[telefone2]" value="{{@$reserva->cliente->telefone2}}">
        </div>
        <div class="col-sm-4"></div>
        
        </div> <h4 class="row bg-blue p-all-sm">Condutor</h4>
        @if(@$reserva->cliente->nome == @$reserva->condutor->nome)
        <div class="row">
          <div class="col-sm-12"><label for="">Cliente irá conduzir o veículo</label></div>
          <div class="col-sm-12"><input type="checkbox" name="checkCondutor" id="" value="1"> Informar Condutor</div>
        </div>
        <div class="row hidden" id="informarCondutor">
          <div class="col-sm-8">
          <label for="">Nome</label><br>
           <input type="text" class="form-control" name="condutor[nome]" value="">
         </div>
         
          <div class="col-sm-4">
          <label for="">CPF</label><br>
           <input type="text" class="form-control" name="condutor[cpf]" value="">
         </div>
          <div class="col-sm-3">
          <label for="">Data Nascimento</label><br>
           <input type="text" class="form-control" name="condutor[data_nascimento]" value="">
         </div>
          <div class="col-sm-3">
          <label for="">CNH</label><br>
         
            <input type="text" class="form-control" name="condutor[cnh]" value="">
         </div>
          <div class="col-sm-3">
          <label for="">Validade CNH</label><br>
          
            <input type="text" class="form-control" name="condutor[data_cnh]" value="">
         </div>
        
        <div class="col-sm-3">
          <label for="">Telefone</label><br>
          
           <input type="text" class="form-control" name="condutor[telefone]" value="">
        </div>
     
      </div>
        @else
        <div class="row ">
          <div class="col-sm-8">
          <label for="">Nome</label><br>
           <input type="text" class="form-control" name="condutor[nome]" value="{{@$reserva->condutor->nome}}">
         </div>
         
          <div class="col-sm-4">
          <label for="">CPF</label><br>
           <input type="text" class="form-control cpfMask" name="condutor[cpf]" value="{{@$reserva->condutor->cpf}}">
         </div>
          <div class="col-sm-3">
          <label for="">Data Nascimento</label><br>
           <input type="text" class="form-control" name="condutor[data_nascimento]" value="{{@$reserva->cliente->data_nascimento}}">
         </div>
          <div class="col-sm-3">
          <label for="">CNH</label><br>
         
            <input type="text" class="form-control" name="condutor[cnh]" value="{{@$reserva->condutor->cnh}}">
         </div>
          <div class="col-sm-3 @if(@$reserva->condutor->data_cnh != "" && @$reserva->condutor->data_cnh->format('Y-m-d') <= date('Y-m-d') ) has-error @endif ">
          <label for="">Validade CNH</label><br>
          
            <input type="text" class="form-control" name="condutor[data_cnh]" value="@if(@$reserva->condutor->data_cnh != "") {{@$reserva->condutor->data_cnh->format('d/m/Y')}} @endif">
         </div>
        
        <div class="col-sm-3">
          <label for="">Telefone</label><br>
          
           <input type="text" class="form-control" name="condutor[telefone]" value="{{@$reserva->condutor->telefone}}">
        </div>
     
      </div>
       
        @endif
        @if(!is_null($reserva->cliente->cnpj))
        <h4 class="row bg-blue p-all-sm">Empresa</h4>
        <div class="row">
          <div class="col-sm-4">
          <label for="">Empresa</label><br>
         
           <input type="text" class="form-control" name="cliente[nome_empresa]" value="{{@$reserva->cliente->nome_empresa}}">
         </div>
          <div class="col-sm-4">
          <label for="">CNPJ</label><br>
           
            <input type="text" class="form-control" name="cliente[cnpj]" value="{{@$reserva->cliente->cnpj}}">
         </div>
        </div>
        @endif
        <h4 class="row bg-blue p-all-sm">Endereço</h4>
        <div class="row">
          <div class="col-sm-3 col-xs-4">
          <label>CEP</label>
           
             <input type="text" class="form-control" name="cliente[cep]" value="{{@$reserva->cliente->cep}}">
          </div>
          <div class="col-sm-4 col-xs-6">
              <label>Endereço</label>
          
                <input type="text" class="form-control" name="cliente[endereco]" value="{{$reserva->cliente->endereco}}">
        
          </div>
          <div class="col-sm-4 col-xs-4 ">
            <label>Número</label>
          
                <input type="text" class="form-control" name="cliente[numero]" value="{{$reserva->cliente->numero}}">
         
          </div>
          <div class="col-sm-4 col-xs-4 ">
            <label>Complemento</label>

            
                <input type="text" class="form-control" name="cliente[complemento]" value="{{@$reserva->cliente->complemento}}">
          
          </div>
         
          <div class="col-sm-4 col-xs-12 ">
            <label>Cidade</label>
          
                <input type="text" class="form-control" name="cliente[cidade]" value="{{$reserva->cliente->cidade}}">
          </div>
          <div class="col-sm-4 col-xs-12 text-left">
            <label>Estado</label>
          
                <input type="text" class="form-control" name="cliente[estado]" value="{{$reserva->cliente->estado}}">
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
        
        <h4 class="row bg-blue p-all-sm">Pagamento </h4>
        <div class="row">
          <div class="col-sm-4">
            <label for="">Forma de Pagamento</label>
            <select name="pagamento[tipo_pagamento]" id="" class="form-control">
              <option value="transferencia" @if(@$reserva->valor_transferencia != "") selected @endif> Transferência</option>
              <option value="cartao" @if(@$reserva->pagamento_reserva->tipo_pagamento == "cartao") selected @endif >Cartão de Crédito</option>
              <option value="debito"  @if(@$reserva->pagamento_reserva->tipo_pagamento == "debito") selected @endif>Cartão de Débito</option>
              <option value="dinheiro" @if(@$reserva->pagamento_reserva->tipo_pagamento == "dinheiro") selected @endif>Dinheiro</option>
              <option value="boleto" @if(@$reserva->pagamento_reserva->tipo_pagamento == "boleto") selected @endif>Boleto</option>
            </select>

          </div>
          <div class="col-sm-4">
            <label for="">Status</label>
            <select name="pagamento[status_pagamento]" id="" class="form-control">
              @foreach(@$StatusPagamento as $key => $item)
              <option value="{{$key}}" @if(@$reserva->pagamento_reserva->status_pagamento == $key) selected @endif>{{$item}}</option>
              @endforeach
            </select>
            
          </div>
          <div class="col-sm-4">
            <label for="">Valor</label>
            <input type="text" class="form-control moneyMask" name="reservas[valor]" value="{{number_format(@$reserva->valor,2,',','.')}}" >
          
          </div>
           @if(@$reserva->valor_transferencia != "")
          <div class="col-sm-4">
            <label for="">Valor transferência</label>
            <input type="text" class="form-control moneyMask" name="reservas[valor]" value="{{number_format(@$reserva->valor_transferencia,2,',','.')}}" >
          
          </div>
          @endif
      
          <div class="col-sm-4">
            <label for="">Valor Líquido</label>
           <input type="text" name="pagamento[valor_liquido]" class="form-control moneyMask" value="{{number_format(@$reserva->pagamento_reserva->valor_liquido,2,',','.')}}">
            
         
          </div>
          <div class="col-sm-4">
             <label for="">Taxa Pagseguro</label>
            
            <input type="text" name="pagamento[taxa_pagseguro]" class="form-control moneyMask" value="{{number_format(@$reserva->pagamento_reserva->taxa_pagseguro,2,',','.')}}" >
             
           
          </div>
          <div class="col-sm-4">
             <label for="">Data Liberação Pagseguro</label>
           
            <input type="text" class="form-control" name="pagamento[data_valor_disponivel]" value="{{@$reserva->pagamento_reserva->data_valor_disponivel}}">
          </div>
          @if(!is_null($reserva->compovante_transferencia ))
            <div class="col-sm-4">
               <label for="">Comprovante de Transferência</label>
             
               

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Comprovante
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Comprovante</h4>
      </div>
      <div class="modal-body">
       <img src="{{asset('img/comprovantes/'.$reserva->compovante_transferencia)}}" alt="">
      </div>
   
    </div>
  </div>
</div>
            </div>
          @endif
        </div>
        <h4 class="row bg-blue p-all-sm">Cartão Calção <div class="pull-right" id="countdown"> </div></h4>
        <div class="row">
          @if(!@$decrypt)
          <div class="col-sm-4">
            <div class="input-group">
                <input type="password" name="getPass" class="form-control" placeholder="*****">
                <span class="input-group-btn">
                  <button class="btn btn-success" id="sendPass" type="button"><i class="fa fa-key"></i></button>
                </span>
              </div><!-- /input-group -->

          </div>
          @else

          <div class="col-sm-4 col-xs-12 m-top-sm" style="position: relative;">
                    <label for="">Número do Cartão</label>
                    <input type="text"  id="numCartao_calcao" value="{{$decrypt['numero_cartao']}}" name="numero_calcao" class="form-control numeroCardMask">     
                    <div class="img-bandeira col-sm-4" style="position: absolute; right: 28px;
                    bottom: 7px; width: 42px; height: 20px;" ></div>
                  </div>
                  
                  <div class="col-sm-4 col-xs-12 m-top-sm">
                    <label for="">Validade</label>
                    <input type="text" name="validade_calcao" required="" value="{{$decrypt['validade']}}" id="validade_calcao" class="form-control validadeMask">
                  </div>
                  <div class="col-sm-4 col-xs-12 m-top-sm">
                    <label for="">CVV</label>
                    <input type="text" name="cvv_calcao" required=""  value="{{$decrypt['cvv']}}" id="cvv_calcao" class="form-control">
                  </div>
                  <div class="clearfix"></div>
<div class="col-sm-4 col-xs-12 ">
                   
                    <label for="">CEP</label>
                    <div class="input-group">
                      <input type="text" id="cep_cartao_calcao" required="" value="{{$reserva->cartao_calcao->cep}}" name="cep_cartao_calcao"  class="form-control cepMask" placeholder="">
                      <span class="input-group-btn">
                        <button id="btnBuscaCepCalcao" required="" class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                  </div>
                 
                 
                    
                    <div class="col-sm-5 col-xs-12 m-top-sm">
                      <label for="">Endereço *</label>
                      <input type="text" id="endereco_cartao_calcao" required=""  value="{{$reserva->cartao_calcao->endereco}}" name="endereco_cartao_calcao" class="form-control">
                    </div>
                    <div class="col-sm-3 col-xs-12 m-top-sm">
                      <label for="">Número *</label>
                      <input type="text" id="numero_cartao_calcao" required=""  value="{{$reserva->cartao_calcao->numero}}" name="numero_cartao_calcao" class="form-control">
                    </div>
                    <div class="col-sm-4 col-xs-12 m-top-sm">
                      <label for="">Complemento</label>
                      <input type="text" id="complemento_cartao_calcao"  value="{{$reserva->cartao_calcao->complemento}}"  name="complemento_cartao_calcao" class="form-control">
                    </div>
                    <div class="col-sm-8 col-xs-12 m-top-sm">
                      <label for="">Bairro *</label>
                      <input type="text" id="bairro_cartao_calcao" required=""  value="{{$reserva->cartao_calcao->bairro}}" name="bairro_cartao_calcao" class="form-control">
                    </div>
                    <div class="col-sm-4 col-xs-12 m-top-sm">
                      <label for="">Cidade *</label>
                      <input type="text" id="cidade_cartao_calcao" required=""  value="{{$reserva->cartao_calcao->cidade}}" name="cidade_cartao_calcao" class="form-control">
                    </div>
                    <div class="col-sm-2 col-xs-12 m-top-sm">
                      <label for="">Estado</label>
                      <input type="text" id="estado_cartao_calcao" required="" name="estado_cartao_calcao"  value="{{$reserva->cartao_calcao->estado}}" class="form-control">
                    </div>
                 
          @endif
          
        </div>
        <div class="row" id="resultado">
            
          </div>
    </div>
  
      
      </div>
  </div>
  @if(!@$decrypt)
<div class="row">
  <div class="col-xs-12">
    <div class="box-footer">
                 <div class="list-action">
                      <ul>
                        <li><a href="{{route('admin.reservas.print',$reserva->id)}}" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> IMPRIMIR</a></li>
                        <li><button type="button" class="btn btn-flat btn-default" data-action="sair">Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-primary" data-action="salvar_sair">Salvar e Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-success" data-action="salvar">Salvar</button></li>
                      </ul>
                    </div>
   </div>
 </div>
</div>
@endif
</div>

 {!! Form::close() !!}

{!! Form::model(null,['route'=>['admin.reservas.decrypt',$reserva->id],'id'=>'formDecript']) !!}
  <input type="hidden" name="password">
{!! Form::close() !!}
   @endsection

   @section('pos-script')
   <script>
  // Total seconds to wait
    var seconds = 15;
    
    function countdown() {
        seconds = seconds - 1;
        if (seconds < 0) {
            // Chnage your redirection link here
            window.location = "{{route('admin.reservas.show',$reserva->id)}}";
        } else {
            // Update remaining seconds
            document.getElementById("countdown").innerHTML = seconds;
            // Count down using javascript
            window.setTimeout("countdown()", 1000);
        }
    }
    @if(@$decrypt)
        countdown();
    @endif
  $(document).ready(function(){

    $("#sendPass").click(function(e){
      e.preventDefault();
      $('input[name="password"]').val($('input[name="getPass"]').val());
      $("#formDecript").submit()

    })
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
                    text: "Cancelar",
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
              window.location = '{{route("admin.reservas.lista")}}'
             }
         });
      }else if(action == 'salvar_sair'){
        $.post($("#formClienteReserva").attr('action'),$("#formClienteReserva").serialize(),function(data){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
              });

             
              window.location = '{{route("admin.reservas.lista")}}'
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }else if(action == 'salvar'){
        $.post($("#formClienteReserva").attr('action'),$("#formClienteReserva").serialize(),function(data){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
                timer:1000,
              });
           
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }



    })
  })
</script>
   <script type="text/javascript">
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