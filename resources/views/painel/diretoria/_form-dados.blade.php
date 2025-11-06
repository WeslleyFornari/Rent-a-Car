<h4>DADOS DE ACESSO</h4>

<div class="col-sm-6">
			<div class="form-group">
				
				 {!! Form::label('Nome','Nome:') !!}
       			 {!! Form::text('name',null,['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				 {!! Form::label('E-mail','E-mail:') !!}
       			 {!! Form::text('email',null,['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				 {!! Form::label('cargo','Cargo:') !!}
       			 {!! Form::text('cargo',@$associado->dados->cargo,['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label for="">Senha</label>
				<input type="password" name="password" class="form-control btn-flat" id="">
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label for="">Repetir</label>
				<input type="password" name="password_confirmation" class="form-control btn-flat" id="">
			</div>
		</div>
						 <div class="clearfix"></div>
						<h4>DADOS PESSOAIS</h4> 
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">CPF</label>
							    <input type="text" name="cpf" class="form-control btn-flat cpfMask" id="cpf" value="{{@$associado->dados->cpf}}">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Telefone</label>
							    <input type="text" name="telefone" class="form-control btn-flat telMask" id="telefone" value="{{@$associado->dados->telefone}}">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Data Nascimento</label>
							    <input type="text" class="form-control btn-flat dataMask" id="data de nascimento" value="{{@$associado->dados->data_nascimento}}" name="data_nascimento">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Profissão</label>
							    <input type="text" class="form-control btn-flat" name="profissao" value="{{@$associado->dados->profissao}}" >
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
							    <label for="">Sexo</label><br>
							    <div class="col-xs-6 p-left-0">
									<label class="control control--radio">Masculino
									    <input type="radio" name="sexo" value="M" class="flat-red" @if(@$associado->dados->sexo == 'M') checked="" @endif/>
									    <div class="control__indicator"></div>
									</label>
							    </div>
							  <div class="col-xs-6 p-right-0">
							  	 <label class="control control--radio">Feminino
							      <input type="radio" name="sexo" value="F" class="flat-red" @if(@$associado->dados->sexo == 'F') checked="" @endif/>
							      <div class="control__indicator"></div>
							    </label>
							  </div>
							   
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Tradição Religiosa</label>
							    <input type="text" class="form-control btn-flat" name="tradicao_religiosa" value="{{@$associado->dados->tradicao_religiosa}}">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">CV Lattes</label>
							    <input type="text" class="form-control btn-flat" name="cv_lattes" value="{{@$associado->dados->cv_lattes}}">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Site</label>
							    <input type="text" class="form-control btn-flat" name="website" value="{{@$associado->dados->website}}" >
							</div>
						</div>
						
						<hr class="clearfix">
						<h4>ENDEREÇO</h4>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">cep</label>
							    <input type="text" class="form-control btn-flat cepMask" id="cep" name="cep" value="{{@$associado->dados->cep}}">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Endereço</label>
							    <input type="text" class="form-control btn-flat" value="{{@$associado->dados->endereco}}" name="endereco" id="endereco">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Número</label>
							    <input type="number" class="form-control btn-flat" value="{{@$associado->dados->numero}}" name="numero" id="numero">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Complemento</label>
							    <input type="text" class="form-control btn-flat" value="{{@$associado->dados->complemento}}" name="complemento" id="complemento">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Bairro</label>
							    <input type="text" class="form-control btn-flat" value="{{@$associado->dados->bairro}}" name="bairro" id="bairro">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Cidade</label>
							    <input type="text" class="form-control btn-flat" value="{{@$associado->dados->cidade}}"  name="cidade" id="cidade">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">Estado</label>
							    <input type="text" class="form-control btn-flat" value="{{@$associado->dados->estado}}" name="estado" id="estado">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="">País</label>
							    <input type="text" class="form-control btn-flat" value="{{@$associado->dados->pais}}" name="pais" id="país">
							</div>
						</div>
						<hr class="clearfix">
						<h4>FORMAÇÃO & ESPECIALIDADES</h4>
						<div id="box-superior">
						<input type="hidden" name="total_superior" id="total_superior" value="1">
							<div class="col-sm-12 row_sup">
								<div class="col-sm-5 p-left-0">
									<div class="form-group">
										<label for="">Curso Superior em:</label>
										<input type="text" class="form-control btn-flat" name="curso_superior[1]">
									</div>
								</div>
								<div class="col-sm-4"><br>
									<div class="form-group m-top-sm">
									 	<label class="control control--radio">Cursando
										      <input type="radio" name="status_curso_superior[1]" class="flat-red" value="cursando" />
										      <div class="control__indicator"></div>
										</label>
										<label class="control control--radio">Concluído
										      <input type="radio" name="status_curso_superior[1]" class="flat-red" value="concluido"  />
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
						
							<div class="col-sm-5 p-left-0">
								<div class="form-group">
									<label for="">Pós-Graduação:</label>
									<input type="text" class="form-control btn-flat" name="pos_graduacao[1]">
								</div>
								</div>
							<div class="col-sm-4"><br>
								<div class="form-group m-top-sm">
										<label class="control control--radio">Cursando
									      <input type="radio" name="status_pos_graduacao[1]" class="flat-red" value="cursando"/>
									      <div class="control__indicator"></div>
									</label>
									<label class="control control--radio">Concluído
									      <input type="radio" name="status_pos_graduacao[1]" class="flat-red"  value="concluido"/>
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
						
							<div class="col-sm-5 p-left-0">
								<div class="form-group">
									<label for="">Mestrado em:</label>
									<input type="text" class="form-control btn-flat" name="mestrado[1]">
								</div>
								</div>
							<div class="col-sm-4"><br>
								<div class="form-group m-top-sm">
										<label class="control control--radio">Cursando
									      <input type="radio" name="status_mestrado[1]"  class="flat-red" value="cursando"/>
									      <div class="control__indicator"></div>
									</label>
									<label class="control control--radio">Concluído
									      <input type="radio" name="status_mestrado[1]" class="flat-red" value="concluido"/>
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
						
							<div class="col-sm-5 p-left-0">
								<div class="form-group">
									<label for="">Doutorado em:</label>
									<input type="text" class="form-control btn-flat" name="doutorado[1]">
								</div>
								</div>
							<div class="col-sm-4"><br>
								<div class="form-group m-top-sm">
										<label class="control control--radio">Cursando
									      <input type="radio" name="status_doutorado[1]" class="flat-red" value="cursando"/>
									      <div class="control__indicator"></div>
									</label>
									<label class="control control--radio">Concluído
									      <input type="radio" name="status_doutorado[1]" class="flat-red" value="concluido"/>
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
						
							<div class="col-sm-5 p-left-0">
								<div class="form-group">
									<label for="">Pós-Doutorado em:</label>
									<input type="text" class="form-control btn-flat" name="pos-doutorado[1]">
								</div>
								</div>
							<div class="col-sm-4"><br>
								<div class="form-group m-top-sm">
										<label class="control control--radio">Cursando
									      <input type="radio" name="status_pos-doutorado[1]" class="flat-red" value="cursando"/>
									      <div class="control__indicator"></div>
									</label>
									<label class="control control--radio">Concluído
									      <input type="radio" name="status_pos-doutorado[1]" class="flat-red" value="concluido"/>
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
											<input type="checkbox" name="especializacao_biblica_antigo_testamento[]" value="Antigo (Primeiro) Testamento" />
											<div class="control__indicator"></div>
										</label>
									
								</div>
								<div class="clearfix"></div>
								<div class="list-group">
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  		<label class="control control--checkbox">Pentateuco
											<input type="checkbox" name="especializacao_biblica_antigo_testamento[]" value="Pentateuco" />
											<div class="control__indicator"></div>
										</label>
								  </div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
									<label class="control control--checkbox">Obra Histórica Deuteronomista
											<input type="checkbox" name="especializacao_biblica_antigo_testamento[]" value="Obra Histórica Deuteronomista"/>
											<div class="control__indicator"></div>
										</label>
								  </div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
	<label class="control control--checkbox"> Literatura Histórica
											<input type="checkbox" name="especializacao_biblica_antigo_testamento[]" value="Literatura Histórica"/>
											<div class="control__indicator"></div>
										</label>
								 </div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Literatura Sapiencial
											<input type="checkbox"  name="especializacao_biblica_antigo_testamento[]" value="Literatura Sapiencial"/>
											<div class="control__indicator"></div>
										</label>
										</div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Literatura Poética
											<input type="checkbox"  name="especializacao_biblica_antigo_testamento[]" value="Literatura Poética"/>
											<div class="control__indicator"></div>
										</label>
										</div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Literatura Profética
											<input type="checkbox" name="especializacao_biblica_antigo_testamento[]" value="Literatura Profética"/>
											<div class="control__indicator"></div>
										</label>
										</div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Literatura Apocalíptica
											<input type="checkbox" name="especializacao_biblica_antigo_testamento[]" value="Literatura Apocalíptica"/>
											<div class="control__indicator"></div>
										</label></div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Literatura Apócrifa
											<input type="checkbox" name="especializacao_biblica_antigo_testamento[]" value="Literatura Apócrifa"/>
											<div class="control__indicator"></div>
										</label></div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Língua Hebraica Bíblica
											<input type="checkbox" name="especializacao_biblica_antigo_testamento[]" value="Língua Hebraica Bíblica"/>
											<div class="control__indicator"></div>
										</label></div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Septuaginta
											<input type="checkbox" name="especializacao_biblica_antigo_testamento[]" value="Septuaginta"/>
											<div class="control__indicator"></div>
										</label>
										</div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">História de Israel e Oriente Médio Antigo
											<input type="checkbox"  name="especializacao_biblica_antigo_testamento[]" value="História de Israel e Oriente Médio Antigo"/>
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
											<input type="checkbox"  name="especializacao_biblica_novo_testamento[]" value="Novo (Segundo) Testamento"/>
											<div class="control__indicator"></div>
										</label>
									
								</div>
								<div class="clearfix"></div>
								<div class="list-group">
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  		<label class="control control--checkbox">Evangelhos Sinóticos
											<input type="checkbox"  name="especializacao_biblica_novo_testamento[]" value="Evangelhos Sinóticos"/>
											<div class="control__indicator"></div>
										</label>
								  </div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
									<label class="control control--checkbox">Obra Lucana (Lucas e Atos)
											<input type="checkbox" name="especializacao_biblica_novo_testamento[]" value="Obra Lucana (Lucas e Atos)"/>
											<div class="control__indicator"></div>
										</label>
								  </div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
	<label class="control control--checkbox"> Literatura Histórica
											<input type="checkbox" name="especializacao_biblica_novo_testamento[]" value="Literatura Histórica"/>
											<div class="control__indicator"></div>
										</label>
								 </div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Literatura Joanina (Evangelho e Epístolas)
											<input type="checkbox" name="especializacao_biblica_novo_testamento[]" value="Literatura Joanina (Evangelho e Epístolas)"/>
											<div class="control__indicator"></div>
										</label>
										</div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Literatura Paulina
											<input type="checkbox" name="especializacao_biblica_novo_testamento[]" value="Literatura Paulina"/>
											<div class="control__indicator"></div>
										</label>
										</div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Literatura Deutero-Paulina
											<input type="checkbox" name="especializacao_biblica_novo_testamento[]" value="Literatura Deutero-Paulina"/>
											<div class="control__indicator"></div>
										</label>
										</div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Cartas Pastorais
											<input type="checkbox" name="especializacao_biblica_novo_testamento[]" value="Cartas Pastorais"/>
											<div class="control__indicator"></div>
										</label></div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Literatura Apocalíptica
											<input type="checkbox" name="especializacao_biblica_novo_testamento[]" value="Literatura Apocalíptica"/>
											<div class="control__indicator"></div>
										</label></div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Hebreus
											<input type="checkbox" name="especializacao_biblica_novo_testamento[]" value="Hebreus"/>
											<div class="control__indicator"></div>
										</label></div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Literatura Apócrifa
											<input type="checkbox" name="especializacao_biblica_novo_testamento[]" value="Literatura Apócrifa"/>
											<div class="control__indicator"></div>
										</label>
										</div>
								  <div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">Jesus Histórico
											<input type="checkbox" name="especializacao_biblica_novo_testamento[]" value="Jesus Histórico"/>
											<div class="control__indicator"></div>
										</label>
									</div>
									<div class="list-group-item p-left-sm p-top-xs p-bottom-0">
								  <label class="control control--checkbox">História das Origens Cristãs
											<input type="checkbox"  name="especializacao_biblica_novo_testamento[]" value="História das Origens Cristãs"/>
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
									      <input type="radio" name="docente" name="Sim" class="flat-red"/>
									      <div class="control__indicator"></div>
										</label>
									</div>
									<div class="col-sm-6 p-left-0">
										<label class="control control--radio">Não
									      <input type="radio" name="docente" value="Não" class="flat-red"  />
									      <div class="control__indicator"></div>
										</label>
									</div>
								
									
								
								

						

							</div>
								<div class="col-sm-4 ">
									<div class="form-group">
										<label for="">Disciplina(s) ministrada(s): </label>
										<input type="text" class="form-control btn-flat" name="diciplica_docente"  value="{{@$associado->dados->diciplica_docente}}">
									</div>
								</div>
								<div class="col-sm-4 ">
									<div class="form-group">
										<label for="">Instituição(ões) em que atua:</label>
										<input type="text" class="form-control btn-flat" name="instituicao_docente"  value="{{@$associado->dados->instituicao_docente}}">
									</div>
								</div>
								<div class="col-sm-4">
									<label for="">Pesquisador(a):</label><br>
									<div class="col-sm-6 p-left-0">
										<label class="control control--radio">Sim
									      <input type="radio" name="pesquisador" value="Sim" class="flat-red"/>
									      <div class="control__indicator"></div>
										</label>
									</div>
									<div class="col-sm-6 p-left-0">
										<label class="control control--radio">Não
									      <input type="radio" name="pesquisador" value="Não" class="flat-red"/>
									      <div class="control__indicator"></div>
										</label>
									</div>
							</div>
								<div class="col-sm-4 ">
									<div class="form-group">
										<label for="">Grupo de Pesquisa em que  atua:</label>
										<input type="text" class="form-control btn-flat" name='grupo_pesquisa' value="{{@$associado->dados->grupo_pesquisa}}">
									</div>
								</div>
								<div class="col-sm-4 ">
									<div class="form-group">
										<label for="">Instituição a qual está vinculado(a): </label>
										<input type="text" class="form-control btn-flat" name="instituicao_pesquisa"  value="{{@$associado->dados->instituicao_pesquisa}}">
									</div>
								</div>
								<hr>
								
								


								