@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
<div class="row">
				<div class="col-sm-12">
					<h1 class="text-center">Cadastro</h1>	
					
					{!!Form::open(['route'=>'cadastro.store','id'=>"form-dados", 'class'=>'col-sm-9 col-sm-offset-1'])!!}
						<input type="hidden" name="user_id" id="user_id" value="{{$user->id}}" >
						<h4>DADOS PESSOAIS</h4>
						<div class="col-sm-12">
							<div class="form-group">
							    <label for="">NOME COMPLETO *</label>
							    <input type="text" name="name" required="" class="form-control btn-flat" id="" value="{{$user->name}}">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
							    <label for="">CPF *</label>
							    <input type="text" name="cpf" required="" class="form-control btn-flat cpfMask" id="">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
							    <label for="">Telefone *</label>
							    <input type="text" name="telefone" required="" class="form-control btn-flat telMask" id="">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
							    <label for="">Data Nascimento *</label>
							    <input type="text" class="form-control btn-flat dataMask " id="" name="data_nascimento">
							</div>
						</div>
					
						<div class="col-sm-3">
							<div class="form-group">
							    <label for="">Profissão *</label>
							    <input type="text" class="form-control btn-flat" required="" name="profissao" id="">
							</div>
						</div>
							<div class="col-sm-3">
							<div class="form-group">
							    <label for="">Sexo *</label><br>
							    <div class="col-xs-6 p-left-0">
							    	  
									    <label class="control control--radio">Masculino
									      <input type="radio" name="sexo" value="M"  required=""/>
									      <div class="control__indicator"></div>
									    </label>
							    </div>
							  <div class="col-xs-6 p-right-0">
							  	 <label class="control control--radio">Feminino
							      <input type="radio" name="sexo" value="F"  required=""/>
							      <div class="control__indicator"></div>
							    </label>
							  </div>
							   
							</div>
						</div>
						<hr>
						<h4>ENDEREÇO</h4>
						<div class="col-sm-3">
							<div class="form-group">
							    <label for="">Cep *</label> <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank"><small>Não sei meu cep:</small></a>
							    <input type="text" class="form-control btn-flat cepMask" required="" id="cep" name="cep">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Endereço *</label>
							    <input type="text" class="form-control btn-flat" required="" id="endereco" name="endereco">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
							    <label for="">Número *</label>
							    <input type="number" required="" class="form-control btn-flat" id="" name="numero">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
							    <label for="">Complemento</label>
							    <input type="text" class="form-control btn-flat" id="" name="complemento">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Bairro *</label>
							    <input type="text" required="" class="form-control btn-flat" id="bairro" name="bairro">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Cidade *</label>
							    <input type="text"  required=""class="form-control btn-flat" id="cidade" name="cidade">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
							    <label for="">Estado *</label>
							    <input type="text" required="" class="form-control btn-flat" id="estado" name="estado">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
							    <label for="">País *</label>
							    <input type="text" required="" class="form-control btn-flat" id="pais" name="pais">
							</div>
						</div>
						<hr>
						<h4>FORMAÇÃO & ESPECIALIDADES</h4>
						<div id="box-superior">
						<input type="hidden" name="total_superior" id="total_superior" value="1">
							<div class="col-sm-12 row_sup">
								<div class="col-sm-6 p-left-0">
									<div class="form-group">
										<label for="">Curso Superior em:</label>
										<input type="text" class="form-control btn-flat" name="curso_superior[1]">
									</div>
								</div>
								<div class="col-sm-3"><br>
									<div class="form-group m-top-sm">
									 	<label class="control control--radio">Cursando
										      <input type="radio" name="status_curso_superior[1]" value="cursando" />
										      <div class="control__indicator"></div>
										</label>
										<label class="control control--radio">Concluído
										      <input type="radio" name="status_curso_superior[1]" value="concluido"  />
										      <div class="control__indicator"></div>
										</label>
									</div>
								</div>
								<div class="col-sm-3" >
								<div class="clear hidden-xs m-top-lg" ></div>
									<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddSuperior"><i class="fa fa-plus"></i> Adicionar Formação</a>
								</div>
							</div>
						</div>
						<div id="box-pos">
						<input type="hidden" name="total_pos" id="total_pos" value="1">
							<div class="col-sm-12 row_pos">
						
							<div class="col-sm-6 p-left-0">
								<div class="form-group">
									<label for="">Pós-Graduação:</label>
									<input type="text" class="form-control btn-flat" name="pos_graduacao[1]">
								</div>
								</div>
							<div class="col-sm-3"><br>
								<div class="form-group m-top-sm">
										<label class="control control--radio">Cursando
									      <input type="radio" name="status_pos_graduacao[1]" value="cursando"/>
									      <div class="control__indicator"></div>
									</label>
									<label class="control control--radio">Concluído
									      <input type="radio" name="status_pos_graduacao[1]" value="concluido"/>
									      <div class="control__indicator"></div>
									</label>
								</div>
							</div>
							<div class="col-sm-3" >
							<div class="clear hidden-xs m-top-lg" ></div>
								<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddPos"><i class="fa fa-plus"></i> Adicionar Formação</a>
							</div>
						</div>
						</div>

						<div id="box-mestrado">
						<input type="hidden" name="total_mestrado" id="total_mestrado" value="1">
							<div class="col-sm-12 row_mestrado">
						
							<div class="col-sm-6 p-left-0">
								<div class="form-group">
									<label for="">Mestrado em:</label>
									<input type="text" class="form-control btn-flat" name="mestrado[1]">
								</div>
								</div>
							<div class="col-sm-3"><br>
								<div class="form-group m-top-sm">
										<label class="control control--radio">Cursando
									      <input type="radio" name="status_mestrado[1]" value="cursando"/>
									      <div class="control__indicator"></div>
									</label>
									<label class="control control--radio">Concluído
									      <input type="radio" name="status_mestrado[1]" value="concluido"/>
									      <div class="control__indicator"></div>
									</label>
								</div>
							</div>
							<div class="col-sm-3" >
							<div class="clear hidden-xs m-top-lg" ></div>
								<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddMestrado"><i class="fa fa-plus"></i> Adicionar Formação</a>
							</div>
						</div>
						</div>
						<div id="box-doutorado">
						<input type="hidden" name="total_doutorado" id="total_doutorado" value="1">
							<div class="col-sm-12 row_doutorado">
						
							<div class="col-sm-6 p-left-0">
								<div class="form-group">
									<label for="">Doutorado em:</label>
									<input type="text" class="form-control btn-flat" name="doutorado[1]">
								</div>
								</div>
							<div class="col-sm-3"><br>
								<div class="form-group m-top-sm">
										<label class="control control--radio">Cursando
									      <input type="radio" name="status_doutorado[1]" value="cursando"/>
									      <div class="control__indicator"></div>
									</label>
									<label class="control control--radio">Concluído
									      <input type="radio" name="status_doutorado[1]" value="concluido"/>
									      <div class="control__indicator"></div>
									</label>
								</div>
							</div>
							<div class="col-sm-3" >
							<div class="clear hidden-xs m-top-lg" ></div>
								<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddDoutorado"><i class="fa fa-plus"></i> Adicionar Formação</a>
							</div>
						</div>
						</div>
					<div id="box-pos-doutorado">
						<input type="hidden" name="total_pos-doutorado" id="total_pos-doutorado" value="1">
							<div class="col-sm-12 row_pos-doutorado">
						
							<div class="col-sm-6 p-left-0">
								<div class="form-group">
									<label for="">Pós-Doutorado em:</label>
									<input type="text" class="form-control btn-flat" name="pos-doutorado[1]">
								</div>
								</div>
							<div class="col-sm-3"><br>
								<div class="form-group m-top-sm">
										<label class="control control--radio">Cursando
									      <input type="radio" name="status_pos-doutorado[1]" value="cursando"/>
									      <div class="control__indicator"></div>
									</label>
									<label class="control control--radio">Concluído
									      <input type="radio" name="status_pos-doutorado[1]" value="concluido"/>
									      <div class="control__indicator"></div>
									</label>
								</div>
							</div>
							<div class="col-sm-3" >
							<div class="clear hidden-xs m-top-lg" ></div>
								<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddpos-doutorado"><i class="fa fa-plus"></i> Adicionar Formação</a>
							</div>
						</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-sm-12">
							<label for="">Área Bíblica de Especialização</label>
						</div>
						
							<div class="col-sm-6">

	<div class="form-group">
		<div class="col-sm-12 p-left-0">
			<label class="control control--checkbox"><strong>Antigo (Primeiro) Testamento</strong>


			</label>

		</div>
		<div class="clearfix"></div>
		<div class="list-group">

			<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
				<label class="control control--checkbox">Pentateuco
					
					<input type="checkbox" @if(@$user->especializacaoAntigoTestamento->pentateuco == 1) checked="true" @endif  name="pentateuco" value="1" />
					<div class="control__indicator"></div>

				</label>
			</div>
			<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
				<label class="control control--checkbox">Obra Histórica Deuteronomista
					<input type="checkbox" @if(@$user->especializacaoAntigoTestamento->obra_historica_deuteronomista == '1') checked="" @endif    name="obra_historica_deuteronomista" value="1" />

					<div class="control__indicator"></div>
				</label>
			</div>
			<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
				<label class="control control--checkbox"> Literatura Histórica
					<input type="checkbox" @if(@$user->especializacaoAntigoTestamento->literatura_historica_primeiro == '1') checked="" @endif   name="literatura_historica_primeiro" value="1" />

					<div class="control__indicator"></div>
				</label>
			</div>
			<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
				<label class="control control--checkbox">Literatura Sapiencial
					<input type="checkbox" @if(@$user->especializacaoAntigoTestamento->literatura_sapiencial == '1') checked="" @endif   name="literatura_sapiencial" value="1" />

					<div class="control__indicator"></div>
				</label>
			</div>
			<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
				<label class="control control--checkbox">Literatura Poética
					<input type="checkbox"  @if(@$user->especializacaoAntigoTestamento->literatura_poetica == '1') checked="" @endif  name="literatura_poetica" value="1" />

					<div class="control__indicator"></div>
				</label>
			</div>
			<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
				<label class="control control--checkbox">Literatura Profética
					<input type="checkbox" @if(@$user->especializacaoAntigoTestamento->literatura_profetica == '1') checked="" @endif  name="literatura_profetica" value="1" />

					<div class="control__indicator"></div>
				</label>
			</div>
			<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
				<label class="control control--checkbox">Literatura Apocalíptica
					<input type="checkbox"  @if(@$user->especializacaoAntigoTestamento->literatura_apocaliptica == '1') checked="" @endif  name="literatura_apocaliptica" value="1" />

					<div class="control__indicator"></div>
				</label></div>
				<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
					<label class="control control--checkbox">Literatura Apócrifa
						<input type="checkbox" @if(@$user->especializacaoAntigoTestamento->literatura_apocrifa == '1') checked="" @endif   name="literatura_apocrifa" value="1" />

						<div class="control__indicator"></div>
					</label></div>
					<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
						<label class="control control--checkbox">Língua Hebraica Bíblica
							<input type="checkbox" @if(@$user->especializacaoAntigoTestamento->lingua_hebraica_biblica == '1') checked="" @endif  name="lingua_hebraica_biblica" value="1" />

							<div class="control__indicator"></div>
						</label></div>
						<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
							<label class="control control--checkbox">Septuaginta
								<input type="checkbox"  @if(@$user->especializacaoAntigoTestamento->septuaginta == '1') checked="" @endif name="septuaginta" value="1" />

								<div class="control__indicator"></div>
							</label>
						</div>
						<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
							<label class="control control--checkbox">História de Israel e Oriente Médio Antigo
								<input type="checkbox"  name="historia_de_israel_e_oriente_medio_antigo"  @if(@$user->especializacaoAntigoTestamento->historia_de_israel_e_oriente_medio_antigo == '1') checked="" @endif value="1" />
								<div class="control__indicator"></div>

							</label>
						</div>
					</div>

				</div>
			</div>
			<div class="col-sm-6">

				<div class="form-group">
					<div class="col-sm-12 p-left-0">
						<label class="control control--checkbox"><strong>Novo (Segundo) Testamento</strong>


						</label>

					</div>
					<div class="clearfix"></div>
					<div class="list-group">
						<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
							<label class="control control--checkbox">Evangelhos Sinóticos
								<input type="checkbox" @if(@$user->especializacaoNovoTestamento->evangelhos_sinoticos == '1') checked="" @endif  name="evangelhos_sinoticos" value="1" />


								<div class="control__indicator"></div>
							</label>
						</div>
						<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
							<label class="control control--checkbox">Obra Lucana (Lucas e Atos)
								<input type="checkbox" @if(@$user->especializacaoNovoTestamento->obra_lucana_lucas_e_atos == '1') checked="" @endif  name="obra_lucana_lucas_e_atos" value="1" />
								<div class="control__indicator"></div>
							</label>
						</div>
						<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
							<label class="control control--checkbox"> Literatura Histórica
								<input type="checkbox"  @if(@$user->especializacaoNovoTestamento->literatura_historica_segundo == '1') checked="" @endif name="literatura_historica_segundo" value="1" />

								<div class="control__indicator"></div>
							</label>
						</div>
						<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
							<label class="control control--checkbox">Literatura Joanina (Evangelho e Epístolas)
								<input type="checkbox"  name="literatura_joanina_evangelho_e_epistolas" @if(@$user->especializacaoNovoTestamento->literatura_joanina_evangelho_e_epistolas == '1') checked="" @endif value="1" />
								<div class="control__indicator"></div>

							</label>
						</div>
						<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
							<label class="control control--checkbox">Literatura Paulina
								<input type="checkbox"  @if(@$user->especializacaoNovoTestamento->literatura_paulina == '1') checked="" @endif  name="literatura_paulina" value="1" />

								<div class="control__indicator"></div>
							</label>
						</div>
						<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
							<label class="control control--checkbox">Literatura Deutero-Paulina
								<input type="checkbox" @if(@$user->especializacaoNovoTestamento->literatura_deutero_paulina == '1') checked="" @endif name="literatura_deutero_paulina" value="1" />

								<div class="control__indicator"></div>
							</label>
						</div>
						<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
							<label class="control control--checkbox">Cartas Pastorais
								<input type="checkbox"  name="cartas_pastorais"  @if(@$user->especializacaoNovoTestamento->cartas_pastorais == '1') checked="" @endif value="1" />

								<div class="control__indicator"></div>
							</label></div>
							<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								<label class="control control--checkbox">Literatura Apocalíptica
									<input type="checkbox" @if(@$user->especializacaoNovoTestamento->literatura_apocaliptica == '1') checked="" @endif  name="literatura_apocaliptica" value="1" />

									<div class="control__indicator"></div>
								</label></div>
								<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
									<label class="control control--checkbox">Hebreus
										<input type="checkbox" @if(@$user->especializacaoNovoTestamento->hebreus == '1') checked="" @endif  name="hebreus" value="1" />

										<div class="control__indicator"></div>
									</label></div>
									<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
										<label class="control control--checkbox">Literatura Apócrifa
											<input type="checkbox"  @if(@$user->especializacaoNovoTestamento->literatura_apocrifa == '1') checked="" @endif  name="literatura_apocrifa" value="1" />
											<div class="control__indicator"></div>
										</label>
									</div>
									<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
										<label class="control control--checkbox">Jesus Histórico
											<input type="checkbox" @if(@$user->especializacaoNovoTestamento->jesus_historico == '1') checked="" @endif   name="jesus_historico" value="1" />
											<div class="control__indicator"></div>
										</label>
									</div>
									<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
										<label class="control control--checkbox">História das Origens Cristãs
											<input type="checkbox"  @if(@$user->especializacaoNovoTestamento->historia_das_origens_cristas == '1') checked="" @endif  name="historia_das_origens_cristas" value="1" />
											<div class="control__indicator"></div>
										</label>
									</div>
								</div>

							</div>

						</div>
							<div class="clearfix"></div>
							<h4>ATUAÇÃO PROFISSIONAL</h4>
							<div class="col-sm-4">
									
							
								
									<label for="">Docente:</label><br>
									<div class="col-sm-6 p-left-0">
										<label class="control control--radio">Sim
									      <input type="radio" name="docente" name="Sim"/>
									      <div class="control__indicator"></div>
										</label>
									</div>
									<div class="col-sm-6 p-left-0">
										<label class="control control--radio">Não
									      <input type="radio" name="docente" value="Não"  />
									      <div class="control__indicator"></div>
										</label>
									</div>
								
									
								
								

						

							</div>
								<div class="col-sm-4 ">
									<div class="form-group">
										<label for="">Disciplina(s) ministrada(s): </label>
										<input type="text" class="form-control btn-flat" name="diciplica_docente">
									</div>
								</div>
								<div class="col-sm-4 ">
									<div class="form-group">
										<label for="">Instituição(ões) em que atua:</label>
										<input type="text" class="form-control btn-flat" name="instituicao_docente">
									</div>
								</div>
								<div class="col-sm-4">
									<label for="">Pesquisador(a):</label><br>
									<div class="col-sm-6 p-left-0">
										<label class="control control--radio">Sim
									      <input type="radio" name="pesquisador" value="Sim" />
									      <div class="control__indicator"></div>
										</label>
									</div>
									<div class="col-sm-6 p-left-0">
										<label class="control control--radio">Não
									      <input type="radio" name="pesquisador" value="Não" />
									      <div class="control__indicator"></div>
										</label>
									</div>
							</div>
								<div class="col-sm-4 ">
									<div class="form-group">
										<label for="">Grupo de Pesquisa em que  atua:</label>
										<input type="text" class="form-control btn-flat" name='grupo_pesquisa'>
									</div>
								</div>
								<div class="col-sm-4 ">
									<div class="form-group">
										<label for="">Instituição a qual está vinculado(a): </label>
										<input type="text" class="form-control btn-flat" name="instituicao_pesquisa">
									</div>
								</div>
								<hr>
								<div class="col-sm-12">
									<h4>TERMOS DO CONTRATO</h4>
									<textarea name="" id="" rows="10" class="form-control">Podem tornar-se associadas as pessoas que realizam trabalhos na área da pesquisa bíblica, ou estejam interessados neste campo de pesquisa(pesquisa, tradução, docência, assessoria).
– São associados: os fundadores da Associação, que subscreveram o presente Estatuto na data da fundação; as pessoas que solicitarem à Diretoria sua admissão, mediante apresentação de um curriculum vitae e um parecer favorável de conselheiro idôneo.
– Os associados se comprometem a colaborar com os objetivos da Associação e o pagamento de uma contribuição anual fixada pela Assembléia.
– O associado terá direito a participar, contribuir e desfrutar das  atividades gerais da Associação.
– Não poderá exercer seus direitos o associado que não estiver em dia com suas obrigações para com a Associação.
– O associado que durante 3 (três) anos consecutivos deixar de pagar sua contribuição à Associação poderá ser excluído pela Diretoria, 
cabendo recurso à Assembléia Geral.
– Ao associado que for excluído será facultado pleitear a reinscrição, mediante o pagamento da anuidade vigente e uma taxa de readmissão estabelecida pela Diretoria.
– O associado pode a qualquer momento pedir o seu desligamento sem nenhum ônus para ambas as partes.
– Os associados, mesmo os que ocupam cargos na Diretoria e no Conselho, não perceberão qualquer remuneração direta ou indireta, nem respondem pelas obrigações da Associação, que serão cobertas exclusivamente por seu patrimônio.
									</textarea>
									 <label class="control control--checkbox">Li e Aceito os termos.
											<input type="checkbox" id="li_aceito" value="Li_e_Aceito" />
											<div class="control__indicator"></div>
										</label>
									
								</div>
								<div class="clearfix"></div>
								<div class="col-sm-4 pull-right">
									<button class="btn btn-default btn-block btn-flat" disabled="" id="btAvancar" >AVANÇAR</button>
								</div>

						{!!Form::close()!!}
		<div id="resultado" class="col-sm-9 col-sm-offset-1" style="display: none">
										<div class="alert alert-success alert-dismissible">
										
										<h2><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
 										Cadastro Realizado com sucesso.</h2>
										<h3>Em breve entraremos em contato.</h3>
										<h3>Obrigado.</h3>
			</div>
									</div>
				</div>
			
			</div>





@endsection

@section('pos-script')
<script>
	$(document).ready(function(){
		$(".cepMask").change(function(){
			var str = $(this).val();
			var res = str.replace("-", "");
			$.get('http://cep.republicavirtual.com.br/web_cep.php?cep='+res+ '&formato=json',function(data){
				console.log(data)
				$("#endereco").val(data.logradouro)
				$("#bairro").val(data.bairro)
				$("#cidade").val(data.cidade)
				$("#estado").val(data.uf)
				$("#pais").val('Brasil')
			})		
	       
         
		});
		$("#li_aceito").change(function(){

			if($(this).is(":checked")){
				$("#btAvancar").removeAttr("disabled");
				$("#btAvancar").removeClass("btn-default")
				$("#btAvancar").addClass("btn-success")
			}
		})
		/*
		$("#form-cadastro").submit(function(e) {
			  		
				    var url = "{{route('cadastro.step1')}}"; // the script where you handle the form input.

				    $.ajax({
				           type: "POST",
				           url: url,
				           data: $("#form-cadastro").serialize(), // serializes the form's elements.
				           success: function(data)
				           {
				           	console.log(data)
				              if(data.resposta == "sucesso"){
				              	$("#form-cadastro")[0].reset();
				              	$("#id_user").val(data.id)
				              
				              	$("#form-cadastro").addClass("animated fadeOutLeft").delay(500).queue(function(next) {
									$("#resultado").slideDown('0');
									$("#resultado").addClass("animated fadeInRight");
									 next();
									 $("#form-cadastro").hide(0)
								});
								$("#form-cadastro").slideUp('fast',function(){
									
									$("#form-dados").addClass("animated bounceInUp");
								});

								
								


				              }
				           }
				         });

				    e.preventDefault(); // avoid to execute the actual submit of the form.
		});*/
		$("#form-dados").submit(function(e) {
			  		
			var url = "{{route('cadastro.step2')}}"; // the script where you handle the form input.

				    $.ajax({
				           type: "POST",
				           url: url,
				           data: $("#form-dados").serialize(), // serializes the form's elements.
				           success: function(data)
				           {
				           	console.log(data)
				              if(data.resposta == "sucesso"){
				              	$("#id_user").val(data.id);
				              	$("#form-dados")[0].reset();
								swal({
										type: 'success',
								  title: 'Cadastro Realizado com sucesso.',
								  text: 'Em breve entraremos em contato. Obrigado.',
								showConfirmButton: false,
								  timer: 3500
								})
				              }
				           }
				         });

				    e.preventDefault(); // avoid to execute the actual submit of the form.
		});
	

										
		$("#btAddSuperior").click(function(e){
			e.preventDefault();
			 var total = $(".row_sup").length + 1;
			 $("#total_superior").val(total);
			var html = '';
				html += '<div class="col-sm-12 row_sup" >';
				html += '<div class="col-sm-6 p-left-0">';
				html += '<div class="form-group">';
				html += '<label for="">Curso Superior em:</label>';
				html += '<input type="text" class="form-control btn-flat" name="curso_superior['+total+']">';
				html += '</div>';
				html += '</div>';
				html += '<div class="col-sm-3"><br>';
				html += '<div class="form-group m-top-sm">';
				html += '<label class="control control--radio">Cursando';
				html += '<input type="radio" name="status_curso_superior['+total+']" value="cursando" />';
				html += '<div class="control__indicator"></div>';
				html += '</label>';
				html += '<label class="control control--radio">Concluído';
				html += '<input type="radio" name="status_curso_superior['+total+']" value="concluido"  />';
				html += '<div class="control__indicator"></div>';
				html += '</label>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				$("#box-superior").append(html);
		})

		$("#btAddPos").click(function(e){
			e.preventDefault();
			 var total = $(".row_pos").length + 1;
			 $("#total_pos").val(total);
			var html = '';
				html += '<div class="col-sm-12 row_pos" >';
				html += '<div class="col-sm-6 p-left-0">';
				html += '<div class="form-group">';
				html += '<label for="">Pós-Graduação:</label>';
				html += '<input type="text" class="form-control btn-flat" name="pos_graduacao['+total+']">';
				html += '</div>';
				html += '</div>';
				html += '<div class="col-sm-3"><br>';
				html += '<div class="form-group m-top-sm">';
				html += '<label class="control control--radio">Cursando';
				html += '<input type="radio" name="status_pos_graduacao['+total+']" value="cursando" />';
				html += '<div class="control__indicator"></div>';
				html += '</label>';
				html += '<label class="control control--radio">Concluído';
				html += '<input type="radio" name="status_pos_graduacao['+total+']" value="concluido"  />';
				html += '<div class="control__indicator"></div>';
				html += '</label>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				$("#box-pos").append(html);
		});
		$("#btAddMestrado").click(function(e){
			e.preventDefault();
			 var total = $(".row_mestrado").length + 1;
			 $("#total_mestrado").val(total);
			var html = '';
				html += '<div class="col-sm-12 row_mestrado" >';
				html += '<div class="col-sm-6 p-left-0">';
				html += '<div class="form-group">';
				html += '<label for="">Mestrado em:</label>';
				html += '<input type="text" class="form-control btn-flat" name="mestrado['+total+']">';
				html += '</div>';
				html += '</div>';
				html += '<div class="col-sm-3"><br>';
				html += '<div class="form-group m-top-sm">';
				html += '<label class="control control--radio">Cursando';
				html += '<input type="radio" name="status_mestrado['+total+']" value="cursando" />';
				html += '<div class="control__indicator"></div>';
				html += '</label>';
				html += '<label class="control control--radio">Concluído';
				html += '<input type="radio" name="status_mestrado['+total+']" value="concluido"  />';
				html += '<div class="control__indicator"></div>';
				html += '</label>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				$("#box-mestrado").append(html);
		})

		$("#btAddDoutorado").click(function(e){
			e.preventDefault();
			 var total = $(".row_doutorado").length + 1;
			 $("#total_doutorado").val(total);
			var html = '';
				html += '<div class="col-sm-12 row_doutorado" >';
				html += '<div class="col-sm-6 p-left-0">';
				html += '<div class="form-group">';
				html += '<label for="">Doutorado em:</label>';
				html += '<input type="text" class="form-control btn-flat" name="doutorado['+total+']">';
				html += '</div>';
				html += '</div>';
				html += '<div class="col-sm-3"><br>';
				html += '<div class="form-group m-top-sm">';
				html += '<label class="control control--radio">Cursando';
				html += '<input type="radio" name="status_doutorado['+total+']" value="cursando" />';
				html += '<div class="control__indicator"></div>';
				html += '</label>';
				html += '<label class="control control--radio">Concluído';
				html += '<input type="radio" name="status_doutorado['+total+']" value="concluido"  />';
				html += '<div class="control__indicator"></div>';
				html += '</label>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				$("#box-doutorado").append(html);
		})
			
		$("#btAddpos-doutorado").click(function(e){
			e.preventDefault();
			 var total = $(".row_pos-doutorado").length + 1;
			 $("#total_pos-doutorado").val(total);
			var html = '';
				html += '<div class="col-sm-12 row_pos-doutorado" >';
				html += '<div class="col-sm-6 p-left-0">';
				html += '<div class="form-group">';
				html += '<label for="">Pós-Doutorado em:</label>';
				html += '<input type="text" class="form-control btn-flat" name="pos-doutorado['+total+']">';
				html += '</div>';
				html += '</div>';
				html += '<div class="col-sm-3"><br>';
				html += '<div class="form-group m-top-sm">';
				html += '<label class="control control--radio">Cursando';
				html += '<input type="radio" name="status_pos-doutorado['+total+']" value="cursando" />';
				html += '<div class="control__indicator"></div>';
				html += '</label>';
				html += '<label class="control control--radio">Concluído';
				html += '<input type="radio" name="status_pos-doutorado['+total+']" value="concluido"  />';
				html += '<div class="control__indicator"></div>';
				html += '</label>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				$("#box-pos-doutorado").append(html);
		});

	})
</script>
@endsection