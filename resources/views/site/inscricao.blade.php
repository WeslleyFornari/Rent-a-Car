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
.loadingPage{
	position: fixed;;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	line-height: 100vh;
	vertical-align: middle;
	text-align: center;
	z-index: 999999;
	background: rgba(255,255,255,0.5);
	display: none;
}
.loadingPage img{
	width: 100px;
	height: auto;
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
<div class="loadingPage">
	<img src="{{asset('min/img/loading-page.gif')}}" alt="">
</div>
<div class="container-fluid">
	

	<h2 class="m-bottom-lg">FORMULÁRIO DE INSCRIÇÃO</h2>
	<div class="col-sm-8 col-xs-12 p-all-0">
		<h5>DADOS PESSOAIS</h5>
		<div class="panel-inscricao p-all-sm ">
			<form action="" id="alunosInscricao">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id_curso" value="{{$curso->id}}">
				<input type="hidden" name="id_edicao" value="{{$id_edicao}}">
				
				<ul class="lista-inscrito">
					@for ($i = 1; $i <= $qtd_inscricao; $i++)
					<li id="participante_{{$i}}">
						<h4 class="participante">Participante {{$i}}</h4>
						<div class="col-sm-4">
							<label for="">Nome Completo</label>
							<input type="text" required="" name="aluno[nome_aluno][]" class="form-control btn-border-radius">
						</div>
						<div class="col-sm-4 m-bottom-xs">
							<label for="">CPF</label>
							<input type="text" required="" name="aluno[cpf_aluno][]" class="form-control btn-border-radius cpfMask">
						</div>
						<div class="col-sm-4 m-bottom-xs">
							<label for="">Data Nascimento</label>
							<input type="text" required="" name="aluno[data_nascimento][]" class="form-control btn-border-radius dataMask">
						</div>
						<div class="col-sm-4 m-bottom-xs">
							<label for="">Sexo</label>
							<select name="aluno[sexo_aluno][]"  required="" class="form-control btn-border-radius sexo_aluno">
								<option value="">Selecione</option>
								<option value="M">Masculino</option>
								<option value="F">Feminino</option>
							</select>
						</div>
						<div class="col-sm-4 m-bottom-xs">
							<label for="">E-mail</label>
							<input type="email" required="" name="aluno[email_aluno][]" class="form-control btn-border-radius">
						</div>
						<div class="col-sm-4 m-bottom-xs">
							<label for="">Telefone</label>
							<input type="text" required="" name="aluno[tel_celular_aluno][]" class="form-control btn-border-radius telMask">
						</div>
					</li>
					@endfor
				</ul>
				<div class="col-xs-12 col-sm-12">
				<button type="button" id="btAvancar" class="btn btn-border-radius btn-success col-xs-12 col-sm-3 pull-right">Avançar </button>
				</div>
			</form>
		</div>

		<div class="clearfix m-bottom-lg"></div>
		<div id="dadosPagamento" class="hidden">
			<h5>PAGAMENTO</h5>
			<div class="col-sm-5 p-all-0">
				<label for="" >Copiar dados do participante acima </label><br>
				<select  class="form-control btn-border-radius copiarDados">
					<option value="">Selecione...</option>
					<option value="outro">Informar dados pagador</option>
					@for ($i = 1; $i <= $qtd_inscricao; $i++)
					<option value="participante_{{$i}}">Participante {{$i}}</option>
					@endfor

				</select>
			</div>
		</div>
		<form action="" id="formPagamento">
			<div id="dadosPagadorDiferente" class="hidden">
				
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="paymentMethod" class="paymentMethod" value="boleto">
				<input type="hidden" name="hash" class="hashPagSeguro">
				<input type="hidden" name="token_inscricao" class="">
				
				<input type="hidden" name="valor_total" value="{{number_format($curso->valor_total,2,'.','')}}">
				<input type="hidden" name="valor_curso" value="{{number_format($curso->valor_curso,2,'.','')}}">
				<input type="hidden" name="valor_avista" value="{{number_format($curso->valor_avista,2,'.','')}}">

				<div id="pagadorDiferente" class="col-sm-12 p-all-0">
					<h5>DADOS PAGADOR</h5>
					<div class="panel-inscricao p-all-sm ">
						<div class="col-sm-4 m-bottom-sm">
							<label for="">Nome Completo</label>
							<input type="text" required="" name="nome_pagador" class="form-control btn-border-radius">
						</div>
						<div class="col-sm-4 m-bottom-sm">
							<label for="">CPF/CNPJ</label>
							<input type="text" required="" name="doc_pagador" class="form-control btn-border-radius cpfOuCnpj">
						</div>
						<div class="col-sm-4 m-bottom-sm">
							<label for="">Data Nascimento</label>
							<input type="text" required="" name="data_nascimento_pagador" class="form-control btn-border-radius dataMask">
						</div>

						<div class="col-sm-4 m-bottom-xs">
							<label for="">Sexo</label>
							<select name="sexo_pagador" required="" class="form-control btn-border-radius sexo_pagador" >
								<option value="">Selecione</option>
								<option value="M">Masculino</option>
								<option value="F">Feminino</option>
							</select>
						</div>
						<div class="col-sm-4 m-bottom-sm">
							<label for="">E-mail</label>
							<input type="email" required="" name="email_pagador" class="form-control btn-border-radius">
						</div>
						<div class="col-sm-4 m-bottom-sm">
							<label for="">Telefone</label>
							<input type="text" required="" name="telefone_pagador" class="form-control btn-border-radius telMask">
						</div>
						<div class="clearfix"></div>
						<button type="button" id="btAvancarPagamento" class="btn btn-border-radius btn-success col-xs-12 col-sm-3 pull-right">Avançar </button>

					</div>

				</div>					
				
			</div>
			<div id="formaPagamento" class="hidden">
				<div class="panel-inscricao p-all-0 m-top-md">
					<div class="bhoechie-tab-container">
						<div class="bhoechie-tab-menu">
							<div class="list-group" id="tabTypePagamento">
								<a href="#" class="list-group-item active text-center" data-target="boleto">
									<i class="fa fa-barcode" aria-hidden="true"></i>
									<br/>BOLETO
								</a>
								<a href="#" class="list-group-item  text-center" data-target="cartao">
									<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
									<br/>CARTÃO DE CRÉDITO
								</a>
							</div>
						</div>
						<div class="bhoechie-tab">
							<!-- flight section -->
							<div class="bhoechie-tab-content active">
								<div class="col-sm-12 p-top-md">
									<button type="submit" id="btnBoleto" class="btn btn-success btn-border-radius m-top-xs">FINALIZAR PEDIDO</button>

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
							<!-- train section -->
							<div class="bhoechie-tab-content "> <!-- cartão de crédito -->
								<div class="loading" id="cartaoLoading">
									<img src="{{asset('min/img/loading.gif')}}" alt=""> 
									<h4>AGUARDE</h4>
									<h3>SOLICITANDO LIBERAÇÃO</h3>
								</div>
								<div id="dadosCartao">
									<input type="hidden" name="tokenPagamentoCartao" class="tokenPagamentoCartao">
									<input type="hidden" name="bandeira" class="bandeira">
									<div class="col-sm-6 col-xs-12  m-top-sm">
										<label for="">Nome (impresso no cartão)  *</label>
										<input type="text" name="nome_cartao" class="form-control btn-border-radius">
									</div>
									<div class="col-sm-6 col-xs-12 m-top-sm ">
										<label for="">CPF Titular Cartão  *</label>
										<input type="text" name="cpf_cartao" class="form-control btn-border-radius cpfMask">
									</div>
									<div class="col-sm-6 col-xs-12 m-top-sm" style="position: relative;">
										<label for="">Número do Cartão</label>
										
										<input type="text"  id="numCartao" name="numero" maxlength="16" class="form-control btn-border-radius">
										
										<div class="img-bandeira col-sm-4" style=" position: absolute; right: 28px;
										bottom: 7px; width: 42px; height: 20px;    " ></div>
									</div>
									
									<div class="col-sm-6 col-xs-12 m-top-sm">
										<label for="">Validade</label>
										<input type="text" name="validade" id="validade" class="form-control btn-border-radius validadeMask">
									</div>
									<div class="col-sm-6 col-xs-12 m-top-sm">
										<label for="">CVV</label>
										<input type="text" name="cvv" id="cvv" disabled="" class="form-control btn-border-radius">
									</div>

									<div class="col-sm-6 col-xs-12  m-top-sm">
										<label for="">Parcelas</label>
										<select name="parcelasCartao" id="parcelasCartao" class="form-control btn-border-radius">
											<option value=""> Aguardando dados do Cartão</option>
										</select>
										<input type="hidden" name="valorParcelas" id="valorParcelas">
									</div>
									<div class="clear"></div>
									<div class="col-sm-6 col-xs-12  m-top-sm">
										<label for="">CEP</label>
										<div class="input-group">
											<input type="text" id="cep_cartao" name="cep_cartao"  class="form-control btn-border-radius cepMask" placeholder="">
											<span class="input-group-btn">
												<button id="btnBuscaCep" class="btn btn-primary btn-border-radius" type="button"><i class="fa fa-search"></i></button>
											</span>
										</div><!-- /input-group -->
									</div><!-- /.col-lg-6 -->
									<div class="clear"></div>
									<div id="camposEndereco" class="hidden">
										<div class="col-sm-8 col-xs-12 m-top-sm">
											<label for="">Endereço</label>
											<input type="text" id="endereco_cartao" name="endereco_cartao" class="form-control btn-border-radius">
										</div>
										<div class="col-sm-4 col-xs-12 m-top-sm">
											<label for="">Número</label>
											<input type="text" id="numero_cartao" name="numero_cartao" class="form-control btn-border-radius">
										</div>
										<div class="col-sm-6 col-xs-12 m-top-sm">
											<label for="">Complemento</label>
											<input type="text" id="complemento_cartao" name="complemento_cartao" class="form-control btn-border-radius">
										</div>
										<div class="col-sm-6 col-xs-12 m-top-sm">
											<label for="">Bairro</label>
											<input type="text" id="bairro_cartao" name="bairro_cartao" class="form-control btn-border-radius">
										</div>
										<div class="col-sm-6 col-xs-12 m-top-sm">
											<label for="">Cidade</label>
											<input type="text" id="cidade_cartao" name="cidade_cartao" class="form-control btn-border-radius">
										</div>
										<div class="col-sm-2 col-xs-12 m-top-sm">
											<label for="">Estado</label>
											<input type="text" id="estado_cartao" name="estado_cartao" class="form-control btn-border-radius">
										</div>
									</div>
									<div class="clear"></div>
									<div class="col-sm-4 p-top-md ">
										<button type="submit" id="btnCartao" class="btn btn-success btn-block btn-border-radius m-top-xs">PAGAR</button>
									</div>
								</div>
								<div id="resultadoCartao" style="display: none">
									<i class="fa" aria-hidden="true"></i>
									<h2></h2>
									<p></p>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="col-sm-4 col-xs-12 p-xs-all-0">
		<h5>INSCRIÇÃO</h5>
		<div class="panel-inscricao">

			<div class="">
				<div class="col-xs-12 "><label for="">curso:</label> </div>
				<div class="col-xs-12 m-bottom-md">{{$curso->nome_curso}} </div>
				<div class="col-xs-6 ">
					<label for="">Turma:</label>
				</div>
				<div class="col-xs12 ">

					
					
					
				 </div>
					
				<div class="col-xs-6 col-sm-6  m-top-sm">
				<label for="">Quantidade:</label>
			</div>
				<div class="col-xs-6 col-sm-6 m-top-sm text-right">{{$qtd_inscricao}}</div>
			</div>

			<hr class="m-top-md m-bottom-md col-xs-12 p-all-0">
			<div>	
					
					<div class="col-xs-6 col-sm-6 m-top-sm"><label for="">À vista</label></div>
					<div class="col-xs-6  col-sm-6 text-right  m-top-sm"><span class="pref">R$</span> <span class="avista">{{number_format($curso->valor_avista * $qtd_inscricao,2,",",".")}}</span></div>
					
			</div>
			<div class="">
				<div class="col-xs-8 col-sm-8 p-bottom-sm"><label for="">Valor Parcelado</label></div>
				<div class="col-xs-4 col-sm-4 text-right p-bottom-sm"><span class="pref">R$ </span><span class="valor">{{number_format($curso->valor_total,2,',','.')}}</span></div>
			</div>
			<div class="clearfix"></div>
		</div>


	</div>
	
</div>

@endsection

@section('pos-script')

	
@if($edicao->gratuito != '1')

<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<!--	<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>--> 

<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

<script>
numeral.register('locale', 'br', {
    delimiters: {
        thousands: '.',
        decimal: ','
    },
    abbreviations: {
        thousand: 'k',
        million: 'm',
        billion: 'b',
        trillion: 't'
    },
    ordinal : function (number) {
        return number === 1 ? 'er' : 'ème';
    },
    currency: {
        symbol: 'R$'
    }
});

// switch between locales
numeral.locale('br');
		$(document).ready(function(){
		$.ajax({
				url : "{{route('pagseguro.inicia.sessao')}}",
				type : 'get',
				dataTyp : 'json',
				async : false,
				timeout: 20000,
				success: function(data){
				
					PagSeguroDirectPayment.setSessionId(data);
						
				}
			});
		});
</script>

@endif
	<script>

		$(document).ready(function(){

			$("#id_edicao").change(function(){
			var gratuito = $(this).children('option:selected').data('gratuito');
			if(gratuito == 1){
				$(".total").html('Gratuito');
				$('.total').siblings('.pref').hide();
			}else{
				var valor = $(this).children('option:selected').data('valor');
				var Avista = $(this).children('option:selected').data('avista');
				$('.total').siblings('.pref').show();
				$('.avista').siblings('.pref').show();
				$('.avista').html(Avista)
				$('input[name="valor_avista"]').val(Avista)
			}
		})


			var id_edicao = $("#id_edicao option[value='{{$id_edicao}}']").attr('selected','selected');
			if(id_edicao.data("gratuito") == 1){
				$(".valor").html('Gratuito');
				$('.valor').siblings('.pref').hide();
			}else{
				var valor = $(this).children('option:selected').data('valor');
				
				$('.valor').siblings('.pref').show();
				
			}
			$(".cpfOuCnpj").on('keydown', function (e) {
				var digit = e.key.replace(/\D/g, '');
				var value = $(this).val().replace(/\D/g, '');
				var size = value.concat(digit).length;
				$(this).mask((size <= 11) ? '000.000.000-00' : '00.000.000/0000-00');
			});
			$(".validadeMask").mask('00/0000',  {clearIfNotMatch: true,placeholder: "00/0000"})

			
			
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
			


			$("#btAvancar").click(function(e){

				var totalRequerido = $('.lista-inscrito :input[required]:visible').length;
				var contPreenchido = 0;
				for (var i = 0; i < totalRequerido; i++) {
					if($('.lista-inscrito :input[required]:visible').eq(i).val() == ""){
						contPreenchido++;
					}
				}
				 
				if(contPreenchido > 0){
					swal("Opa!","Preencha todos os campos corretamente", "info");
					$("#dadosPagamento").addClass("hidden");
				}else{
					$("#dadosPagamento").removeClass("hidden");
				}

				$(".loadingPage").fadeIn('fast');	
				$.ajax({
					type: "POST",
					url: "{{route('store.alunos')}}",
                   data: $("#alunosInscricao").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                   	if(data.gratuito == '1'){
                   		window.location.href = "{{route('curso.inscricao.sucesso')}}";
                   		
                   	}

                   	if(data.status == "enviado"){
                   		$(".loadingPage").fadeOut('fast');	
                   		identificador = PagSeguroDirectPayment.getSenderHash();
                   		$(".hashPagSeguro").val(identificador);
                   		$("input[name='token_inscricao']").val(data.token_inscricao)
                         //swal("Sucesso!", "Formulário enviado com sucesso, em breve entraremos em contato com você.", "success");
                     }else{
                        // swal("Opa!", data.status, "info");
                    }
                },
                error: function(data) {
                	
                        var errors = data.responseJSON; // An array with all errors.
                    }
                });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        })
			$("#btAvancarPagamento").click(function(e){

				var totalRequerido = $('#pagadorDiferente :input[required]:visible').length;
				var contPreenchido = 0;
				for (var i = 0; i < totalRequerido; i++) {
					if($('#pagadorDiferente :input[required]:visible').eq(i).val() == ""){
						contPreenchido++;
					}
				}
				
				if(contPreenchido > 0){
					swal("Opa!","Preencha todos os campos corretamente", "info");
					$("#formaPagamento").addClass("hidden");
				}else{
					$("#formaPagamento").removeClass("hidden");
				}

            e.preventDefault(); // avoid to execute the actual submit of the form.
        })
			$(".copiarDados").change(function(){
				
				var participante = $(this).val();
				if(participante != "outro"){
					$("input[name='nome_boleto']").val($("#"+participante+" input[name='aluno[nome_aluno][]'").val());
					$("input[name='doc_boleto']").val($("#"+participante+" input[name='aluno[cpf_aluno][]'").val());
					$("input[name='cpf_cartao']").val($("#"+participante+" input[name='aluno[cpf_aluno][]'").val());
					
					$("input[name='nome_cartao']").val($("#"+participante+" input[name='aluno[nome_aluno][]'").val());
					
					$("#dadosPagadorDiferente").addClass("hidden");
					$("#formaPagamento").removeClass("hidden");
					
					$('input[name="nome_pagador"]').val($("#"+participante+" input[name='aluno[nome_aluno][]']").val());
					$('input[name="doc_pagador"]').val($("#"+participante+" input[name='aluno[cpf_aluno][]']").val());
					$('input[name="data_nascimento_pagador"]').val($("#"+participante+" input[name='aluno[data_nascimento][]']").val());

					var sexo_aluno = $("#"+participante+" .sexo_aluno option:selected").val();
					
					$('.sexo_pagador').val(sexo_aluno);
					

					$('input[name="email_pagador"]').val($("#"+participante+" input[name='aluno[email_aluno][]']").val());
					$('input[name="telefone_pagador"]').val($("#"+participante+" input[name='aluno[tel_celular_aluno][]']").val());

				}else{
					$('input[name="nome_pagador"]').val('');
					$('input[name="doc_pagador"]').val('');
					$('input[name="data_nascimento_pagador"]').val('');
					$("input[name='sexo_pagador'] option[value='']").attr("selected",true);
					
					$('input[name="email_pagador"]').val('');
					$('input[name="telefone_pagador"]').val('');

					if($('input[name="nome_pagador"]').val() == "" || 
						$('input[name="doc_pagador"]').val() == "" || 
						$('input[name="data_nascimento_pagador"]').val() == "" || 
						$('input[name="sexo_pagador"]').val() == "" || 
						$('input[name="email_pagador"]').val() == "" || 
						$('input[name="telefone_pagador"]').val() == ""){
						$("#formaPagamento").addClass("hidden");
				} 
				$("#dadosPagadorDiferente").removeClass("hidden")
			}

		})


			$("#tabTypePagamento a").click(function(){
				var target = $(this).data("target");
				$("input[name='paymentMethod']").val(target);

				if(target == "boleto"){
					$("#cep_cartao").removeAttr("required");
					$("#endereco_cartao").removeAttr("required");
					$("#bairro_cartao").removeAttr("required");
					$("#cidade_cartao").removeAttr("required");
					$("#estado_cartao").removeAttr("required");
					$("input[name='nome_cartao']").removeAttr("required");
					$("input[name='cpf_cartao']").removeAttr("required");
					$("#numCartao").removeAttr("required");
					$("#validade").removeAttr("required");
					$("#cvv").removeAttr("required");
				}else{

					$("input[name='nome_cartao']").attr("required","required")
					$("input[name='cpf_cartao']").attr("required","required")
					$("#numCartao").attr("required","required")
					$("#validade").attr("required","required")
					$("#cvv").attr("required","required")
					$("#cep_cartao").attr("required","required")
					$("#endereco_cartao").attr("required","required")
					$("#bairro_cartao").attr("required","required")
					$("#cidade_cartao").attr("required","required")
					$("#estado_cartao").attr("required","required")
				}
			})



			$("#formPagamento").submit(function(e) {
				e.preventDefault();
				
           // $("#formNewletter .btn-success").attr('disabled',true)
           if($("input[name='paymentMethod']").val() == "boleto"){
           	var url = "{{route('pagseguro.pagamento.boleto')}}"; 
           	$("#btnBoleto").addClass("hidden");
           	$("#boletoLoading").fadeIn("fast");
           }else{
           	var url = "{{route('pagseguro.pagamento.cartao')}}"; 
           	$("#dadosCartao").addClass("hidden");
           	$("#cartaoLoading").fadeIn("fast");
           }
           $.ajax({
           	type: "POST",
           	url: url,
                   data: $("#formPagamento").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                   	console.log(data)
                   	
                   	if($("input[name='paymentMethod']").val() == "boleto"){
                   		$("#boletoLoading").fadeOut("fast",function(){
                   			$("#resultadoBoleto a").attr("href",data.paymentLink[0]);
                   			$("#resultadoBoleto").fadeIn("fast")
                   		});
                   		
                   	}else{
                   		var type = 'success';
                   		var titulo = "Sucesso!"
                   		var icon = "fa-check";
                   		
                   		if (data.statusCode != '3'){
                   			type = 'info';
                   			titulo = 'Atenção';
                   			icon = "fa-exclamation-circle";	
                   		}
                   		$("#resultadoCartao").addClass(type);
                   		$("#resultadoCartao h2").html(titulo);
                   		$("#resultadoCartao i").addClass(icon);
                   		
                   		$("#resultadoCartao p").html(data.statusDescricao);
                   		
                   		$("#cartaoLoading").fadeOut("fast",function(){
                   			$("#resultadoCartao").fadeIn("fast");
                   		});
                   		
						/*
	 					swal({
						  title: titulo,
						  type: type,
						  html:data.statusDescricao,
						  width: 600,
  						  padding: 50,
						  showCloseButton: false,
						  showCancelButton: false,
						  focusConfirm: false,
						  showConfirmButton:false,
						  timer: 5000,
						  onOpen: () => {
						    swal.showLoading()
						  }
						}).then((result) => {
						  if (
						    // Read more about handling dismissals
						    result.dismiss === swal.DismissReason.timer
						  ) {
						   window.location.href = '{{route("home")}}';
						  }
						})*/
					}

                   /*	if(data.status == "enviado"){
                   		swal("Sucesso!", "Formulário enviado com sucesso, em breve entraremos em contato com você.", "success");
                   	}else{
                   		swal("Opa!", data.status, "info");
                   	}*/
                   },
                   error: function(data) {
                   	console.log(data);
                        var errors = data.responseJSON; // An array with all errors.
                    },
                    statusCode: {
				      500:function(){
				       if($("input[name='paymentMethod']").val() == "boleto"){
				       	var targetResultado = 'resultadoBoleto';
				       	var targetLoadingResultado = 'boletoLoading';
				       }else{
				       	var targetResultado = 'resultadoCartao';
				       	var targetLoadingResultado = 'cartaoLoading';
				       }
                   		type = 'info';
                   		titulo = 'Atenção';
                   		icon = "fa-exclamation-circle";	
                   		
                   		$("#"+targetResultado).addClass(type);
                   		$("#"+targetResultado +" h2").html(titulo);
                   		$("#"+targetResultado+" i").addClass(icon);
                   		
                   		$("#"+targetResultado+" p").html("Infelizemente não conseguimos concluir sua operação, entre em contato no e-mail relacionamento@espacoativo.med.br ou tente novamente mais tarde.");
                   		
                   		$("#"+targetLoadingResultado).fadeOut("fast",function(){
                   			$("#"+targetResultado).fadeIn("fast");
                   		});
				       }
				     }
                });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
$("#validade").change(function(){
	var numCartao = $("#numCartao").val();
	if(numCartao != "" && $(this).val() != ""){
		$("#cvv").removeAttr("disabled");
	}
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
						swal({
						  title: "Atenção",
						  type: 'info',
						  html:'Um ou mais campos do cartão estão invalidos',
						  width: 600,
  						  padding: 50,
						  showCloseButton: false,
						  showCancelButton: false,
						  focusConfirm: false,
						  showConfirmButton:false,
						  
						})
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
				    	console.log("success: ", response)
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

			});
			$("#parcelasCartao").change(function(){
				

				var valParcela = valorParcelas[$(this).val()-1].installmentAmount;
				valParcela = valParcela.toFixed(2);
				$("#valorParcelas").val(valParcela)
			});
		});
		
		$("#id_edicao").change(function(){
			var gratuito = $(this).children('option:selected').data('gratuito');
			$("#alunosInscricao").val($(this).val())
			if(gratuito == 1){
				$(".valor").html('Gratuito');
				$('.valor').siblings('.pref').hide();
			}else{
				var valor = $(this).children('option:selected').data('valor');
				$('.valor').siblings('.pref').show();
			}
		})

	</script>

	@endsection