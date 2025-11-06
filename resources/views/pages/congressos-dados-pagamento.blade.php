@extends('templates.site')
@section('pre-assets')
<style>
.swal2-popup  {
	font-size: 1.5rem !important;
}
.loading {
	/* position: absolute; */
	width: 100%;
	text-align: center;
	height: 100%;
	margin-top: 60px;
	display: none;
}
#resultadoBoleto{
	text-align: center;
}
#resultadoBoleto .fa-check{
	font-size: 5em;
	color: green;
	text-shadow: 9px 11px 18px rgba(125, 125, 125, 0.45098039215686275);
}
#resultadoBoleto h2{
	color: green;
}
#resultadoCartao{
	text-align: center;
	margin-top: 40px;
}
#resultadoCartao.success .fa{
	font-size: 5em;
	color: green;
	text-shadow: 9px 11px 18px rgba(125, 125, 125, 0.45098039215686275);
}
#resultadoCartao.info .fa{
	font-size: 5em;
	color: #2da0c7;
	text-shadow: 9px 11px 18px rgba(125, 125, 125, 0.45098039215686275);
}
#resultadoCartao.success h2{
	color: green;
}
#resultadoCartao.info h2{
	color: #2da0c7;
}


</style>
@endsection
@section('content')
<div class="row">
	<div class="col-sm-12">

		<h2>Formulário de Inscrição</h2>
	</div>
	<div id="passos-formulario">
		<div class="passo ">
			<span class="number ">1</span>
			<h3>DADOS DOS PARTICIPANTES</h3>
		</div>
		<div class="passo active">
			<span class="number ">2</span>
			<h3>DADOS DE PAGAMENTO</h3>
		</div>
		<div class="passo">
			<span class="number ">3</span>
			<h3>PAGAMENTO</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-sm-10 col-sm-offset-1 p-all-0 m-top-lg">
		{!!Form::open(['route'=>'inscricao.dados-pagamento.store','id'=>'dados-formulario', 'class'=>''])!!}
		<input type="hidden" name="id" id="id" value="">
		<input type="hidden" name="token_pagseguro" id="token_pagseguro" value="">
		
		<div class="col-sm-12 p-all-0">
			<div class="form-group col-sm-4">
				<label for="">Usar dados participante:</label>
				<select class="form-control btn-flat" id="idFaturamento" >
					<option value="">Selecione...</option>
					@foreach($inscricoes as $inscricao)
					<option value="{{$inscricao->id}}">{{$inscricao->nome}}</option>
					@endforeach

				</select>
			</div>
			<div class="form-group col-sm-4">
				<label for="">Nome</label>
				<input type="text" name="nome" id="nome" required="" class="form-control btn-flat">
			</div>
			<div class="form-group col-sm-4 ">
				<label for="">E-mail</label>
				<input type="email" name="email" id="email" required="" class="form-control btn-flat" >
			</div>
			<div class="form-group col-sm-4">
				<label for="">Telefone</label>
				<input type="text" name="telefone" id="telefone" required="" class="form-control btn-flat masktel" >
			</div>
			<div class="form-group col-sm-4">
				<label for="">CPF</label>
				<input type="text" name="cpf" id="cpf" required="" class="form-control btn-flat cpfMask">
			</div>


			<div class="form-group col-sm-4">
				<label for="">Data Nascimento</label>
				<input type="text" name="data_nascimento" class="form-control btn-flat dataMask" required="" id="data_nascimento">
			</div>


			<div class="form-group col-sm-2 ">
				<label for="">Sexo</label><br>
				<select class="form-control btn-flat" required="" name="sexo" id="sexo">
					<option value="">Selecione</option>
					<option value="M">Masculino</option>
					<option value="F">Feminino</option>
				</select>
			</div>






			<div class="form-group col-sm-2">
				<label for="">Cep</label>
				<input type="text" class="form-control btn-flat cepMask" required id="cep" name="cep">
			</div>


			<div class="form-group col-sm-3">
				<label for="">Endereço</label>
				<input type="text" disabled="" class="form-control btn-flat" id="endereco" required  name="endereco">
			</div>


			<div class="form-group col-sm-2 ">
				<label for="">Número</label>
				<input type="number" disabled="" class="form-control btn-flat" id="numero" required name="numero">
			</div>


			<div class="form-group col-sm-3">
				<label for="">Complemento</label>
				<input type="text" disabled="" class="form-control btn-flat" id="complemento"  name="complemento">
			</div>


			<div class="form-group col-sm-4">
				<label for="">Bairro</label>
				<input type="text" disabled="" class="form-control btn-flat" id="bairro" required  name="bairro">
			</div>


			<div class="form-group col-sm-4">
				<label for="">Cidade</label>
				<input type="text" disabled="" class="form-control btn-flat" id="cidade" required name="cidade">
			</div>


			<div class="form-group col-sm-2">
				<label for="">Estado</label>
				<input type="text" disabled="" class="form-control btn-flat" id="estado" required  name="estado">
			</div>


			<div class="form-group col-sm-2">
				<label for="">País</label>
				<input type="text" disabled="" class="form-control btn-flat" id="pais" required  name="pais">
			</div>

		</div>
		<hr class="m-top-lg col-sm-12 p-all-0">
		<div class="col-sm-12">

			
			<ul id="lista-participantes">
				<?php $valorTotal = ''; $valorCongresso = '';  ?>

				@foreach($inscricoes as $inscricao)

				<?php 
					$valorTotal += $inscricao->valor_inscricao;
				 ?>

				<li class="col-sm-12">
					<div class="dados col-sm-8">
						<i class="fa fa-ticket" aria-hidden="true"></i> 
						{{$inscricao->nome}}
						<div class="email-participante">
							{{$inscricao->cpf}} | {{$inscricao->email}} | {{$inscricao->telefone}}
						</div>
					</div>
					<div class="valor col-sm-4">
						R$ {{number_format($inscricao->valor_inscricao,2,",",".")}}
					</div>
				</li>
				@endforeach
				
				@if(@$anuidade)
				@foreach($anuidade as $val)
					
					<?php $valorTotal += $val['valor_anuidade']; ?>
					
					<li class="col-sm-12">
					<div class="dados col-sm-8">
						<i class="fa fa-money" aria-hidden="true"></i>
						{{@$val['name']}}<br>
						Anuidade - Associação Brasileira de Pesquisa Biblica
						
					</div>
					<div class="valor col-sm-4">
						R$ {{number_format(@$val['valor_anuidade'],2,",",".")}}
					</div>
				</li>
				@endforeach
@endif
			</ul>
			<div class="col-sm-6 p-all-md">
				<small>As Taxas e juros de parcelamento serão aplicadas no próximo passo.</small>
			</div>
			<div id="total" class="col-sm-6">
				TOTAL R$ {{number_format($valorTotal,2,",",".")}}
				<input type="hidden" name="valor_total" value="{{number_format($valorTotal,2,'.','')}}">
			</div>


		</div>
		<div class="col-sm-10 col-sm-offset-2">
<input type="hidden" name="valor_congresso" id="valor" value="{{$inscricoes[0]['congresso']['valor']}}">
			<button type="submit" class="btn btn-primary  btn-flat col-sm-3 pull-right" id="btAvancar">Avançar</button>
		</div>
		{!!Form::close()!!}
	</div>

</div>
<form action="" id="formPagamento" class="hidden">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<input type="hidden" name="hash" class="hashPagSeguro">
<input type="hidden" name="token_inscricao" value="{{$inscricao->token_pagseguro}}">
<input type="hidden" id="telefone_pagador" name="telefone_pagador" >
<input type="hidden" id="email_pagador" name="email_pagador" >
<input type="hidden" name="data_nascimento_pagador" id="data_nascimento_pagador">
<input type="hidden" name="paymentMethod" value="">
<div class="col-sm-10 col-sm-offset-1 p-all-0 m-top-lg">		
	<div class="panel-group" id="opcoesPagamento" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default btn-flat">
			<div class="panel-heading" data-pagamento="boleto" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#opcoesPagamento" href="#collapseBoleto" aria-expanded="true" aria-controls="collapseBoleto">
						Boleto Bancário
					</a>
				</h4>
			</div>
			<div id="collapseBoleto" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					<button type="submit" id="btnBoleto" class="btn btn-success btn-border-radius m-top-xs">GERAR BOLETO</button>

					<div class="loading" id="boletoLoading">
						<img src="{{asset('min/img/loading.gif')}}" alt=""> 
						<h4>AGUARDE</h4>
						<h3>GERANDO BOLETO</h3>
					</div>
					<div id="resultadoBoleto" style="display: none">
						<i class="fa fa-check" aria-hidden="true"></i>
						<h2>SUCESSO!</h2>
						<p>Clique No botão abaixo para imprimir o boleto</p>
						<a href="" target="_blank" class=" btn btn-default m-top-xs btn-lg"><i class="fa fa-barcode" aria-hidden="true" style="font-size: 2.5em"></i><div class="" style="display: inline-block;line-height: 2.5em;vertical-align: top;margin-left: 15px; text-transform: uppercase;    font-weight: 300;">Visualizar Boleto</div></a>
					</div>

				</div>
			</div>
		</div>


		<div class="panel panel-default btn-flat">
			<div class="panel-heading" data-pagamento="cartao"  role="tab" id="headingTwo">
				<h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#opcoesPagamento" href="#collapseCartao" aria-expanded="false" aria-controls="collapseCartao">
						Cartão de Crédito
					</a>
				</h4>
			</div>
			<div id="collapseCartao" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				<div class="panel-body">
						
					<div class="col-sm-6  p-all-0 "><!-- cartão de crédito -->

					

						<div id="dadosCartao">
							<input type="hidden" name="tokenPagamentoCartao" class="tokenPagamentoCartao">
							<input type="hidden" name="bandeira" class="bandeira">
							<div class="col-sm-6 col-xs-12  m-top-sm">
								<label for="">Nome (impresso no cartão)  *</label>
								<input type="text" name="nome_cartao" id="nome_cartao" class="form-control btn-flat">
							</div>
							<div class="col-sm-6 col-xs-12 m-top-sm ">
								<label for="">CPF Titular Cartão  *</label>
								<input type="text" name="cpf_cartao" id="cpf_cartao" class="form-control btn-flat">
							</div>
							<div class="col-sm-6 col-xs-12 m-top-sm" style="position: relative;">
								<label for="">Número do Cartão </label>

								<input type="text"  id="numCartao" name="numero" placeholder=""  class="form-control btn-flat numeroCardMask">

								<div class="img-bandeira col-sm-4" style=" position: absolute; right: 28px;
								bottom: 7px; width: 42px; height: 20px;    " ></div>
							</div>

							<div class="col-sm-6 col-xs-12 m-top-sm">
								<label for="">Validade</label>
								<input type="text" name="validade" id="validade" placeholder="00/0000" class="form-control btn-flat validadeMask">
							</div>
							<div class="col-sm-6 col-xs-12 m-top-sm">
								<label for="">CVV</label>
								<input type="text" name="cvv" id="cvv" class="form-control btn-flat">
							</div>

							<div class="col-sm-6 col-xs-12  m-top-sm">
								<label for="">Parcelas</label>
								<select name="parcelasCartao" id="parcelasCartao" class="form-control btn-flat">
									<option value=""> Aguardando dados do Cartão</option>
								</select>
								<input type="hidden" name="valorParcelas" id="valorParcelas">
							</div>

							<div class="col-sm-12 m-top-lg">
								<h4>Endereço Cartão</h4>
								<address class="bg-cinza"></address>
								<a href="" class="btnMudarEnderecoCartao" >Mudar endereço</a>
							</div>


							<div class="clear"></div>
							<div id="camposEndereco" style="display: none">
								<div class="col-sm-6 col-xs-12  m-top-sm">
									<label for="">CEP</label>
									<div class="input-group">
										<input type="text" id="cep_cartao" name="cep_cartao"  class="form-control btn-flat cepMask" placeholder="">
										<span class="input-group-btn">
											<button id="btnBuscaCep" class="btn btn-primary btn-flat" type="button"><i class="fa fa-search"></i></button>
										</span>
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
								<div class="clear"></div>
								<div class="col-sm-8 col-xs-12 m-top-sm">
									<label for="">Endereço</label>
									<input type="text" id="endereco_cartao" name="endereco_cartao" class="form-control btn-flat">
								</div>
								<div class="col-sm-4 col-xs-12 m-top-sm">
									<label for="">Número</label>
									<input type="text" id="numero_cartao" name="numero_cartao" class="form-control btn-flat">
								</div>
								<div class="col-sm-6 col-xs-12 m-top-sm">
									<label for="">Complemento</label>
									<input type="text" id="complemento_cartao" name="complemento_cartao" class="form-control btn-flat">
								</div>
								<div class="col-sm-6 col-xs-12 m-top-sm">
									<label for="">Bairro</label>
									<input type="text" id="bairro_cartao" name="bairro_cartao" class="form-control btn-flat">
								</div>
								<div class="col-sm-6 col-xs-12 m-top-sm">
									<label for="">Cidade</label>
									<input type="text" id="cidade_cartao" name="cidade_cartao" class="form-control btn-flat">
								</div>
								<div class="col-sm-6 col-xs-12 m-top-sm">
									<label for="">Estado</label>
									<input type="text" id="estado_cartao" name="estado_cartao" class="form-control btn-flat">
								</div>
							</div>
							<div class="clear"></div>
							<div class="col-sm-4 p-top-md ">
								<button type="submit" id="btnCartao" class="btn btn-success btn-block btn-flat m-top-xs">PAGAR</button>
							</div>
						</div>
						
					</div>
					<div class="col-sm-12">
						<div class="loading" id="cartaoLoading">
							<img src="{{asset('min/img/loading.gif')}}" alt=""> 
							<h4>AGUARDE</h4>
							<h3>SOLICITANDO LIBERAÇÃO</h3>
						</div>
						<div id="resultadoCartao" class="success" style="display: none">
						
							<i class="fa fa-check" aria-hidden="true"></i>
							<h2>Sucesso!</h2>
							<p>A transação foi realizada com sucesso.</p>

						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
</form>
<input type="hidden" id="teste">
@endsection

@section('pos-script')

<script type="text/javascript" src="{{env('PAGSEGURO_URL_SESSAO')}}"></script> 
<script>
	$(document).ready(function(){

		
		$(".validadeMask").mask('00/0000',  {clearIfNotMatch: true,placeholder: "00/0000"})
		$(".numeroCardMask").mask('0000000000000000',  {clearIfNotMatch: true,placeholder: ""})
		$.ajax({
			url : "{{route('pagseguro.inicia.sessao')}}",
			type : 'get',
			dataTyp : 'json',
			async : false,
			timeout: 20000,
			success: function(response){
				//alert("teste")
				//console.log("Inicia Sessão " ,data)
				$("#teste").val(response)
			 	PagSeguroDirectPayment.setSessionId(response);

				
			},
			erro:function(data){
				//console.log(data)
			}
		});




		$(".btnMudarEnderecoCartao").click(function(e){
			e.preventDefault();
			$("#endereco_cartao").val('');
				$("#numero_cartao").val('');
				$("#complemento_cartao").val('');
				$("#bairro_cartao").val('');
				$("#cidade_cartao").val('');
				$("#estado_cartao").val('');
			$("address").slideToggle('fast');
			$("#camposEndereco").slideToggle('fast');


		})
		$('#opcoesPagamento').on('shown.bs.collapse', function () {
			$('.in').siblings().addClass("check")

			$("input[name='paymentMethod']").val($(".check").data('pagamento'))
		})
		$('#opcoesPagamento').on('hide.bs.collapse', function () {
			$(".panel-heading").removeClass("check")

		})
	
		$("#idFaturamento").change(function(){
			var url = '{{route("inscricao.dados-participante")}}';
			$.post('{{route("inscricao.dados-participante")}}',{'id':$(this).val(),"_token": "{{ csrf_token() }}",},function(data){
				
				$("#endereco,#numero,#complemento,#bairro,#cidade,#estado,#pais").attr('disabled',false);
				$("#id").val(data.id)
				$("#nome,#nome_cartao").val(data.nome)
				$("#email,#email_pagador").val(data.email)
				$("#telefone").val(data.telefone_celular)
				$("#cpf,#cpf_cartao").val(data.cpf)
				$("#token_pagseguro").val(data.token_pagseguro)
				$("#valor").val(data.congresso.valor)
				$("#cep,#cep_cartao").val(data.cep);	
				$("#endereco,#endereco_cartao").val(data.endereco);
				$("#numero,#numero_cartao").val(data.numero);
				$("#complemento,#complemento_cartao").val(data.complemento);
				$("#bairro,#bairro_cartao").val(data.bairro);
				$("#cidade,#cidade_cartao").val(data.cidade);
				$("#estado,#estado_cartao").val(data.estado);
				$("#pais").val(data.pais);
				$("#telefone_pagador").val(data.telefone_celular);
				$("address").html('<strong>'+
					'CEP: '+data.cep+'<br>'+
					data.endereco +','+data.numero+'<br>'+
					data.cidade +','+data.estado+'<br>'+
					data.pais +'</strong>');

				
			})
		});

		$("#dados-formulario").submit(function(e) {
			e.preventDefault();
           $.ajax({
           	type: "POST",
           	url: $(this).attr("action"),
                   data: $("#dados-formulario").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                   	console.log(data)
                   	if(data == "ok"){

                   		$("#nome_cartao").val($("#nome").val())
						$("#email_pagador").val($("#email").val())
						$("#telefone_pagador").val($("#telefone").val())
						$("#cpf_cartao").val($("#cpf").val())
						
						
						$("#cep_cartao").val($("#cep").val());	
						$("#endereco_cartao").val($("#endereco").val());
						$("#numero_cartao").val($("#numero").val());
						$("#complemento_cartao").val($("#complemento").val());
						$("#bairro_cartao").val($("#bairro").val());
						$("#cidade_cartao").val($("#cidade").val());
						$("#estado_cartao").val($("#estado").val());
						$("#data_nascimento_pagador").val($("#data_nascimento").val());
						
						$("address").html('<strong>'+
							'CEP: '+$("#cep").val()+'<br>'+
							$("#endereco").val() +','+$("#numero").val()+'<br>'+
							$("#complemento").val() +' - '+$("#bairro").val()+'<br>'+
							$("#cidade").val() +','+$("#estado").val()+'<br>'+
							$("#pais").val()+'</strong>');


                   		$(".passo").removeClass("active")
                   		$(".passo").eq(2).addClass("active")
                   		$("#formPagamento").removeClass("hidden");

                   		identificador = PagSeguroDirectPayment.getSenderHash();
						console.log('identificador',identificador)
                   		$(".hashPagSeguro").val(identificador);


                   		
                   	}

                   },
                   error: function(data) {
                   	console.log(data);
                        var errors = data.responseJSON; // An array with all errors.
                    }
                });

            e.preventDefault(); // avoid to execute the actual submit of the form.
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




		


		



		$("#formPagamento").submit(function(e) {
			e.preventDefault();

           // $("#formNewletter .btn-success").attr('disabled',true)
           if($("input[name='paymentMethod']").val() == "boleto"){
           	var url = "{{route('pagseguro.pagamento.boleto')}}"; 
           	$("#btnBoleto").addClass("hidden");
           	$("#boletoLoading").fadeIn("fast");
           }else{
           	var url = "{{route('pagseguro.pagamento.cartao')}}"; 
           	$("#dadosCartao").fadeOut("fast",function(){
           			$("#cartaoLoading").fadeIn("fast");
           	});
           
           }
           if($(".info").is(":visible")){
           	$(".info").fadeOut("fast");
           }
           $.ajax({
           	type: "POST",
           	url: url,
                   data: $("#formPagamento").serialize(), // serializes the form's elements.
                   success: function(data){
                   	if($("input[name='paymentMethod']").val() == "boleto"){
                   		if (data.statusCode == '1'){
                   			$("#boletoLoading").fadeOut("fast",function(){
		                   		$("#resultadoBoleto a").attr("href",data.paymentLink[0]);
		                   		$("#resultadoBoleto").fadeIn("fast")
		                   	});
		                   	 $("#dados-formulario").fadeOut('fast')
                   		}else{
                   			$("#btAvancar").html('Atualizar')
                   			swal("Opa!", "Não conseguimos concluir a operação, verifique seus dados são validos e tente novamente"+"\n"+data.statusDescricao, "info");
                   			$("#btnBoleto").removeClass("hidden");
           					$("#boletoLoading").fadeOut("fast");
                   		}
                   	}
                   	if($("input[name='paymentMethod']").val() == "cartao"){
                   		if (data.statusCode == '3'){
                   			

			               	$("#cartaoLoading").fadeOut("fast",function(){
			              		$("#resultadoCartao").fadeIn("fast");
			                });
			                $("#dados-formulario").fadeOut('fast')


                   		}else{
                   			$("#cartaoLoading").fadeOut("fast",function(){
				           			$("#dadosCartao").fadeIn("fast");
				           	});

                   			swal("Opa!", data.statusDescricao+"\n" + " <p>Aguarde um periodo de 1h e caso não receba nenhuma confirmação de pagamento entre em contato nos meios de Suporte abaixo.</p>", "info");	
                   		}


                   	}



                   		/*console.log(data)
						var type = 'success';
                   		var titulo = "Sucesso!"
                   		var icon = "fa-check";

                   		if (data.statusCode != '3' && $("input[name='paymentMethod']").val() != "boleto"){
                   			type = 'info';
                   			titulo = 'Atenção';
                   			icon = "fa fa-exclamation-circle";	
                   			

                   		}else if(data.statusCode == '1' && $("input[name='paymentMethod']").val() == "boleto"){
                   				$("#boletoLoading").fadeOut("fast",function(){
		                   				$("#resultadoBoleto a").attr("href",data.paymentLink[0]);
		                   				$("#resultadoBoleto").fadeIn("fast")
		                   		});
                   			if($("input[name='paymentMethod']").val() == "boleto" && data.statusCode != "1"){
                   				$("#btAvancar").html('Atualizar')
                   				swal("Opa!", "Não conseguimos concluir a operação, verifique seus dados são validos e tente novamente"+"\n"+data.statusDescricao, "info");
                   					$("#btnBoleto").removeClass("hidden");
           							$("#boletoLoading").fadeOut("fast");
                   			}
                   		}else{
                   			var type = 'success';
	                   		var titulo = "Sucesso!"
	                   		var icon = "fa fa-check";

                   			$("#resultadoCartao").parent().removeClass('col-sm-6').addClass('col-sm-12')
                   			$("#dadosCartao").slideUp("slow");


                   				if($("input[name='paymentMethod']").val() == "boleto"){
		                   			
			                   	}else{
			                   		$("#resultadoCartao").removeClass().addClass(type);
			                   		$("#resultadoCartao h2").html(titulo);
			                   		$("#resultadoCartao i").removeClass().addClass(icon);

			                   		$("#resultadoCartao p").html(data.statusDescricao);

			                   		$("#cartaoLoading").fadeOut("fast",function(){
			                   			$("#resultadoCartao").fadeIn("fast");
			                   		});
								}


                   		}
                   */
						
                   },error: function(data) {
                   	console.log(data);
                        var errors = data.responseJSON; // An array with all errors.
                    }
                });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });

		function numberToReal(numero) {
			var numero = numero.toFixed(2).split('.');
			numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
			return numero.join(',');
		}
		var valorParcelas = "";
		$("#cvv").keyup(function(){


			var numCartao = $("#numCartao").val();
			numCartao = numCartao.replace(" ","");
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
					$(".tokenPagamentoCartao").val(response['card']['token']);
				},
				error: function(response){ 
					console.log("erro Token: ",response); 
				}
				});

			PagSeguroDirectPayment.getBrand({
				cardBin: numCartao.substring(0,6),
				success: function(response) {

				console.log('getBrand',response)

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
				    	console.log(response);
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

		});
		
	});
</script>
@endsection