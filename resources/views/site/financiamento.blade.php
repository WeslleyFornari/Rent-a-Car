@extends('templates.site')
@section('title', 'Home')
@section('pre-assets')
<style>

</style>
@endsection
@section('content')
		
			<div class="content panel">
				
				<h2>{{$conteudo->titulo_conteudo}}</h2>
				{!!$conteudo->texto!!}
<hr>
				<h3 class="text-center" >FICHA  PARA ANALISE DE CREDITO</h3>
				{!!Form::open(['route'=>'financiamento.send','id'=>"formFinanciamento", 'class'=>''])!!}
						
				
					<label for="">QUAL VEÍCULO VOCE PRETENDE FINANCIAR?</label>
					<input type="hidden" name="codigo_veiculo" id="veiculo">
					<div class="row">
						<div class="form-group col-sm-6">
	                      <label for="">Marca</label>
	                      <select name="filtro-marca" id="filtro-marca" class="form-control">
	                        <option value="">SELECIONE...</option>
	                          @foreach($marcas as $marca)
	                          
	                             <option value="{{str_slug($marca->marca,'-')}}">{{$marca->marca}}</option>
	                          @endforeach
	                      </select>
	                    </div>
                    </div>
					<div id="lista-veiculos">
						@foreach($veiculos as $veiculo)
						
						<div class="item {{str_slug($veiculo->marca,'-')}}">
							<img src="{{@$veiculo->fotos[0]->arquivo}}" >
							 <div class="title">{{$veiculo->titulo}}<br>{{$veiculo->modelo_versao}}</div>
                      			<a href="{{route('veiculos.detalhes',['slug'=>$veiculo->slug])}}" target="_blank" class="btn bg-amarelo btn-xs"><i class="fa fa-plus"></i> DETALHES</a>
							<button class="btn btn-success btn-xs btSelecionar" data-codigo="{{$veiculo->codigo}}">SELECIONAR</button>
						</div>

				
							
						@endforeach
					</div>

					<div class="clearfix m-top-lg"></div>
					<div class="row">
						<div class="col-sm-6 p-top-sm">
							<label for="">QUAL VALOR VOCE POSSUI DE ENTRADA? *</label>
							<input type="text" name="valor_entrada" required="" class="form-control moneyMask">
						</div>
						<div class="col-sm-6 p-top-sm">
							<label for="">ATÉ QUE VALOR DE PARCELA CABE NO SEU ORÇAMENTO * </label>
							<input type="text" name="valor_parcela" required="" class="form-control moneyMask">
						</div>
						<div class="col-sm-6 p-top-sm">
							<label for="">JÁ FOI ATENDIDO POR ALGUM VENDEDOR?  SE POSITIVO FAVOR COLOCAR O NOME ABAIXO</label>
							<input type="text" name="nome_vendedor" class="form-control">
						</div>
					</div>
					<hr>
					<h3>Dados Pessoais</h3>
					<div class="row">
						<div class="col-sm-3 p-top-sm"><label for="">Nome Completo *</label>
							<input type="text" name="nome_completo" required="" class="form-control">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Data de Nascimento *</label>
							<input type="text" name="data_nascimento" required="" class="dataMask form-control">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">CPF *</label>
							<input type="text" name="cpf" required="" class="form-control cpfMask">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">RG *</label>
							<input type="text" name="rg" required="" class="form-control">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Tem CNH? *</label>
							<select name="cnh" id="" required="" class="form-control">
								<option value="">Selecione</option>
								<option value="Sim">Sim</option>
								<option value="Não">Não</option>
							</select>
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Cidade de Nascimento *</label>
							<input type="text" required="" name="cidade_nascimento" class="form-control">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Estado de Nascimento *</label>
							<input type="text" required="" name="estado_nascimento" class="form-control">
						</div>

						<div class="col-sm-3 p-top-sm"><label for="">Estado Civil *</label>
							<select name="estado_civil" required="" id="" class="form-control">
								<option value="">Selecione</option>
								<option value="Casado">Casado</option>
								<option value="Solteiro">Solteiro</option>
								<option value="Divorciado">Divorciado</option>
								<option value="Víuvo">Víuvo</option>
							</select>
						</div>

						<div class="col-sm-3 p-top-sm"><label for="">Telefone Fixo *</label>
							<input type="tel" name="telefone_fixo" required="" class="form-control telMask">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Telefone Celular *</label>
							<input type="tel" name="celular" required="" class="form-control telMask">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">E-mail *</label>
							<input type="email" name="email" required="" class="form-control ">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Cep</label>
							<input type="text" name="cep" class="form-control cepMask">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Endereço *</label>
							<input type="text" name="endereco" required="" class="form-control camposEndereco" disabled="true">
						</div>
						<div class="col-sm-2 p-top-sm"><label for="">Número *</label>
							<input type="text" name="numero" required="" class="form-control camposEndereco" disabled="true">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Complemento</label>
							<input type="text" name="complemento"  class="form-control camposEndereco" disabled="true">
						</div>
						<div class="col-sm-4 p-top-sm"><label for="">Bairro *</label>
							<input type="text" name="bairro" required="" class="form-control camposEndereco" disabled="true">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Cidade *</label>
							<input type="text" name="cidade" required="" class="form-control camposEndereco" disabled="true">
						</div>
						<div class="col-sm-2 p-top-sm"><label for="">Estado *</label>
							<input type="text" name="estado" required="" class="form-control camposEndereco" disabled="true">
						</div>
						<div class="col-sm-4 p-top-sm"><label for="">Mora a quanto tempo nesse endereço? *</label>
							<input type="text" name="tempo_endereco" required="" class="form-control">
						</div>
						<div class="clearfix"></div>

						<div class="col-sm-4 p-top-sm"><label for="">Nome da Mãe *</label>
							<input type="text" name="nome_mae" required="" class="form-control" >
						</div>
						<div class="col-sm-4 p-top-sm"><label for="">Nome do Conjuge</label>
							<input type="text" name="nome_conjuge" class="form-control" >
						</div>
						<div class="col-sm-4 p-top-sm"><label for="">CPF do Conjuge</label>
							<input type="text" name="cpf_conjuge" class="form-control cpfMask" >
						</div>
						<div class="clearfix"></div>
					<hr class="m-top-lg">
					<div class="col-sm-12">
						<h3>Dados de Referência</h3>
						<p>Precisamos do nome e telefone (de preferência fixo) de duas pessoas que te conhecem</p>
					</div>
						<div class="col-sm-4 p-top-sm"><label for="">Nome *</label>
							<input type="text" name="nome_referencia_1" required="" class="form-control" >
						</div>
						<div class="col-sm-4 p-top-sm"><label for="">Telefone *</label>
							<input type="text" name="tel_referencia_1" required="" class="form-control telMask" >
						</div>
						<div class="col-sm-4 p-top-sm"><label for="">Celular</label>
							<input type="text" name="cel_referencia_1" class="form-control telMask" >
						</div>
						<div class="col-sm-4 p-top-sm"><label for="">Nome *</label>
							<input type="text" name="nome_referencia_2" required="" class="form-control" >
						</div>
						<div class="col-sm-4 p-top-sm"><label for="">Telefone *</label>
							<input type="text" name="tel_referencia_2" required="" class="form-control telMask" >
						</div>
						<div class="col-sm-4 p-top-sm"><label for="">Celular</label>
							<input type="text" name="cel_referencia_2" class="form-control telMask" >
						</div>
					<div class="clearfix"></div>
					<hr class="m-top-lg">
					<div class="col-sm-12">
						<h3>Dados Profissionais</h3>
						<p>Se autônomo ou profissional liberal preencha o ramo em que atua</p>
					</div>
						<div class="col-sm-3 p-top-sm"><label for="">Renda bruta sem desconto *</label>
							<input type="text" name="renda_bruta" required="" class="form-control moneyMask" >
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Empresa e que trabalha *</label>
							<input type="text" name="empresa_trabalha" required="" class="form-control " >
						</div>

						<div class="col-sm-3 p-top-sm"><label for="">Cep *</label>
							<input type="text" name="cep_empresa" required="" class="form-control cepMask">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Endereço *</label>
							<input type="text" name="endereco_empresa" required="" class="form-control camposEnderecoEmpresa" disabled="true">
						</div>
						<div class="col-sm-2 p-top-sm"><label for="">Número *</label>
							<input type="text" name="numero_empresa" required="" class="form-control camposEnderecoEmpresa" disabled="true">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Complemento </label>
							<input type="text" name="complemento_empresa" class="form-control camposEnderecoEmpresa" disabled="true">
						</div>
						<div class="col-sm-4 p-top-sm"><label for="">Bairro *</label>
							<input type="text" name="bairro_empresa" required="" class="form-control camposEnderecoEmpresa" disabled="true">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Cidade *</label>
							<input type="text" name="cidade_empresa" required="" class="form-control camposEnderecoEmpresa" disabled="true">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Estado *</label>
							<input type="text" name="estado_empresa" required="" class="form-control camposEnderecoEmpresa" disabled="true">
						</div>
						<div class="col-sm-3 p-top-sm">
							<label for="">Telefone Empresa</label>
							<input type="text" name="tel_empresa" class="form-control telMask">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Cargo que ocupa *</label>
							<input type="text" name="cargo_empresa" class="form-control" required="" >
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Tempo de empresa *</label>
							<input type="text" name="tempo_empresa" required="" class="form-control">
						</div>

						<div class="clearfix"></div>
						<hr class="m-top-lg">
						<div class="col-sm-12">
							<h3>Dados Bancários</h3>
						</div>

						<div class="col-sm-3 p-top-sm"><label for="">Banco *</label>
							<input type="text" name="banco" class="form-control">
						</div>
						<div class="col-sm-3 p-top-sm"><label for="">Agência *</label>
							<input type="text" name="agencia" required="" class="form-control">
						</div>
						<div class="col-sm-3 p-top-sm">
							<label for="">Conta</label>
							<input type="text" name="conta" required="*" class="form-control">
						</div>
						<div class="col-sm-3 p-top-sm">
							<label for="">Tempo e Conta *</label>
							<input type="text" name="tempo_conta" required="" class="form-control">
						</div>
						<div class="col-sm-3 p-top-sm">
							<label for="">Possui cartão de credito?*</label>
							<select name="possui_cartao_credito" required="" id="" class="form-control">
								<option value="">Selecione</option>
								<option value="Sim">Sim</option>
								<option value="Não">Não</option>
							</select>
						</div>
						<div class="col-sm-3 p-top-sm">
							<label for="">Qual bandeira</label>
							<select name="bandeira_cartao" id="" class="form-control">
								<option value="">Selecione</option>
								<option value="Visa">Visa</option>
								<option value="Master Card">Master Card</option>
								<option value="Hipermarcas">Hipermarcas</option>
								<option value="Outros">Outros</option>
							</select>
						</div>

						<div class="col-sm-3 p-top-sm">
							<label for="">Limite do Cartão</label>
							<input type="text" name="limite_cartao" class="form-control moneyMask">
						</div>

						<div class="col-sm-3 p-top-sm">
							<label for="">Possui cheque? *</label>
							<select name="possui_cheque" required="" id="" class="form-control">
								<option value="">Selecione</option>
								<option value="Sim">Sim</option>
								<option value="Não">Não</option>
							</select>
						</div>

						<div class="col-sm-12 p-top-sm">
							<label for="">Se já financiou veículo alguma vez , favor colocar o nome do banco abaixo</label>
							<input type="text" name="financeira_anterior" class="form-control ">
						</div>
						<div class="col-sm-12 p-top-sm">
							<label for="">Se deseja fazer alguma observação/ comentário, por favor descreva abaixo</label>
						
							<textarea name="observacoes" id="" class="form-control"></textarea>
						</div>

						<div class="col-sm-4 col-md-4 col-lg-3 col-xs-12 m-top-lg">
							<a href="{{route('financiamento')}}">Limpar campos</a>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-3 col-xs-12 m-top-lg pull-right" style="position: relative;">
								<div class="loading">
								<div class="spinner">
								  <div class="rect1"></div>
								  <div class="rect2"></div>
								  <div class="rect3"></div>
								  <div class="rect4"></div>
								  <div class="rect5"></div>
								</div></div>
							<button class="btn bg-amarelo btn-block" type="submit"> <strong>ENVIAR PARA ANÁLISE </strong> <i class="fa fa-next"></i></button>
						</div>
					</div>
				{!!Form::close()!!}
			</div>

			
			
			
		
@endsection
@section('filtro')

@include('includes.filtro-basico')



@endsection
@section('pos-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
	$(document).ready(function(){

	$("input[name='cep']").keyup(function(){
		var length = $(this).val().length;
		if(length == 9){
			var cep = $("input[name='cep']").val();
			cep = cep.replace("-","");
			$.get("https://viacep.com.br/ws/"+cep+"/json/",function(response){
				$("input[name='endereco']").val(response.logradouro)
				$("input[name='bairro']").val(response.bairro)
				$("input[name='cidade']").val(response.localidade)
				$("input[name='estado']").val(response.uf)
				$(".camposEndereco").attr("disabled",false);
			})
		}
	})
	$("input[name='cep_empresa']").keyup(function(){
		var length = $(this).val().length;
		if(length == 9){
			var cep = $("input[name='cep_empresa']").val();
			cep = cep.replace("-","");
			$.get("https://viacep.com.br/ws/"+cep+"/json/",function(response){
				$("input[name='endereco_empresa']").val(response.logradouro)
				$("input[name='bairro_empresa']").val(response.bairro)
				$("input[name='cidade_empresa']").val(response.localidade)
				$("input[name='estado_empresa']").val(response.uf)
				$(".camposEnderecoEmpresa").attr("disabled",false);
			})
		}
	})
	$("#formFinanciamento").submit(function(e) {
					$("#btEnviar").attr('disabled',true)
					$(".loading").fadeIn('fast');
			  		e.preventDefault();

				    var url = "{{route('financiamento.send')}}"; // the script where you handle the form input.

				    $.ajax({
				           type: "POST",
				           url: url,
				           data: $("#formFinanciamento").serialize(), // serializes the form's elements.
				           success: function(data)
				           {
				           	//console.log(data)
				              if(data == "enviado"){
				              
				              
				              	
									swal("Sucesso!","Ficha para financiamento enviada com sucesso, em breve entraremos em contato.", "success");
								
								

								
								$("#formFinanciamento")[0].reset()


				              }
				           }
				         });

				    e.preventDefault(); // avoid to execute the actual submit of the form.
				});
				
	})
</script>



@endsection