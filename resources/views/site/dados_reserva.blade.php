@extends('layouts.site')
<?php header("access-control-allow-origin: https://pagseguro.uol.com.br");
header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");?>
@section('title', 'Home')
@section('pre-assets')
<style>
	.btDestaque  {
		display: none !important;
	}
.fixed{
	position: fixed;
	top:10px;
	
	z-index: 100
}
.actionEditar{
	display: none;
}
#resultadoPagamento{
	text-align: center;
	margin-top: 40px;
}
#resultadoPagamento.success .fa{
	font-size: 5em;
	color: green;
	text-shadow: 9px 11px 18px rgba(125, 125, 125, 0.45098039215686275);
}
#resultadoPagamento.info .fa{
	font-size: 5em;
	color: #2da0c7;
	text-shadow: 9px 11px 18px rgba(125, 125, 125, 0.45098039215686275);
}
#resultadoPagamento.success h2{
	color: green;
}
#resultadoPagamento.info h2{
	color: #2da0c7;
}
.btDestaque{
	background: #ff7b00;
   cursor: default;
    color: #fff;
    width: 100%;
    margin-top: 20px;
    padding: 5px;
    border-radius: 5px;
    border: 4px solid #ffb800;
}
.btDestaque:hover{
	background: #ffb800;
	transition: 0.2s all linear;
}
.btDestaque .text{
	display: inline-block;
    font-size: 1.5em;
    width: 100%;
    text-align: center;
}
.btDestaque .val{
	    width: 100%;
    display: inline-block;
    font-size: 2em;
    vertical-align: bottom;
}
.btDestaque .val::after{
	content: " <<"
}
.btDestaque .val::before{
	content: ">> ";
}
</style>

@endsection

@section('content')
        
            <div class="container">
            
				<div class="col-md-8">
					<div class="progresso">
						<hr>
						<div class="check-esq"><i class="fas fa-check"></i>
							<div class="txt">Data e hora da reserva</div>
						</div>
						<div class="check-cen">2<div class="txt">Grupo de veículos</div></div>
						<div class="check-dir">3
							<div class="txt">Dados e<br> pagamento</div>
						</div>

					</div>

					<div class="tit-reserva">
					<h2>DADOS DA RESERVA</h2>
					</div>
					 {!! Form::model(null,['route'=>['site.clienteStore'],'id'=>'formClienteReserva']) !!}
					 <input type="hidden" name="id_reserva" value="{{@$reserva->id}}">
					 <input type="hidden" name="id_cliente" value="{{@$reserva->id_cliente}}">
					 <input type="hidden" name="valor" value="{{$valores['valor_final']}}">
						<div class="grupo-formulario"> 
							<div class="item-formulario">
							<div class="aba-formulario">
								<span class="tit-formulario">Cliente</span>
							</div>
							<div class="clearfix p-top-sm"></div>

							<div class="col-md-6 col-xs-12">
								<div class="p-top-sm">Nome completo:*</div>
								<input type="text" class="form-control" required="" name="cliente[nome]" value="{{@$reserva->cliente->nome}}">
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="p-top-sm">E-mail:*</div>
								<input type="text" class="form-control" required="" name="cliente[email]" value="">
							</div>
							<div class="col-md-3 col-xs-12">
								<div class="p-top-sm">Nascimento:*</div>
								<input type="text" class="form-control dataMask" name="cliente[data_nascimento]" required="" value="">
							</div>

							<div class="col-md-3 col-xs-12">
								<div class="p-top-sm">PF/PJ:</div>
								<div class="p-top-sm">
									<div class="col-md-6 col-xs-6"><input type="radio" required="" value="pessoa_fisica" name="cliente[tipo]"> PF</div>
									<div class="col-md-6 col-xs-6"><input type="radio" required="" value="pessoa_juridica" name="cliente[tipo]"> PJ</div>
								</div>	
							</div>
							
							<div class="campos_pj col-xs-12 col-sm-6 p-all-0">
								<div class="col-md-6 col-xs-12">
									<div class="p-top-sm">Empresa:*</div>
									<input type="text" class="form-control" required="" name="cliente[nome_empresa]" value="">
								</div>
								<div class="col-md-6 col-xs-12">
									<div class="p-top-sm">CNPJ:*</div>
									<input type="text" class="form-control cnpjMask" required="" name="cliente[cnpj]" value="">
								</div>
							</div>

							<div class="col-md-3 col-xs-12">
								<div class="p-top-sm">CPF:* </div>
								<input type="text" class="form-control cpfMask " required="" name="cliente[cpf]" value="{{@$reserva->cliente->cpf}}">
							</div>
						<div class="col-md-3 col-xs-12">
									<div class="p-top-sm">CNH:*</div>
									<input type="text" class="form-control" required="" name="cliente[cnh]" value="">
								</div>
								<div class="col-md-3 col-xs-12">
									<div class="p-top-sm">Validade CNH:*</div>
									<input type="text" class="form-control dataMask" required="" name="cliente[data_cnh]" value="">
								</div>
							<div class="col-md-3 col-xs-12">
								<div class="p-top-sm">Telefone:*</div>
								<input type="text" class="form-control telMask" required="" name="cliente[telefone1]" value="">
							</div>
							<div class="col-md-3 col-xs-12">
								<div class="p-top-sm">Celular:*</div>
								<input type="text" class="form-control telMask" required="" name="cliente[telefone2]" value="{{@$reserva->cliente->telefone2}}">
							</div>
							
							<div class="col-md-3 col-xs-12">
							<div class="input-group">
								<div class="p-top-sm">Cep:*</div>
								<input type="text" id="cep" name="cliente[cep]"  class="form-control cepMask" placeholder="">
								<span class="input-group-btn p-top-lg">
								<button id="btnCep" class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
								</span>
							</div>
							</div>
							<div class="col-md-4 col-xs-12">
								<div class="p-top-sm">Endereço:*</div>
								<input type="text" class="form-control" required="" name="cliente[endereco]" value="">
							</div>
							<div class="col-md-2 col-xs-12">
								<div class="p-top-sm">Número:* </div>
								<input type="number" class="form-control" required="" name="cliente[numero]" value="">
							</div>
							<div class="col-md-3 col-xs-12">
								<div class="p-top-sm">Complemento </div>
								<input type="text" class="form-control" name="cliente[complemento]" value="">
							</div>
							<div class="col-md-3 col-xs-12">
								<div class="p-top-sm">Bairro:* </div>
								<input type="text" class="form-control" required="" name="cliente[bairro]" value="">
							</div>
							
							
							<div class="col-md-3 col-xs-12">
								<div class="p-top-sm">Cidade:* </div>
								<input type="text" class="form-control" required="" name="cliente[cidade]" value="">
							</div>
							<div class="col-md-2 col-xs-12">
								<div class="p-top-sm">UF:*</div>
								<input type="text" class="form-control" required="" name="cliente[estado]" value="">
							</div>
							
							<div class="clearfix"></div>				
							<div class="col-md-12 col-xs-12">
							<div class="p-top-sm col-xs-12 col-md-12 ">Observação</div>
								<textarea name="cliente[observacao]" rows="1" id="" style="resize: none;overflow: hidden;min-height: 25px;max-height: 100px;" onkeyup="auto_grow(this)" class="form-control"></textarea>
							</div>
							<div class="col-sm-12 col-xs-12 p-top-sm">
							<button type="submit" class="btn btn-success">AVANÇAR </button>
						</div>

							</div>
							
						</div>
						 {!! Form::close() !!}
						 <div class="clearfix m-top-lg"></div>
						 {!! Form::model(null,['route'=>['site.condutorStore'],'id'=>'formCondutorReserva']) !!}
						<div class="grupo-formulario" id="dadosCondutor" style="display: none" > 
							<input type="hidden" name="id_cliente" value="">
							<input type="hidden" name="id_reserva" value="">
							<div class="item-formulario">
							<div class="aba-formulario">
								<span class="tit-formulario">Condutor</span>
							</div>
								<div class="col-sm-12 col-sm-12 m-top-lg">
									<input type="checkbox" name="checkCondutor" id=""> Usar mesmos dados acima para o condutor
								</div>
								<div class="col-md-9 col-xs-12">
									<div class="p-top-md">Nome:</div>
									<input type="text" class="form-control" name="nome" value="">
								</div>
								<div class="col-md-3 col-xs-12">
									<div class="p-top-md">Data Nascimento:</div>
										<input type="text" class="form-control dataMask" name="data_nascimento" value="">
								</div>
								<div class="clearfix"></div>	
								<div class="col-md-3 col-xs-12">
									<div class="p-top-md">CNH:</div>
									<input type="text" class="form-control" name="cnh" value="">
								</div>
								<div class="col-md-3 col-xs-12">
									<div class="p-top-md">Validade CNH:</div>
										<input type="text" class="form-control dataMask" name="data_cnh" value="">
								</div>	
								<div class="col-md-3 col-xs-12">
									<div class="p-top-md">CPF:</div>
									<div class="control-cpf">
										<input type="text" class="form-control cpfMask" name="cpf" value="">
									</div>
								</div>
								<div class="col-md-3 col-xs-12">
									<div class="p-top-md">Celular:</div>
										<input type="text" class="form-control telMask" name="telefone" value="">
								</div>	
								

							</div>
							<div class="col-sm-12 m-top-lg">
								<button type="submit" class="btn btn-success">AVANÇAR </button>
							</div>
						</div>
						
						 {!! Form::close() !!}
						 <div class="clearfix m-top-lg"></div>

						 {!! Form::model(null,['route'=>['rede.efeturaPagamento'],'id'=>'formPagamento','style'=>'margin-top:50px;display: none']) !!}
						<div class="grupo-formulario"> 
								<input type="hidden" name="id_cliente" value="">
							<input type="hidden" name="id_reserva" value="">
					 <input type="hidden" name="telefone_pagador">
					 <input type="hidden" name="email_pagador">
					<input type="hidden" name="paymentMethod" class="paymentMethod" value="transferencia">
					<input type="hidden" name="hash" class="hashPagSeguro">
					<input type="hidden" name="valor_total" value="{{number_format($valores['valor_final'],2,'.','')}}">
					<input type="hidden" name="valor_avista" value="{{number_format($valorDescontoAvista,2)}}">
					
				


                    <!--
                    <div>
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                      </ul>

                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">...</div>
                        <div role="tabpanel" class="tab-pane" id="profile">...</div>
                        <div role="tabpanel" class="tab-pane" id="messages">...</div>
                        <div role="tabpanel" class="tab-pane" id="settings">...</div>
                      </div>
                    </div>
                    -->


					<div class="item-formulario" >
                            <h2>PAGAMENTO</h2>
                            <div id="myTabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active aba-formulario col-sm-3"><a href="#pagueAgora" role="tab" data-toggle="tab">PAGUE AGORA (TRANSFERÊNCIA)</a></li>
                                    <li role="presentation" class="aba-formulario col-sm-3"><a href="#cartao" role="tab" data-toggle="tab">CARTÃO DE CREDITO</a></li>


									           
                                    </ul>
                                    
									   <div class="tab-content">
									    <div role="tabpanel" class="tab-pane active" id="pagueAgora">
									    	
									      	<div class="panel-body">

									       	<p>
                                                Banco: Itaú<br>
                                                Agência: 7385<br>
                                                Conta Corrente: 29601-2<br>
                                                CNPJ:04.654.093/0001-29<br>
                                                Titular: Vestro Ltda Epp
                                            </p>
       
        <p>Valor: <span style="text-decoration: line-through; font-size: 1.em;">De: R$ {{number_format($valores['valor_final'],2,',','.')}}</span> por <span style="font-weight: bold; font-size: 1.25em; color: #84c223">R$ {{number_format($valorDescontoAvista,2,',','.')}}</span></p>
        <label for="">Comprovante de transferênia <small>(.jpg,.png,.pdf)</small></label><br>
	        <div class="col-sm-6 p-all-0">
	        	<div class="custom-upload">
					<button>Upload <i class="fa fa-upload"></i></button>
					<input type="file"  id="uploadComprovante"  name="file[]">
				</div>
			</div>
	        <div class="col-sm-6">
		        <div class="resultado-upload hidden">
			        <label for="">Arquivo</label><br>
					<a href="" class="arquivo">nomefile.pdf</a> <a href="" target="_blank" class="removeFile text-danger"><i class="fa fa-times-circle"></i></a>

					<input type="hidden" name="comprovante">
				</div>
	        </div>
		<hr>
		<h4 class="m-all-0">Cartão Caução</h4>
		<p>Todos os locatários, deverão apresentar por na abertura do CONTRATO DE LOCAÇÃO, independentemente do prazo de locação do VEÍCULO, cartão de crédito com limite disponível para a pré-autorização, sendo que os valores variam de acordo com a Categoria do VEÍCULO, período, tipo de locação e proteções contratadas</p>
		<div id="dadosCartaoCalcao">
									
									<input type="hidden" name="tokenPagamentoCartao" class="tokenPagamentoCartao">
									<input type="hidden" name="bandeira" class="bandeira">
									<div class="col-sm-4 col-xs-12  m-top-sm">
										<label for="">Nome (impresso no cartão)  *</label>
										<input type="text" name="nome_cartao" required="" class="form-control" style="text-transform: uppercase;">
									</div>
									<div class="col-sm-4 col-xs-12 m-top-sm ">
										<label>CPF Titular Cartão  *</label>
										<div class="cpf_cartao"></div>
										
									</div>
								
									<div class="col-sm-4 col-xs-12 m-top-sm ">
										<label for="">Data Nascimento Titular do cartão  *</label>
										<div class="data_nascimento_pagador"></div>
										
									</div>
									<div class="col-sm-4 col-xs-12 m-top-sm" style="position: relative;">
										<label for="">Número do Cartão</label>
										<input type="text"  id="numCartao_calcao" name="numero_calcao" class="form-control numeroCardMask">			
										<div class="img-bandeira col-sm-4" style=" position: absolute; right: 28px;
										bottom: 7px; width: 42px; height: 20px;    " ></div>
									</div>
									
									<div class="col-sm-4 col-xs-12 m-top-sm">
										<label for="">Validade</label>
										<input type="text" name="validade_calcao" id="validade_calcao" class="form-control validadeMask">
									</div>
									<div class="col-sm-4 col-xs-12 m-top-sm">
										<label for="">CVV</label>
										<input type="text" name="cvv_calcao" id="cvv_calcao" class="form-control">
									</div>

									
									<div class="clear"></div>

									<div class="col-sm-6 col-xs-12  m-top-sm p-top-md">
										<p class="text-danger"><small>Obs.: Mesmo endereço da fatura do cartão</small></p>
										<label for="">CEP</label>
										<div class="input-group">
											<input type="text" id="cep_cartao_calcao" name="cep_cartao_calcao"  class="form-control cepMask" placeholder="">
											<span class="input-group-btn">
												<button id="btnBuscaCepcalcao" class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
											</span>
										</div>
									</div>
									<div class="clear"></div>
									<div id="camposEnderecoCalcao" class="hidden">
										
										<div class="col-sm-5 col-xs-12 m-top-sm">
											<label for="">Endereço *</label>
											<input type="text" id="endereco_cartao_calcao" name="endereco_cartao_calcao" class="form-control">
										</div>
										<div class="col-sm-3 col-xs-12 m-top-sm">
											<label for="">Número *</label>
											<input type="text" id="numero_cartao_calcao" name="numero_cartao_calcao" class="form-control">
										</div>
										<div class="col-sm-4 col-xs-12 m-top-sm">
											<label for="">Complemento</label>
											<input type="text" id="complemento_cartao_calcao"  name="complemento_cartao_calcao" class="form-control">
										</div>
										<div class="col-sm-6 col-xs-12 m-top-sm">
											<label for="">Bairro *</label>
											<input type="text" id="bairro_cartao_calcao" name="bairro_cartao_calcao" class="form-control">
										</div>
										<div class="col-sm-4 col-xs-12 m-top-sm">
											<label for="">Cidade *</label>
											<input type="text" id="cidade_cartao_calcao" name="cidade_cartao_calcao" class="form-control">
										</div>
										<div class="col-sm-2 col-xs-12 m-top-sm">
											<label for="">Estado</label>
											<input type="text" id="estado_cartao_calcao" name="estado_cartao_calcao" class="form-control">
										</div>
									</div>
									<div class="clear"></div>
									<div class="col-sm-12 p-top-md">
										<input type="checkbox" name="li" id=""><a  data-fancybox data-src="#informacoes-legais" href="javascript:;" > Li e concordo com os termos </a>
									</div>
									<div class="col-sm-4 p-top-md ">
										<button type="submit" id="btnTransferencia" class="btn btn-success btn-block m-top-xs">FINALIZAR</button>
									</div>
								</div>
									      </div>
									    </div>
									  
									   
									    <div role="tabpanel" class="tab-pane" id="cartao">
									      <div class="panel-body">
										       <div class="loading" id="cartaoLoading" style="display: none">
													<div class="lds-css ng-scope"><div style="width:100%;height:100%" class="lds-ellipsis"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div></div>
													<h4>Aguarde</h4>
													<h3>Solicitando Liberação</h3>
												</div>

												<div id="dadosCartao">
									
									<input type="hidden" name="tokenPagamentoCartao" class="tokenPagamentoCartao">
									<input type="hidden" name="bandeira" class="bandeira">
									<div class="col-sm-6 col-xs-12  m-top-sm">
										<label for="">Nome (impresso no cartão)  *</label>
										<input type="text" name="nome_cartao" class="form-control" style="text-transform: uppercase;">
									</div>
									<div class="col-sm-6 col-xs-12 m-top-sm ">
										<label for="">CPF Titular Cartão  *</label>
										<div class="cpf_cartao"></div>
										<input type="hidden" name="cpf_cartao"  class="form-control cpfMask">
									</div>
									<div class="clearfix"></div>
									<div class="col-sm-6 col-xs-12 m-top-sm ">
										<label for="">Data Nascimento Titular do cartão  *</label>
										<div class="data_nascimento_pagador"></div>
										<input type="hidden" name="data_nascimento_pagador" class="form-control dataMask">
									</div>
									<div class="col-sm-6 col-xs-12 m-top-sm" style="position: relative;">
										<label for="">Número do Cartão</label>
										<input type="text"  id="numCartao" name="numero" class="form-control numeroCardMask">			
										<div class="img-bandeira col-sm-4" style=" position: absolute; right: 28px;
										bottom: 7px; width: 42px; height: 20px;    " ></div>
									</div>
									
									<div class="col-sm-4 col-xs-12 m-top-sm">
										<label for="">Validade</label>
										<input type="text" name="validade" id="validade" class="form-control validadeMask">
									</div>
									<div class="col-sm-4 col-xs-12 m-top-sm">
										<label for="">CVV</label>
										<input type="text" name="cvv" id="cvv" class="form-control">
									</div>

									<div class="col-sm-4 col-xs-12  m-top-sm">
										<label for="">Parcelas</label>
										<select name="parcelasCartao" id="parcelasCartao" class="form-control">
											<option value=""> Selecione</option>
										</select>
										<input type="hidden" name="valorParcelas" id="valorParcelas">
									</div>
									<div class="clear"></div>

									<div class="col-sm-6 col-xs-12  m-top-sm p-top-md">
										<p class="text-danger"><small>Obs.: Mesmo endereço da fatura do cartão</small></p>
										<label for="">CEP</label>
										<div class="input-group">
											<input type="text" id="cep_cartao" name="cep_cartao"  class="form-control cepMask" placeholder="">
											<span class="input-group-btn">
												<button id="btnBuscaCep" class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
											</span>
										</div><!-- /input-group -->
									</div><!-- /.col-lg-6 -->
									<div class="clear"></div>
									<div id="camposEndereco" class="hidden">
										
										<div class="col-sm-8 col-xs-12 m-top-sm">
											<label for="">Endereço</label>
											<input type="text" id="endereco_cartao" name="endereco_cartao" class="form-control">
										</div>
										<div class="col-sm-4 col-xs-12 m-top-sm">
											<label for="">Número</label>
											<input type="text" id="numero_cartao" name="numero_cartao" class="form-control">
										</div>
										<div class="col-sm-6 col-xs-12 m-top-sm">
											<label for="">Complemento</label>
											<input type="text" id="complemento_cartao" name="complemento_cartao" class="form-control">
										</div>
										<div class="col-sm-6 col-xs-12 m-top-sm">
											<label for="">Bairro</label>
											<input type="text" id="bairro_cartao" name="bairro_cartao" class="form-control">
										</div>
										<div class="col-sm-6 col-xs-12 m-top-sm">
											<label for="">Cidade</label>
											<input type="text" id="cidade_cartao" name="cidade_cartao" class="form-control">
										</div>
										<div class="col-sm-2 col-xs-12 m-top-sm">
											<label for="">Estado</label>
											<input type="text" id="estado_cartao" name="estado_cartao" class="form-control">
										</div>
									</div>
									<div class="clear"></div>
									<div class="col-sm-12 p-top-md">
										<input type="checkbox" name="li" ><a  data-fancybox data-src="#informacoes-legais" href="javascript:;" > Li e concordo com os termos </a>
									</div>
									<div class="col-sm-4 p-top-md ">
										<button type="submit" id="btnCartao" class="btn btn-success btn-block m-top-xs">PAGAR</button>
									</div>
								</div>
									      </div>
									    </div>
									  </div>
                                </div>
								
							</div>
							
						</div>
						
						 {!! Form::close() !!}

						 <div id="resultadoPagamento" style="display: none">									<h2></h2>
									<p></p>
									<a href="" class="imprimirReserva btn btn-success btn-lg">Imprimir reserva</a>
								</div>
<div class="clearfix"></div>
					
				</div>
				<div class="col-md-4" id="resultGroup">
					<input type="hidden" name="diarias" value="{{@$diarias}}">
<input type="hidden" name="data_inicio" value="{{@$data['data_inicio']}}">
<input type="hidden" name="hora_inicio" value="{{@$data['hora_inicio']}}">
<input type="hidden" name="data_termino" value="{{@$data['data_termino']}}">
<input type="hidden" name="hora_termino" value="{{@$data['hora_termino']}}">
<input type="hidden" name="grupo_id" value="{{@$grupo->id}}">
					<div class="menu-lateral">
											
								

					<div class="cabecalho-lateral">
						<li class="destaque">SUA RESERVA</li>
						<li class="editar "><a href="#" class="actionEditar">Editar</a></li>
					</div>
					<div class="reserva p-top-xs">
						<div class="itens"><span class="texto-item">{{@$diarias}}</span></div>
						<div class="itens"><span class="hora-item">{{@$data['hora_inicio']}}</span> <span class="data-item">{{@$data['data_inicio']}}</span></div>
						<div class="itens"><span class="hora-item">{{@$data['hora_termino']}}</span> <span class="data-item">{{@$data['data_termino']}}</span></div>
						<div class="itens"><span class="legenda-item">DIÁRIA</span></div>
						<div class="itens"><span class="legenda-item">RETIRADA</span></div>
						<div class="itens"><span class="legenda-item">DEVOLUÇÃO</span></div>	
						<hr>
						<div class="oferta">
							<h4>OFERTA GRUPO {{@$grupo->sigla_grupo}} - {{@$grupo->nome_grupo}}</h4>

							<span class="detalhes">{{@$grupo->veiculos[0]->nome}} ou Similar</span>
							<div>
								<li class="destaque">{{@$diarias}} Diárias</li>
								<li class="text-right destaque">TOTAL</li>
								<li class="valor">{{@$diarias}} x R${{@number_format($valorDiaria,2,',','.')}}</li>
								<li class="text-right valor">R${{@number_format($valorPeriodo,2,',','.')}}</li>
							</div>


							<hr>
							@if(@$grupo->adicionais)
							 	@foreach ($grupo->adicionais as $key => $value)

								<h4>{{$value->titulo}}</h4>
								<div>
									<li class="valor">{{$diarias}} x R$ {{number_format($value->valor,2,',','.')}}</li>
									<li class="text-right valor">R${{number_format($value->adicional_periodo,2,',','.')}}</li>
								</div>
								<hr>
								@endforeach
							@endif
							
							
							<div class="taxa">
								<li class="destaque">Total de Taxa:</li>
								@if(@$valores)
								<li class="text-right valor">R${{number_format($valores['total_taxa'],2,',','.')}}</li>
								@endif
							</div>
							@if(@$desconto)
							<div class="descontos">
								<h4 class="text-laranja text-center">DESCONTO ESPECIAL PARA HOJE !!!</h4>
								<li class="destaque">Desconto: <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="Desconto aplicado sobre a(s) diária(s)"></i></li>
								
								<li class="text-right valor"> - {{@$desconto->desconto}}%</li>
								
							</div>
							@endif
						</div>
					</div>
					<div class="rodape-lateral">
						<li class="txt-valor">Valor Final</li>
						<li class="valor">R${{number_format($valores['valor_final'],2,',','.')}}</li>
						<div class="parcelamento">Em até 10x de: R${{@$valores['valor_final_dez_vezes']}}</div>
						<input type="hidden" name="valor" value="{{number_format($valores['valor_final'],2,'.','')}}">
					</div>
					
				</div>
					@if(@$valorDescontoAvista)
<button type="button" class="btDestaque @if(!isset($data['grupo_id'])) hidden 	@endif "><span class="text">Pague agora por</span> <span class="val">R${{number_format($valorDescontoAvista,2,',','.')}}</span></button>
@endif
            <div class="col-sm-12 col-xs-12">
                <a  data-fancybox data-src="#informacoes-legais" href="javascript:;" class="m-top-md" > Termos e condições </a>
            </div>
				</div>				

            </div>
<div class="clearfix m-top-lg" ></div>
            
            
        
        
@endsection




@section('pos-script')


<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<!--
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script> 
-->

<script>
	$('.multiple-items').slick({
		slidesToScroll: 1,
		arrows:false,
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 2
	});
	$(".validadeMask").mask('00/0000',  {clearIfNotMatch: true,placeholder: "00/0000"})
	$(".numeroCardMask").mask('0000000000000000',  {clearIfNotMatch: true,placeholder: ""})

			/*$.ajax({
				url : "{{route('pagseguro.inicia.sessao')}}",
				type : 'get',
				dataTyp : 'json',
				async : false,
				timeout: 20000,
				success: function(data){
				//console.log(data)
					PagSeguroDirectPayment.setSessionId(data);		
				}
			});
*/


$.post( '{{route("rede.calcula-parcela")}}',{ valor: $("input[name='valor_total']").val(), _token: '{{ csrf_token() }}' }, function( data ) {
 $.each(data, function (index, value) {
      $('#parcelasCartao').append('<option value="'+index+'">'+index+'x R$ '+value+'</option>');
       
    });
});
		$("input[name='cep_cartao']").keyup(function(){
				var length = $(this).val().length;
				if(length == 9){
					var cep = $("input[name='cep_cartao']").val();
					cep = cep.replace("-","");
					$.get("https://viacep.com.br/ws/"+cep+"/json/",function(response){
						$("input[name='endereco_cartao']").val(response.logradouro)
						$("input[name='bairro_cartao']").val(response.bairro)
						$("input[name='cidade_cartao']").val(response.localidade)
						$("input[name='estado_cartao']").val(response.uf)
						$("#camposEndereco").removeClass("hidden");
					})
				}
			})
			$("#btnBuscaCep").click(function(){
				var cep = $("input[name='cep_cartao']").val();
				cep = cep.replace("-","");
				$.get("https://viacep.com.br/ws/"+cep+"/json/",function(response){
					$("input[name='endereco_cartao']").val(response.logradouro)
					$("input[name='bairro_cartao']").val(response.bairro)
					$("input[name='cidade_cartao']").val(response.localidade)
					$("input[name='estado_cartao']").val(response.uf)
					$("#camposEndereco").removeClass("hidden");
				})
			});
			$("input[name='cep_cartao_calcao']").keyup(function(){
				var length = $(this).val().length;
				if(length == 9){
					var cep = $("input[name='cep_cartao_calcao']").val();
					cep = cep.replace("-","");
					$.get("https://viacep.com.br/ws/"+cep+"/json/",function(response){
						$("input[name='endereco_cartao_calcao']").val(response.logradouro)
						$("input[name='bairro_cartao_calcao']").val(response.bairro)
						$("input[name='cidade_cartao_calcao']").val(response.localidade)
						$("input[name='estado_cartao_calcao']").val(response.uf)
						$("#camposEnderecoCalcao").removeClass("hidden");
					})
				}
			})
			$("#btnBuscaCepCalcao").click(function(){
				var cep = $("input[name='cep_cartao']").val();
				cep = cep.replace("-","");
				$.get("https://viacep.com.br/ws/"+cep+"/json/",function(response){
					$("input[name='endereco_cartao']").val(response.logradouro)
					$("input[name='bairro_cartao']").val(response.bairro)
					$("input[name='cidade_cartao']").val(response.localidade)
					$("input[name='estado_cartao']").val(response.uf)
					$("#camposEnderecoCalcao").removeClass("hidden");
				})
			});
		$('#uploadComprovante' ).on('change', function() {
        $(".loading-dot").fadeIn('fast');
          var data = new FormData();
          console.log($("input[id='uploadComprovante']")[0].files);
            $.each($("input[id='uploadComprovante']")[0].files, function(i, file) {
                  data.append('file', file);
            });
            data.append('_token','{{ csrf_token() }}')
          $.ajax({
            url: '{{route("reserva.uploadComprovante")}}',
           	type: 'POST',
          
	          cache: false,
	          contentType: false,
	          processData: false,
	          data : data,
	          success: function(result){
	          	$(".loading-dot").fadeOut('fast');
	          	if(result.error){
					swal("Atenção!", result.error, "info");
	          	}else{
	             
		            $('.resultado-upload a.arquivo').attr('href','{{URL::to('/')}}/img/comprovantes/'+result.arquivo);
		            $('.resultado-upload a.arquivo').html(result.arquivo);
		             $(".resultado-upload").removeClass('hidden')
		             $(".resultado-upload input[name='comprovante']").val(result.arquivo)
		           
		            
		          }
             }
          } );
      
        });
		$("input[name='cliente[cep]']").keyup(function(){
				var length = $(this).val().length;
				if(length == 9){
					var cep = $("input[name='cliente[cep]']").val();
					cep = cep.replace("-","");
					$.get("https://viacep.com.br/ws/"+cep+"/json/",function(response){
						$("input[name='cliente[endereco]']").val(response.logradouro)
						$("input[name='cliente[bairro]']").val(response.bairro)
						$("input[name='cliente[cidade]']").val(response.localidade)
						$("input[name='cliente[estado]']").val(response.uf)
					})
				}
			})
			$("#btnCep").click(function(){
				var cep = $("input[name='cliente[cep]']").val();
				cep = cep.replace("-","");
				$(".loading-dot").fadeIn('fast');
				$.get("https://viacep.com.br/ws/"+cep+"/json/",function(response){
					$("input[name='cliente[endereco]']").val(response.logradouro)
						$("input[name='cliente[bairro]']").val(response.bairro)
						$("input[name='cliente[cidade]']").val(response.localidade)
						$("input[name='cliente[estado]']").val(response.uf);
						$(".loading-dot").fadeOut('fast');
				})
			});
	$(".btn-reserva").click(function(e){
		e.preventDefault();
		$(".preco").removeClass('active');
		$(this).closest('.preco').addClass('active')
		var dataForm = $(this).closest('form').serialize();
			$("#form").find('input[name="grupo_id"]').val($(this).closest('form').find('input[name="grupo_id"]').val());
		if($(this).closest('form').find('input[name="data_inicio"]').val() == ""){
			
			$('html,body').animate({
				scrollTop:0,
			},500,function(){
				$(".filtro").find('input[name="data_inicio"]').focus()
			})
				
			return false;
		}
		$.post("{{route('site.selectGrupo')}}",dataForm,function(data){
			$("#resultGroup").html(data);
		});
	})
	$('input[name="cliente[tipo]"]').change(function(){
		var val = $(this).val();
		if(val == 'pessoa_fisica'){
			$(".campos_pj").fadeOut('fast');
			$(".campos_pj").find('input').attr('required',false);
		}else{
			$(".campos_pj").fadeIn('fast');
			$(".campos_pj").find('input').attr('required',true);
		}
	})

	$(window).scroll(function(){
		  if ($(window).scrollTop() >= 297) {
		  	var Larg =  $('.menu-lateral').outerWidth();
		  	 $('.menu-lateral').css('width',Larg)
		   //$('.menu-lateral').addClass('fixed');
		   }
		   else {
		  // $('.menu-lateral').removeClass('fixed');
		   }
		});
	function auto_grow(element) {
	    element.style.height = "5px";
	    element.style.height = (element.scrollHeight)+"px";
	}
	$("#formClienteReserva input").change(function(){
		if($("#formClienteReserva").find('input[name="id_cliente"]').val() != ""){
			$("#formClienteReserva").find('button[type="submit"]').fadeIn('fast');
		}
	})
	$("#formClienteReserva").submit(function(e){
		e.preventDefault();
		$(".loading-dot").fadeIn('fast');
			$("#resultGroup input").each(function(i){
				$("#formClienteReserva").append('<input type="hidden" name="'+$(this).attr('name')+'" value="'+$(this).val()+'" />')
			})
			var url = $(this).attr('action'); // the script where you handle the form input.
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $(this).serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                    console.log(data);
                    $(".loading-dot").fadeOut('fast');
                    if(data.status == "ok"){
                    	$("body").find('input[name="id_cliente"]').val(data.cliente);
                    	$("body").find('input[name="id_reserva"]').val(data.reserva);
                    	$("#formClienteReserva").find('button[type="submit"]').fadeOut('fast');
                    	$("#formClienteReserva").find('button[type="submit"]').html('Alualizar');
                    	$("#dadosCondutor").fadeIn('fast');
                    	$('html, body').animate({scrollTop: $('#dadosCondutor').offset().top + 50}, 1000);


                    	identificador = PagSeguroDirectPayment.getSenderHash();
                   		$(".hashPagSeguro").val(identificador);
                   		$("input[name='token_inscricao']").val(data.token_inscricao);

                   		checkPagamento()

                    }else{
                    	alert('erro')
                    }
                    /*
                    if(data.status == "existe"){
                       $(".btn-success").attr('disabled',false);
                       swal("Atenção!", "Título já existe em nossa base de dados", "info");
                    }else{
                      swal("Sucesso!", "Item Salvo com sucesso", "success", {
					  buttons: false,
					  timer: 5000,
					}).then((value) => {
                          window.location = "{{route('admin.configuracoes.index')}}";
                        });;
                      window.location = "{{route('admin.configuracoes.index')}}";
                    }
                    */
            }
        });
	});
	$('input[name="checkCondutor"]').change(function(e){
		if($(this).is(":checked")){
			var nome = $("#formClienteReserva").find('input[name="cliente[nome]"]').val();
			var data_nascimento = $("#formClienteReserva").find('input[name="cliente[data_nascimento]"]').val();
			var cpf = $("#formClienteReserva").find('input[name="cliente[cpf]"]').val();
			var telefone = $("#formClienteReserva").find('input[name="cliente[telefone2]"]').val();
			var cnh = $("#formClienteReserva").find('input[name="cliente[cnh]"]').val();
			var data_cnh = $("#formClienteReserva").find('input[name="cliente[data_cnh]"]').val();
			$("#dadosCondutor").find('input[name="nome"]').val(nome);
			$("#dadosCondutor").find('input[name="data_nascimento"]').val(data_nascimento);
			$("#dadosCondutor").find('input[name="cpf"]').val(cpf);
			$("#dadosCondutor").find('input[name="telefone"]').val(telefone);
			$("#dadosCondutor").find('input[name="cnh"]').val(cnh);
			$("#dadosCondutor").find('input[name="data_cnh"]').val(data_cnh);
		}else{
			$("#dadosCondutor").find('input[name="nome"]').val('');
			$("#dadosCondutor").find('input[name="data_nascimento"]').val('');
			$("#dadosCondutor").find('input[name="cpf"]').val('');
			$("#dadosCondutor").find('input[name="telefone"]').val('');
		}
	})
	function checkPagamento(){
		
			var nome = $("#formClienteReserva").find('input[name="cliente[nome]"]').val();
			var data_nascimento = $("#formClienteReserva").find('input[name="cliente[data_nascimento]"]').val();
			var cpf = $("#formClienteReserva").find('input[name="cliente[cpf]"]').val();

			var telefone = $("#formClienteReserva").find('input[name="cliente[telefone2]"]').val();
			var endereco = $("#formClienteReserva").find('input[name="cliente[endereco]"]').val();
			var numero = $("#formClienteReserva").find('input[name="cliente[numero]"]').val();
			var complemento = $("#formClienteReserva").find('input[name="cliente[complemento]"]').val();
			var bairro = $("#formClienteReserva").find('input[name="cliente[bairro]"]').val();
			var cidade = $("#formClienteReserva").find('input[name="cliente[cidade]"]').val();
			var estado = $("#formClienteReserva").find('input[name="cliente[estado]"]').val();
			var cep = $("#formClienteReserva").find('input[name="cliente[cep]"]').val();
			var email = $("#formClienteReserva").find('input[name="cliente[email]"]').val();
			
			$("#formPagamento").find('input[name="nome_cartao"]').val(nome);
			$("#formPagamento").find('input[name="data_nascimento_pagador"]').val(data_nascimento);
			$("#formPagamento").find('.data_nascimento_pagador').html(data_nascimento);
			$("#formPagamento").find('input[name="cpf_cartao"]').val(cpf);
			$("#formPagamento").find('.cpf_cartao').html(cpf);
			$("#formPagamento").find('input[name="telefone_pagador"]').val(telefone);
			$("#formPagamento").find('input[name="endereco_cartao"]').val(endereco);
			$("#formPagamento").find('input[name="numero_cartao"]').val(numero);
			$("#formPagamento").find('input[name="complemento_cartao"]').val(complemento);
			$("#formPagamento").find('input[name="bairro_cartao"]').val(bairro);
			$("#formPagamento").find('input[name="cidade_cartao"]').val(cidade);
			$("#formPagamento").find('input[name="estado_cartao"]').val(estado);
			$("#formPagamento").find('input[name="cep_cartao"]').val(cep);
			$("#formPagamento").find('input[name="email_pagador"]').val(email);
			$("#camposEndereco").removeClass('hidden');

			if(!$("#resultadoPagamento").hasClass("hidden")){
				$("#resultadoPagamento").addClass("hidden");
				$("#dadosCartao").removeClass('hidden');
			}
	
	};

	$("#formCondutorReserva").submit(function(e){
		e.preventDefault();
		$(".loading-dot").fadeIn('fast');
			var url = $(this).attr('action'); // the script where you handle the form input.
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $(this).serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                    console.log(data);
                    $(".loading-dot").fadeOut('fast');
                    if(data.status == "ok"){
                    	$("#dadosCondutor").find('input[name="id_cliente"]').val(data.cliente);
                    	$("#formCondutorReserva").find('button').fadeOut('fast');
						window.location = "{{route('site.reservaObrigado')}}";
                    	//$("#formPagamento").fadeIn('fast');
                    	//$('html, body').animate({scrollTop: $('#formPagamento').offset().top - 100}, 1000);
                    	
                    }else{
                    	alert('erro')
                    }
				},error:function(data){
					console.log(data);
					$(".loading-dot").fadeOut('fast');
					swal("Opa!", 'Erro com a sua operação, verifique se todos os seus dados são válidos e tente novamente.', "info");
				}
        });
	});
		function numberToReal(numero) {
				var numero = numero.toFixed(2).split('.');
				numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
				return numero.join(',');
			}
			var valorParcelas = "";
			String.prototype.extractNumber = function ()
				{
				    return Number(this.replace(/(?!-)[^0-9.]/g, ""));
				};
				
		$("#cvv---").keyup(function(){

			var length = $(this).val().length;
				if(length == 3){
					$(".loading-dot").fadeIn('fast');
				var numCartao = $("#numCartao").val();
				
				
				var cvvCartao = $("#cvv").val();
				cvvCartao = cvvCartao.replace(" ","");
				var validade = $("#validade").val();
				validade = validade.replace(" ","");
				validade = validade.split("/");

				expiracaoMes = validade[0];
				expiracaoAno = validade[1];
				var bandeira = "";
				console.log(numCartao,cvvCartao,expiracaoMes,expiracaoAno)
				PagSeguroDirectPayment.createCardToken({
					cardNumber: numCartao,
					cvv: cvvCartao,
					expirationMonth: expiracaoMes,
					expirationYear: expiracaoAno,

					success: function(response){ 
						$(".loading-dot").fadeOut('fast');
						console.log('dados', numCartao,cvvCartao,expiracaoMes,expiracaoAno)

						$(".tokenPagamentoCartao").val(response['card']['token']);
					},
					error: function(response){ 
						$(".loading-dot").fadeOut('fast');
						console.log("erro Token: ",response); }
					});
				PagSeguroDirectPayment.getBrand( {
					cardBin: numCartao.substring(0,6),
					success: function(response) {



						bandeira = response['brand']['name'];
					//console.log("aqui");
					//console.log(bandeira);
					$(".img-bandeira").css({"background":"url('https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/"+bandeira+".png')"});

		           	//pega quantidade de parcelas
		           	PagSeguroDirectPayment.getInstallments({
		           		amount: $("input[name='valor_total']").val(),
		           		brand: bandeira,
		           		maxInstallmentNoInterest: 0,
		           		success: function(response) {
				    	//continuar daqui   

				    },
				    error: function(response) {
				    	console.log("Erro: ", response)
				    },
				    complete: function(response) {
				    	valorParcelas = (response.installments[bandeira]);
				    	var html = "";
				    	html += '<option value="">Selecione...</option>';
				    	$.each(response.installments[bandeira], function(index, objNumber) {
				    		html += '<option value="'+objNumber.quantity+'"> '+objNumber.quantity+'x - '+numberToReal(objNumber.installmentAmount)+'</option>';

				    	});
				    	$("#parcelasCartao").html(html);
				    }
					});//final quantidade de parcelas

		           },
		           error: function(response) {

		           }
		       });
}
			});
		
			/*$("#parcelasCartao").change(function(){
				

				var valParcela = valorParcelas[$(this).val()-1].installmentAmount;
				valParcela = valParcela.toFixed(2);
				$("#valorParcelas").val(valParcela)
			});*/

			$("#formPagamento").submit(function(e) {
				e.preventDefault();
				
           // $("#formNewletter .btn-success").attr('disabled',true)
           if($("input[name='paymentMethod']").val() == "transferencia"){
           	var url = "{{route('reserva.pagamentoAvista')}}"; 
           
           	if($('input[name="comprovante"]').val() == ""){
           		//alert('2');
           		// swal("Atenção!", "Comprovante de transferencia Obrigatório", "info");
				   swal({
  title: "Atenção!",
  text: "Comprovante de transferencia Obrigatório, deseja pagar com cartão de crédito?",
  icon: "warning",
  buttons: ['Não, enviar comprovante','Sim'],
  dangerMode: false,
})
.then((willDelete) => {
  if (willDelete) {
   $("a[href='#cartao']").click()
  } 
});
           		return false;
           	}
           }else{
           //	alert('3')
           	var url = "{{route('rede.efeturaPagamento')}}"; 
           }
           $(".loading-dot").fadeIn('fast');
           $("input[name='telefone_pagador']").val($("input[name='cliente[telefone2]']").val());
           $("input[name='email_pagador']").val($("input[name='cliente[email]']").val());
           $.ajax({
           	type: "POST",
           	url: url,
                   data: $("#formPagamento").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                  
                   	console.log(data)
                   		var type = 'success';
                   		var titulo = "Sucesso!"
                   		var icon = "fa fa-check";
                   			$(".loading-dot").fadeOut('fast');
                   	if($("input[name='paymentMethod']").val() == "transferencia"){

                   		if(data.status == "ok"){
                   		$("#formClienteReserva,#formCondutorReserva").fadeOut('fast');
	                   		$("#formPagamento").fadeOut("fast",function(){
	                   		var urlComprovante = "{{route('reserva.comprovante')}}" + "/" + $("input[name='id_reserva']").val();
	                   		$(".imprimirReserva").attr('href',urlComprovante);
	                   			$("#resultadoPagamento").attr('class','');
	                   			$("#resultadoPagamento i").attr('class','');
		                   		$("#resultadoPagamento").addClass(type);
		                   		$("#resultadoPagamento h2").html(titulo);
		                   		$("#resultadoPagamento i").addClass(icon);
		                   		$("#resultadoPagamento p").html(data.statusDescricao);
		                   		$("#resultadoPagamento").fadeIn("fast");	
		                   		$('html, body').animate({scrollTop: $('.progresso').offset().top - 100}, 1000);
	                   		});
                   		}
                   	}else{
                   		
                   		
                   		if (data.statusCode != '0'){

                   				swal("Opa!", 'Erro com a sua operação ' +data.statusDescricao, "info");
                   			
                   		}else{
                   			$(".imprimirReserva").removeClass("hidden")
                   		
                   		var urlComprovante = "{{route('reserva.comprovante')}}" + "/" + $("input[name='id_reserva']").val();
                   		$(".imprimirReserva").attr('href',urlComprovante);
                   		$("#resultadoPagamento").attr('class','');
                   		$("#resultadoPagamento").addClass(type);
                   		$("#resultadoPagamento h2").html(titulo);
                   		$("#resultadoPagamento i").attr('class','');
                   		
                   		$("#resultadoPagamento i").addClass(icon);
                   		
                   		$("#resultadoPagamento p").html(data.statusDescricao);
                   		
                   		
                   		$("#formClienteReserva,#formCondutorReserva,#formPagamento").fadeOut('fast');
                   		$("#cartaoLoading").fadeOut("fast",function(){
                   			$("#resultadoPagamento").fadeIn("fast");

                   			$('html, body').animate({scrollTop: $('.progresso').offset().top - 100}, 1000);
                   		});
                   		}
				
					}

                   /*	if(data.status == "enviado"){
                   		swal("Sucesso!", "Formulário enviado com sucesso, em breve entraremos em contato com você.", "success");
                   	}else{
                   		swal("Opa!", data.status, "info");
                   	}*/
                   },
                   error: function(data) {
                   		$(".loading-dot").fadeOut('fast');
                   			swal("Opa!", 'Estamos com problemas em nossos servidores, por favor entrar em contato nos meios abaixo para concluir sua reserva', "info");
                        var errors = data.responseJSON; // An array with all errors.
                    },
                    statusCode: {
				      500:function(){
				      	if($("input[name='paymentMethod']").val() == "transferencia"){
				           	var url = "{{route('pagseguro.pagamento.boleto')}}"; 
				           	swal("Opa!", 'Estamos com problemas em nossos servidores, por favor entrar em contato nos meios abaixo para concluir sua reserva', "info");
				           }else{
				           	var url = "{{route('pagseguro.pagamento.cartao')}}"; 
				           	$("#dadosCartao").removeClass("hidden");
				           	$("#cartaoLoading").fadeOut("fast");
				           	swal("Opa!", "Não conseguimos concluir a operação, verifique seus dados e tente novamente", "info");
				           }
				      	
				      /* if($("input[name='paymentMethod']").val() == "boleto"){
				       	var targetResultado = 'resultadoBoleto';
				       	var targetLoadingResultado = 'boletoLoading';
				       }else{
				       	var targetResultado = 'resultadoPagamento';
				       	var targetLoadingResultado = 'cartaoLoading';
				       }
                   		type = 'info';
                   		titulo = 'Atenção';
                   		icon = "fa-exclamation-circle";	
                   		
                   		$("#"+targetResultado).addClass(type);
                   		$("#"+targetResultado +" h2").html(titulo);
                   		$("#"+targetResultado+" i").addClass(icon);
                   		
                   		$("#"+targetResultado+" p").html("Infelizemente não conseguimos concluir sua operação, entre em contato conosco nos meios abaixo.");
                   		*/
                   		/*$("#"+targetLoadingResultado).fadeOut("fast",function(){
                   			$("#"+targetResultado).fadeIn("fast");
                   		});*/
				       }
				     }
                });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
		$('.collapse').on('shown.bs.collapse', function () {
		
			var tipo = $(this).data('tipo');
			
			$('input[name="paymentMethod"]').val(tipo);
			if(tipo == "transferencia"){
				$("#dadosCartaoCalcao input").attr(required,true);
				$("#dadosCartao input").removeAttr('required');
			
			}
		});
		$("#iconReserva").click(function(e){
			e.preventDefault();
			
			if($("#resultGroup").hasClass("open")){
				$("#resultGroup").animate({
					right:'-100%'
				},function(){
					$(this).removeClass('open');
					$("body").removeAttr('style')
				})
			}else{
				$(".loading-dot").fadeIn('fast');
				$("#resultGroup").animate({
					right:'0'
				},function(){
					$(this).addClass('open');
					$("body").css('overflow-y','hidden');
					$(".loading-dot").fadeOut('fast');
				})
			}
		})
    
    
      
    
</script>

@endsection