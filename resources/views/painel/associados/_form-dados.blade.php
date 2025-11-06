<div class="form-group col-xs-12  ">
	
	<div class="col-sm-3">
		<label >Status</label>         
		<select name="status_associado" class="form-control btn-flat"id="">
			<option  value="1" @if(@$associado->dados->status_associado == '1') selected="" @endif>Ativo</option>
			<option value="2" @if(@$associado->dados->status_associado == '2') selected="" @endif>Pendente</option>
			<option value="3" @if(@$associado->dados->status_associado == '3') selected="" @endif>Inativo</option><option value="4" @if(@$associado->dados->status_associado == '4') selected="" @endif>Em Análise</option>
		</select>
	</div>
		<div class="col-sm-3">
		<label >Perfil</label>         
		<select name="role" class="form-control btn-flat" id="">
			<option value="user" @if(@$associado->role == 'user') selected="" @endif>Associado</option>
			<option value="admin" @if(@$associado->role == 'admin') selected="" @endif>Administrador</option>
			<option value="diretoria" @if(@$associado->role == 'diretoria') selected="" @endif>Diretoria</option>
		</select>
	</div>

	<div class="clearfix"></div>
	<div class="col-sm-6 p-top-md">
		<div class="form-group">
		<label  class="p-top-sm"><input type="checkbox" name="email_autorizacao" class="flat-red" value="1" id=""> Enviar e-mail com solicitação de faturamento</label>
		</div>
		
		
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="">Selecione o modelo do e-mail</label>
			<select name="modelo_email" id="" required="" class="form-control" disabled="">
			<option value=""></option>
				<option value="faturamento">Novo Associado</option>
				<option value="cobranca-recorrente">Anuidade</option>
			</select>
		</div>
	</div>

	<div class="clearfix"></div> 
	<h4>DADOS DE ACESSO</h4>

	<div class="col-sm-2">
		<div class="form-group">
			{!! Form::label('Nº','Nº Associado:') !!}
			{!! Form::text('numero_associado',@$associado->dados->numero_associado,['class'=>'form-control']) !!}
		</div>
	</div><div class="col-sm-3">
		<div class="form-group">
			{!! Form::label('Nome','Nome:') !!}
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			{!! Form::label('E-mail','E-mail:') !!}
			{!! Form::text('email',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<label >Senha</label>
			<input type="password" name="password" class="form-control btn-flat" id="">
		</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<label >Repetir</label>
			<input type="password" name="password_confirmation" class="form-control btn-flat" id="">
		</div>
	</div>
	
	<h4>DADOS PESSOAIS</h4>
	<div class="col-sm-3">
		<div class="form-group">
			<label >CPF</label>
			<input type="text" name="cpf" class="form-control btn-flat cpfMask" id="" value="{{@$associado->dados->cpf}}">
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label >Telefone</label>
			<input type="text" name="telefone" class="form-control btn-flat telMask" id="telefone" value="{{@$associado->dados->telefone}}">
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label >Data Nascimento</label>
			<input type="text" class="form-control btn-flat dataMask" id="" value="{{@$associado->dados->data_nascimento}}" name="data_nascimento">
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label >Profissão</label>
			<input type="text" class="form-control btn-flat" name="profissao" value="{{@$associado->dados->profissao}}" >
		</div>
	</div>
	<div class="col-sm-6">
		
		<div class="form-group">
			<label >Sexo</label><br>
			<div class="col-xs-6 p-left-0">
				<label class="">Masculino
					<input type="radio" name="sexo" value="M" class="flat-red" @if(@$associado->dados->sexo == 'M') checked="" @endif/>
					
				</label>
			</div>
			<div class="col-xs-6 p-right-0">
				<label class="">Feminino
					<input type="radio" name="sexo" value="F" class="flat-red"  @if(@$associado->dados->sexo == 'F') checked="" @endif/>
					
				</label>
			</div>
			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label >Tradição Religiosa</label>
			<input type="text" class="form-control btn-flat" name="tradicao_religiosa" value="{{@$associado->dados->tradicao_religiosa}}">
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label >CV Lattes</label>
			<input type="text" class="form-control btn-flat" name="cv_lattes" value="{{@$associado->dados->cv_lattes}}">
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label >Site</label>
			<input type="text" class="form-control btn-flat" name="website" value="{{@$associado->dados->website}}" >
		</div>
	</div>
	
	<hr class="clearfix">
	<h4>ENDEREÇO</h4>
	<div class="col-sm-3">
		<div class="form-group">
			<label >cep</label>
			<input type="text" class="form-control btn-flat cepMask" id="cep" name="cep" value="{{@$associado->dados->cep}}">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label >Endereço</label>
			<input type="text" class="form-control btn-flat" id="endereco" value="{{@$associado->dados->endereco}}" name="endereco">
		</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<label >Número</label>
			<input type="number" class="form-control btn-flat" id="numero" value="{{@$associado->dados->numero}}" name="numero">
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label >Complemento</label>
			<input type="text" class="form-control btn-flat" id="complemento" value="{{@$associado->dados->complemento}}" name="complemento">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label >Bairro</label>
			<input type="text" class="form-control btn-flat" id="bairro" value="{{@$associado->dados->bairro}}" name="bairro">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label >Cidade</label>
			<input type="text" class="form-control btn-flat" id="cidade" value="{{@$associado->dados->cidade}}"  name="cidade">
		</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<label >Estado</label>
			<input type="text" class="form-control btn-flat" id="estado" value="{{@$associado->dados->estado}}" name="estado">
		</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<label >País</label>
			<input type="text" class="form-control btn-flat" id="país" value="{{@$associado->dados->pais}}" name="pais">
		</div>
	</div>
	<hr class="clearfix">
	
	<h4>FORMAÇÃO & ESPECIALIDADES</h4>
	
	@foreach($associado->formacao as $key => $value)
		@include('includes.inc_formcao_especializacao')
	@endforeach
	<div class="clearfix"></div>
	<div class="col-sm-12">
		<label >Área Bíblica de Especialização</label>
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
						<input type="checkbox" class="flat-red" @if(@$associado->especializacaoAntigoTestamento->pentateuco == '1') checked="" @endif  name="pentateuco" value="1" />

						
					</label>
				</div>
				<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
					<label class="control control--checkbox">Obra Histórica Deuteronomista
						<input type="checkbox" @if(@$associado->especializacaoAntigoTestamento->obra_historica_deuteronomista == '1') checked="" @endif  class="flat-red"  name="obra_historica_deuteronomista" value="1" />

						
					</label>
				</div>
				<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
					<label class="control control--checkbox"> Literatura Histórica
						<input type="checkbox" class="flat-red" @if(@$associado->especializacaoAntigoTestamento->literatura_historica_primeiro == '1') checked="" @endif   name="literatura_historica_primeiro" value="1" />

						
					</label>
				</div>
				<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
					<label class="control control--checkbox">Literatura Sapiencial
						<input type="checkbox" class="flat-red" @if(@$associado->especializacaoAntigoTestamento->literatura_sapiencial == '1') checked="" @endif   name="literatura_sapiencial" value="1" />

						
					</label>
				</div>
				<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
					<label class="control control--checkbox">Literatura Poética
						<input type="checkbox" class="flat-red"  @if(@$associado->especializacaoAntigoTestamento->literatura_poetica == '1') checked="" @endif  name="literatura_poetica" value="1" />

						
					</label>
				</div>

				<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
					<label class="control control--checkbox">Literatura Profética
						<input type="checkbox" class="flat-red" @if(@$associado->especializacaoAntigoTestamento->literatura_profetica == '1') checked="" @endif  name="literatura_profetica" value="1" />

						
					</label>
				</div>
				<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
					<label class="control control--checkbox">Literatura Apocalíptica
						<input type="checkbox" class="flat-red"  @if(@$associado->especializacaoAntigoTestamento->literatura_apocaliptica == '1') checked="" @endif  name="literatura_apocaliptica" value="1" />

						
					</label></div>
					<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
						<label class="control control--checkbox">Literatura Apócrifa
							<input type="checkbox" class="flat-red" @if(@$associado->especializacaoAntigoTestamento->literatura_apocrifa == '1') checked="" @endif   name="literatura_apocrifa" value="1" />

							
						</label></div>
						<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
							<label class="control control--checkbox">Língua Hebraica Bíblica
								<input type="checkbox" class="flat-red" @if(@$associado->especializacaoAntigoTestamento->lingua_hebraica_biblica == '1') checked="" @endif  name="lingua_hebraica_biblica" value="1" />

								
							</label></div>
							<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								<label class="control control--checkbox">Septuaginta
									<input type="checkbox" class="flat-red"  @if(@$associado->especializacaoAntigoTestamento->septuaginta == '1') checked="" @endif name="septuaginta" value="1" />

									
								</label>
							</div>
							<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								<label class="control control--checkbox">História de Israel e Oriente Médio Antigo
									<input type="checkbox" class="flat-red"  name="historia_de_israel_e_oriente_medio_antigo"  @if(@$associado->especializacaoAntigoTestamento->historia_de_israel_e_oriente_medio_antigo == '1') checked="" @endif value="1" />

									
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
									<input type="checkbox" class="flat-red" @if(@$associado->especializacaoNovoTestamento->evangelhos_sinoticos == '1') checked="" @endif  name="evangelhos_sinoticos" value="1" />

									
									
								</label>
							</div>
							<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								<label class="control control--checkbox">Obra Lucana (Lucas e Atos)
									<input type="checkbox" class="flat-red" @if(@$associado->especializacaoNovoTestamento->obra_lucana_lucas_e_atos == '1') checked="" @endif  name="obra_lucana_lucas_e_atos" value="1" />

								</label>
							</div>
							<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								<label class="control control--checkbox"> Literatura Histórica
									<input type="checkbox" class="flat-red"  @if(@$associado->especializacaoNovoTestamento->literatura_historica_segundo == '1') checked="" @endif name="literatura_historica_segundo" value="1" />

									
								</label>
							</div>
							<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								<label class="control control--checkbox">Literatura Joanina (Evangelho e Epístolas)
									<input type="checkbox" class="flat-red"  name="literatura_joanina_evangelho_e_epistolas" @if(@$associado->especializacaoNovoTestamento->literatura_joanina_evangelho_e_epistolas == '1') checked="" @endif value="1" />

									
								</label>
							</div>
							<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								<label class="control control--checkbox">Literatura Paulina
									<input type="checkbox" class="flat-red"  @if(@$associado->especializacaoNovoTestamento->literatura_paulina == '1') checked="" @endif  name="literatura_paulina" value="1" />

									
								</label>
							</div>
							<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								<label class="control control--checkbox">Literatura Deutero-Paulina
									<input type="checkbox" class="flat-red" @if(@$associado->especializacaoNovoTestamento->literatura_deutero_paulina == '1') checked="" @endif name="literatura_deutero_paulina" value="1" />

									
								</label>
							</div>
							<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								<label class="control control--checkbox">Cartas Pastorais
									<input type="checkbox" class="flat-red" @if(@$associado->especializacaoNovoTestamento->cartas_pastorais == '1') checked="" @endif  name="cartas_pastorais" value="1" />

									
								</label></div>
								<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
									<label class="control control--checkbox">Literatura Apocalíptica
										<input type="checkbox" class="flat-red" @if(@$associado->especializacaoNovoTestamento->literatura_apocaliptica == '1') checked="" @endif  name="literatura_apocaliptica" value="1" />

										
									</label></div>
									<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
										<label class="control control--checkbox">Hebreus
											<input type="checkbox" class="flat-red" @if(@$associado->especializacaoNovoTestamento->hebreus == '1') checked="" @endif  name="hebreus" value="1" />

											
										</label></div>
										<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
											<label class="control control--checkbox">Literatura Apócrifa
												<input type="checkbox" class="flat-red"  @if(@$associado->especializacaoNovoTestamento->literatura_apocrifa == '1') checked="" @endif  name="literatura_apocrifa" value="1" />

											</label>
										</div>
										<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
											<label class="control control--checkbox">Jesus Histórico
												<input type="checkbox" class="flat-red" @if(@$associado->especializacaoNovoTestamento->jesus_historico == '1') checked="" @endif   name="jesus_historico" value="1" />
												
											</label>
										</div>
										<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
											<label class="control control--checkbox">História das Origens Cristãs
												<input type="checkbox" class="flat-red"  @if(@$associado->especializacaoNovoTestamento->historia_das_origens_cristas == '1') checked="" @endif  name="historia_das_origens_cristas" value="1" />
											</label>
										</div>
									</div>
									
								</div>

							</div>
							<div class="clearfix"></div>
							<h4>ATUAÇÃO PROFISSIONAL</h4>
							<div class="col-sm-4">
								
								
								
								<label >Docente:</label><br>
								<div class="col-sm-6 p-left-0">
									<label class="">Sim
										<input type="radio" name="docente" @if(@$associado->dados->docente == 'Sim') checked="" @endif name="Sim" class="flat-red"/>
										
									</label>
								</div>
								<div class="col-sm-6 p-left-0">
									<label class="">Não
										<input type="radio" name="docente"  @if(@$associado->dados->docente == 'Não') checked="" @endif value="Não" class="flat-red"  />
										
									</label>
								</div>
								
								
								
								

								

							</div>
							<div class="col-sm-4 ">
								<div class="form-group">
									<label >Disciplina(s) ministrada(s): </label>
									<input type="text" class="form-control btn-flat" name="diciplica_docente"  value="{{@$associado->dados->diciplica_docente}}">
								</div>
							</div>
							<div class="col-sm-4 ">
								<div class="form-group">
									<label >Instituição(ões) em que atua:</label>
									<input type="text" class="form-control btn-flat" name="instituicao_docente"  value="{{@$associado->dados->instituicao_docente}}">
								</div>
							</div>
							<div class="col-sm-4">
								<label >Pesquisador(a):</label><br>
								<div class="col-sm-6 p-left-0">
									<label class="">Sim
										<input type="radio" @if(@$associado->dados->pesquisador == 'Sim') checked="" @endif   name="pesquisador" value="Sim" class="flat-red"/>
										
									</label>
								</div>
								<div class="col-sm-6 p-left-0">
									<label class="">Não
										<input type="radio" @if(@$associado->dados->pesquisador == 'Não') checked="" @endif  name="pesquisador" value="Não" class="flat-red"/>
										
									</label>
								</div>
							</div>
							<div class="col-sm-4 ">
								<div class="form-group">
									<label >Grupo de Pesquisa em que  atua:</label>
									<input type="text" class="form-control btn-flat" name='grupo_pesquisa' value="{{@$associado->dados->grupo_pesquisa}}">
								</div>
							</div>
							<div class="col-sm-4 ">
								<div class="form-group">
									<label >Instituição a qual está vinculado(a): </label>
									<input type="text" class="form-control btn-flat" name="instituicao_pesquisa"  value="{{@$associado->dados->instituicao_pesquisa}}">
								</div>
							</div>
							
							
							


							