@extends('templates.site')
@section('pre-assets')
<style>
	.aguarde{
		padding: 50px 80px;
	    border-radius: 20px;
	    background: #fff;
	    position: fixed;
	    /* width: 30%; */
	    left: 50%;
	    display: none;
	    z-index: 1000;
	    border: 1px solid #e2e2e2;

	}
</style>
@endsection
@section('content')
<div class="aguarde">
	<img src="{{asset('min/img/loading.gif')}}" alt="">
	<h3>Aguarde....</h3>
</div>
<div class="row">
	<div class="col-sm-12">

		<h2>Formulário de Inscrição</h2>
	</div>
	<div id="passos-formulario">
		<div class="passo active">
			<span class="number ">1</span>
			<h3>DADOS DOS PARTICIPANTES</h3>
		</div>
		<div class="passo">
			<span class="number ">2</span>
			<h3>DADOS DE PAGAMENTO</h3>
		</div>
		<div class="passo">
			<span class="number ">3</span>
			<h3>PAGAMENTO</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-sm-10 col-xs-12 col-sm-offset-1 p-all-0 m-top-lg">
		{!!Form::open(['route'=>'inscricao.dados-formulario','id'=>'dados-formulario', 'class'=>''])!!}
		
		<ul id="listaParticipantes">

			@foreach($inscricoes as $key=>$inscricao)
			
			<li class="col-sm-12 col-xs-12 p-all-0 @if($key == '0') active @else hidden @endif">
				<input type="hidden" name="congresso" value="{{$inscricao->congresso->id}}">
				<input type="hidden" name="congresso_id[]" value="{{$inscricao->id}}">
				
			<input type="hidden" name="id[]" value="{{$inscricao->id}}">
			<input type="hidden" name="token_pagseguro[]" value="{{$inscricao->token_pagseguro}}">
			<input type="hidden" name="anuidade[]" value="nao_acertar">
			<input type="hidden" name="user_id[]" value="">
				<h4>Participante número: {{$key+1}}/{{count($inscricoes)}}</h4>
				<div class="dados">
					<div class="form-group col-sm-3 col-xs-12">
						<label for="">Nome Completo<small>*</small></label>
						<input type="text" required="" name="nome[]" class="form-control btn-flat" id="">
					</div>
					<div class="form-group col-sm-3 col-xs-12">
						<label for="">CPF <small>*</small></label>
						<input type="text" required=""  name="cpf[]" class="form-control btn-flat cpfMask" id="">
					</div>
					<div class="form-group col-sm-3 col-xs-12">
						<label for="">E-mail <small>*</small></label>
						<input type="email" required="" autocomplete="false"  name="email[]" class="form-control btn-flat" id="">
					</div>

					<div class="form-group col-sm-3 col-xs-12">
						<label for="">Confirmar E-mail <small>*</small></label>
						<input type="confirmar" required=""  name="confirmar[]" class="form-control btn-flat" id="">
					</div>

<hr>
<h4>ENDEREÇO</h4>
<div class="col-sm-3">
	<div class="form-group">
		<label for="">Cep <small>*</small></label> <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank"><small>Não sei meu cep:</small></a>
		<input type="text" class="form-control btn-flat cepMask" id="cep" required=""  name="cep[]" value="{{@$user->dados->cep}}">
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group">
		<label for="">Endereço <small>*</small></label>
		<input type="text" class="form-control btn-flat" required="" value="{{@$user->dados->endereco}}" name="endereco[]">
	</div>
</div>
<div class="col-sm-2">
	<div class="form-group">
		<label for="">Número <small>*</small></label>
		<input type="number" class="form-control btn-flat" required="" value="{{@$user->dados->numero}}" name="numero[]">
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label for="">Complemento</label>
		<input type="text" class="form-control btn-flat"value="{{@$user->dados->complemento}}" name="complemento[]">
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group">
		<label for="">Bairro <small>*</small></label>
		<input type="text" class="form-control btn-flat" required="" value="{{@$user->dados->bairro}}" name="bairro[]">
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group">
		<label for="">Cidade <small>*</small></label>
		<input type="text" class="form-control btn-flat" required="" value="{{@$user->dados->cidade}}"  name="cidade[]">
	</div>
</div>
<div class="col-sm-2">
	<div class="form-group">
		<label for="">Estado <small>*</small></label>
		<input type="text" class="form-control btn-flat" required="" value="{{@$user->dados->estado}}" name="estado[]">
	</div>
</div>
<div class="col-sm-2">
	<div class="form-group">
		<label for="">País <small>*</small></label>
		<input type="text" class="form-control btn-flat" required="" value="{{@$user->dados->pais}}" name="pais[]">
	</div>
</div>
<hr>
<div class="form-group col-sm-3 col-xs-12">
	<label for="">Telefone residencial </label>
	<input type="text" name="telefone_residencial[]" class="form-control btn-flat telMask" id="">
</div>
<div class="form-group col-sm-3 col-xs-12">
	<label for="">Telefone do trabalho </label>
	<input type="text" name="telefone_trabalho[]" class="form-control btn-flat telMask" id="">
</div>
<div class="form-group col-sm-3 col-xs-12">
	<label for="">Telefone do celular <small>*</small></label>
	<input type="text" name="telefone_celular[]" required="" class="form-control btn-flat telMask" id="">
</div>

<div class="form-group col-sm-3 col-xs-12">
	<label for="">WhatsApp </label><Br>
	<input type="radio" name="whatsapp_{{$key}}" value="Sim" id="" checked="" class="minimal"> Sim
	<input type="radio" name="whatsapp_{{$key}}" value="Não" id="" class="minimal"> Não
</div>
<div class="clearfix ">	</div>
<div class="form-group col-sm-3 col-xs-12">
	<label for="">Filiação religiosa <small>*</small></label><Br>
	<input type="radio" name="filiacao_religiosa_{{$key}}" value="Sim" required="" id="" class="minimal"> Sim
	<input type="radio" name="filiacao_religiosa_{{$key}}" value="Não"  required="" id="" class="minimal"> Não
	
</div>

<div class="form-group col-sm-4 col-xs-12">
	<label for="">Nome filiação religiosa </label>
	<input type="text" name="nome_filiacao_religiosa[]" class="form-control btn-flat" id="">
</div>
<div class="form-group col-sm-5 col-xs-12">
	<label for="">Instituição de ensino ou pesquisa a qual está vinculado </label>
	<input type="text" name="instituicao_vinculado[]" class="form-control btn-flat" id="">
</div>
<div class="form-group col-sm-4 col-xs-12">
	<label for="">Atividade profissional principal *</label>
	<input type="text" name="atividade_profissional[]"  required="" class="form-control btn-flat" id="">
</div>

<div class="form-group col-sm-6 col-xs-12">
	<label for="">Deseja fazer alguma COMUNICAÇÃO no congresso? *</label><Br>
	<input type="radio" name="fazer_comunicado_{{$key}}"  required="" value="Sim" id="" class="minimal"> Sim 
	<input type="radio" name="fazer_comunicado_{{$key}}"  required="" checked="" value="Não" id="" class="minimal"> Não<br>
	<p>
	Obs.: caso ainda não tenha enviado sua COMUNICAÇÃO, favor acessar <a href="http://abiblica.org.br/noticias/edital-para-comunicacoes-do-viii-congresso-internacional-de-pesquisa-biblica" target="_blank">aqui</a>. </p>
</div>
<div class="form-group col-sm-12 col-xs-12">
	<label for="">Indique, abaixo, de qual Grupo Temático (GT) você pretende participar durante o congresso *</label><br>


	<input type="checkbox" name="grupo_tematico[{{$inscricao->id}}][]" value="Teoria de memória, linguagem e cultura: perspectivas para leitura das narrativas cristãs primitivas" id="" class="minimal">
	GT 1 - Teoria de memória, linguagem e cultura: perspectivas para leitura das narrativas cristãs primitivas <Br>
	<input type="checkbox" name="grupo_tematico[{{$inscricao->id}}][]" value="GT 2 - Métodos de leitura e hermenêuticas da Bíblia  " id="" class="minimal">
	GT 2 - Métodos de leitura e hermenêuticas da Bíblia  <Br>
	<input type="checkbox" name="grupo_tematico[{{$inscricao->id}}][]" value="GT 3 - Bíblia, arqueologia e história de Israel" id="" class="minimal">
	GT 3 - Bíblia, arqueologia e história de Israel    <Br>
	<input type="checkbox" name="grupo_tematico[{{$inscricao->id}}][]" value="GT 4 - Enfoques de gênero e sexualidade" id="" class="minimal">
	GT 4 - Enfoques de gênero e sexualidade <Br>
	<input type="checkbox" name="grupo_tematico[{{$inscricao->id}}][]" value="GT 5 - Tradução da Bíblia: ferramentas, violências e desafios" id="" class="minimal">
	GT 5 - Tradução da Bíblia: ferramentas, violências e desafios<Br>
	<input type="checkbox" name="grupo_tematico[{{$inscricao->id}}][]" value="GT 6 - Leituras latino-americanas sobre o pentateuco" id="" class="minimal">
	GT 6 - Leituras latino-americanas sobre o pentateuco  <Br>
	<input type="checkbox" name="grupo_tematico[{{$inscricao->id}}][]" value="GT 7 - Pesquisa bíblica: por um diálogo entre as ciências sociais, humanas e a teologia" id="" class="minimal">
	GT 7 - Pesquisa bíblica: por um diálogo entre as ciências sociais, humanas e a teologia <Br>
	<input type="checkbox" name="grupo_tematico[{{$inscricao->id}}][]" value="GT 8 - Antropologia paulina  " id="" class="minimal">
	GT 8 - Antropologia paulina<Br>
</div>
 <div class="clearfix"></div>
					<div class="row">
					 <small>* Itens Obrigatórios</small>
					</div>
					 <div class="clearfix"></div>
				</div>
			</li>
			@endforeach
		
			
		</ul>
		<div class="col-sm-12 ">
			<button type="button" class="btn btn-primary  btn-flat col-sm-3 pull-right" id="btAvancar">Avançar</button>
		</div>
		{!!Form::close()!!}
		
	</div>
</div>	

<div class="modal fade" id="modalAssociado" tabindex="-1" role="dialog" aria-labelledby="modalAssociadoLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Informação</h4>
      </div>
      <div class="modal-body">
      	<label for="">
       	Identificamos que seus dados fazem parte de nossa base de associados, porem sua anuidade consta em aberto, gostaria de acertar a anuidade e obter o desconto na inscrição? </label>
<div class="clearfix m-bottom-md m-top-md"></div>
       	<div class="row">
       		<div class="col-xs-6">
       			<a href="#" class="btn btn-success btn-block btn-flat btAcertar" data-acertar="acertar">Sim, acertar e obter desconto</a>
       		</div>	
       		<div class="col-xs-6">
       			<a href="#" class="btn btn-default btn-block btn-flat btAcertar"  data-acertar="nao_acertar">Não, continuar assim mesmo</a>
       		</div>
       	</div>
      
      </div>
     
    </div>
  </div>
</div>
@endsection
@section('pos-script')
<script>
		$(document).ready(function(e){
			var valorInscricao = "";
			var valorInscricaoAssociado = "";
			$("input[name='email[]']").change(function(){
			var email = $(this).val();
			var cpf = $(this).closest('.active').find("input[name='cpf[]']").val();
			var congresso = $(this).closest('.active').find("input[name='congresso']").val();
			checkAssociado(email,cpf,congresso);
				
			})
			
			$(".btAcertar").click(function(e){
				e.preventDefault();
				var acertar = $(this).data("acertar");
				$(".active input[name='anuidade[]']").val(acertar);
				var user_id = $(".active input[name='user_id[]']").val();

				$("#modalAssociado").modal("hide");
					var erroRequired = 0;
					$("#dados-formulario").find( 'input[required=""]' ).each(function () {
				        if ( ! $(this).val()  ) { 
				           erroRequired++; 
				        }
				    });
				    
				    if($(".active input[name^='grupo_tematico']:checked").length == 0 ){
				    	 erroRequired = 1;
				    }
				    if(erroRequired == 0){
 						$("#dados-formulario").submit();
		 			}
				
			})
			$(".active input[name='cep[]']").change(function(){
			var cepVal = $(this).val();
			
				cep = cepVal.replace("-","");
				$.get("https://viacep.com.br/ws/"+cep+"/json/",function(response){
					console.log(response)
					$(".active input[name='endereco[]']").val(response.logradouro)
					$(".active input[name='bairro[]']").val(response.bairro)
					$(".active input[name='cidade[]']").val(response.localidade)
					$(".active input[name='estado[]']").val(response.uf)
					if(response.logradouro != ""){
						$(".active input[name='pais[]']").val('Brasil')
					
					}	
				})
			})
			$("#btAvancar").click(function(){
				var total = $("#listaParticipantes li").length -1;
				
				var posicao = $("#listaParticipantes li.active").index();
				
				if(posicao < total){
					$("#listaParticipantes li").eq(posicao).addClass("animated zoomOut");
					$("#listaParticipantes li").eq(posicao).delay(700).addClass("hidden")
					$("#listaParticipantes li").eq(posicao).removeClass("active");
					$("#listaParticipantes li").eq(posicao+1).addClass("active");
					$("#listaParticipantes li").eq(posicao+1).removeClass("hidden");
					$("#listaParticipantes li").eq(posicao+1).addClass("animated zoomIn");
				}

				if(posicao == total){
					var erroRequired = 0;
					$("#dados-formulario").find( 'input[required=""]' ).each(function () {
				        if ( ! $(this).val()  ) { 
				           erroRequired++; 
				        }
				    });
				    
				    if($(".active input[name^='grupo_tematico']:checked").length == 0 ){
				    	 erroRequired = 1;
				    }
				    if($(".active input[name^='filiacao_religiosa']:checked").length == 0 ){
				    	 erroRequired = 1;
				    }
				   // console.log(erroRequired);
				   if(erroRequired == 0){
						   	if($('.active input[name="anuidade[]"]').val() == ""){
						    	
						    	var email = $('.active').find('input[name="email[]"]').val();
								var cpf =  $('.active').find('input[name="cpf[]"]').val();
								var congresso = $('.active').find('input[name="congresso"]').val();
								
								return checkAssociado(email,cpf,congresso);
							}else{
						    	$("#dados-formulario").submit();
				 			}

 							
		 				}else{
		 					swal("Antenção", "Um ou mais campos obrigatórios em branco", "warning");
		 				}


				    
				}
			})

			function checkAssociado(email,cpf,congresso){
				
				$.post("{{route('inscricao.checkAssociado')}}",{email:email,cpf:cpf,congresso:congresso},function(response){
					console.log(response)
					valorInscricao = response.valor;
					valorInscricaoAssociado = response.valor_associado;


					if(response.email_localizado == "sim"){
						$(".active input[name='confirmar[]']").val(email);
						$(".active input[name='user_id[]']").val(response.user_id);
					}
					if(response.anuidade_em_dia == "nao" && response.email_localizado == "sim"){
						$("#modalAssociado").modal("show");
					}
					if(response.anuidade_em_dia == "sim"){
						$(".active input[name='anuidade[]']").val('em_dia');
						$(".active input[name='confirmar[]']").val(email);
						swal({
							type: 'success',
								title: 'Associado localizado',
								text: 'Itendificamos seus dados em nossa base de associado, e será aplicado um desconto no pagamento de sua inscricão',
								showConfirmButton: true,
								  
							})
					}
					if(response.dados){
							$(".active input[name='cep[]']").val(response.dados.cep)
							$(".active input[name='endereco[]']").val(response.dados.endereco)
							$(".active input[name='numero[]']").val(response.dados.numero)
							$(".active input[name='complemento[]']").val(response.dados.complemento)
							$(".active input[name='bairro[]']").val(response.dados.bairro)
							$(".active input[name='cidade[]']").val(response.dados.cidade)
							$(".active input[name='estado[]']").val(response.dados.estado)
							if(response.dados.pais == "BR"){
								response.dados.pais = "Brasil";
							}
							$(".active input[name='pais[]']").val(response.dados.pais)
					}
					
					//console.log(response);
				})
			}
});	
	</script>
@endsection