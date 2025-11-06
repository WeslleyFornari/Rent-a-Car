{!! Form::model($user,['route'=>['minha-conta.update-cadastro',$user->id],'class'=>'']) !!}

<h4>DADOS PESSOAIS</h4>
<div class="col-sm-3">
	<div class="form-group">
		<label for="">Nº Associado</label><br>
		{{@$user->dados->numero_associado}}
	</div>
</div>
<div class="col-sm-6">
	<div class="form-group">
		<label for="">Nome Completo</label>
		<input type="text" name="name" class="form-control btn-flat" id="" value="{{@$user->name}}">
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label for="">CPF</label>
		<input type="text" name="cpf" class="form-control btn-flat cpfMask" id="" value="{{@$user->dados->cpf}}">
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label for="">Telefone</label>
		<input type="text" name="telefone" class="form-control btn-flat telMask"  value="{{@$user->dados->telefone}}">
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label for="">Data Nascimento</label>
		<input type="text" class="form-control btn-flat dataMask"  value="{{@$user->dados->data_nascimento}}" name="data_nascimento">
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label for="">Profissão</label>
		<input type="text" class="form-control btn-flat" name="profissao" value="{{@$user->dados->profissao}}" >
	</div>
</div>
<div class="col-sm-6">
	<div class="form-group clearfix">
		<label for="">Sexo</label><br>
		<div class="col-xs-6 p-left-0">
			<label class="control control--radio">Masculino
				<input type="radio" name="sexo" value="M" @if(@$user->dados->sexo == "M") checked="" @endif />
				<div class="control__indicator"></div>
			</label>
		</div>
		<div class="col-xs-6 p-right-0">
			<label class="control control--radio">Feminino
				<input type="radio" name="sexo" value="F" @if(@$user->dados->sexo == "F") checked="" @endif/>
				<div class="control__indicator"></div>
			</label>
		</div>

	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label for="">Tradição Religiosa</label>
		<input type="text" class="form-control btn-flat" name="tradicao_religiosa" value="{{@$user->dados->tradicao_religiosa}}">
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label for="">CV Lattes</label>
		<input type="text" class="form-control btn-flat" name="cv_lattes" value="{{@$user->dados->cv_lattes}}">
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label for="">Site</label>
		<input type="text" class="form-control btn-flat" name="website" value="{{@$user->dados->website}}" >
	</div>
</div>

<hr>
<h4>ENDEREÇO</h4>
<div class="col-sm-3">
	<div class="form-group">
		<label for="">Cep *</label> <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank"><small>Não sei meu cep:</small></a>
		<input type="text" class="form-control btn-flat cepMask" id="cep" name="cep" value="{{@$user->dados->cep}}">
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group">
		<label for="">Endereço</label>
		<input type="text" class="form-control btn-flat" value="{{@$user->dados->endereco}}" name="endereco">
	</div>
</div>
<div class="col-sm-2">
	<div class="form-group">
		<label for="">Número</label>
		<input type="number" class="form-control btn-flat" value="{{@$user->dados->numero}}" name="numero">
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label for="">Complemento</label>
		<input type="text" class="form-control btn-flat"value="{{@$user->dados->complemento}}" name="complemento">
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group">
		<label for="">Bairro</label>
		<input type="text" class="form-control btn-flat" value="{{@$user->dados->bairro}}" name="bairro">
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group">
		<label for="">Cidade</label>
		<input type="text" class="form-control btn-flat" value="{{@$user->dados->cidade}}"  name="cidade">
	</div>
</div>
<div class="col-sm-2">
	<div class="form-group">
		<label for="">Estado</label>
		<input type="text" class="form-control btn-flat" value="{{@$user->dados->estado}}" name="estado">
	</div>
</div>
<div class="col-sm-2">
	<div class="form-group">
		<label for="">País</label>
		<input type="text" class="form-control btn-flat" value="{{@$user->dados->pais}}" name="pais">
	</div>
</div>
<hr>
<h4>FORMAÇÃO & ESPECIALIDADES</h4>
<div id="box-superior">

	@if(count(@$superior) > 0)

	@foreach (@$superior as $key => $formacao)

	<div class="col-sm-12 row_sup">
		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Curso Superior em:</label>
				<input type="text" class="form-control btn-flat" name="curso_superior[{{$key}}]" value="{{$formacao['curso']}}">
			</div>
		</div>
		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Instituição de Ensino:</label>
				<input type="text" class="form-control btn-flat" name="instituicao_superior[{{$key}}]" value="{{$formacao['instituicao']}}">
			</div>
		</div>
		<div class="col-sm-3"><br>
			<div class="form-group m-top-sm">
				<label class="">Cursando
					<input type="radio" name="status_curso_superior[{{$key}}]" @if($formacao['status']== 'Cursando') checked="" @endif class="minimal" value="Cursando" />

				</label>
				<label class="">Concluído
					<input type="radio" name="status_curso_superior[{{$key}}]" @if($formacao['status']== 'Concluído') checked="" @endif class="minimal" value="Concluído"  />

				</label>
			</div>
		</div>
		@if($key == 0)
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddSuperior"><i class="fa fa-plus"></i> Adicionar Formação</a>
		</div>
		@elseif ($key > 0)
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-danger removerCurso" ><i class="fa fa-minus"></i> Remover</a>
		</div>
		@endif
	</div>
	@endforeach
	@else
	<div class="col-sm-12 row_sup">
		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Curso Superior em:</label>
				<input type="text" class="form-control btn-flat" name="curso_superior[0]" value="">
			</div>
		</div>
		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Instituição de Ensino:</label>
				<input type="text" class="form-control btn-flat" name="instituicao_superior[0]" value="">
			</div>
		</div>
		<div class="col-sm-3"><br>
			<div class="form-group m-top-sm">
				<label class="">Cursando
					<input type="radio" name="status_curso_superior[0]" class="minimal" value="Cursando" />

				</label>
				<label class="">Concluído
					<input type="radio" name="status_curso_superior[0]" class="minimal" value="Concluído"  />

				</label>
			</div>
		</div>

		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddSuperior"><i class="fa fa-plus"></i> Adicionar Formação</a>
		</div>

	</div>
	@endif

</div>
<div id="box-pos">
	<input type="hidden" name="total_pos" id="total_pos" value="1">
	@if(count($pos_graduacao) > 0)

	@foreach ($pos_graduacao as $key => $formacao)
	<div class="col-sm-12 row_pos">

		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Pós-Graduação:</label>
				<input type="text" class="form-control btn-flat" name="pos_graduacao[{{$key}}]" value="{{$formacao['curso']}}">
			</div>
		</div>

		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Instituição de Ensino:</label>
				<input type="text" class="form-control btn-flat" name="instituicao_pos[{{$key}}]" value="{{$formacao['instituicao']}}">
			</div>
		</div>
		<div class="col-sm-3"><br>
			<div class="form-group m-top-sm">
				<label class="">Cursando
					<input type="radio" name="status_pos_graduacao[{{$key}}]" class="minimal" value="Cursando" @if($formacao['status']== 'Cursando') checked="" @endif/> 
				</label>
				<label class="">Concluído
					<input type="radio" name="status_pos_graduacao[{{$key}}]" class="minimal"  value="Concluído" @if($formacao['status']== 'Concluído') checked="" @endif />

				</label>
			</div>
		</div>

		@if($key == 0)
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddPos"><i class="fa fa-plus"></i> Adicionar Formação</a>
		</div>
		@elseif ($key > 0)
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-danger removerCurso" ><i class="fa fa-minus"></i> Remover</a>
		</div>
		@endif


	</div>

	@endforeach

	@else
	<div class="col-sm-12 row_pos">

		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Pós-Graduação:</label>
				<input type="text" class="form-control btn-flat" name="pos_graduacao[0]">
			</div>
		</div>
		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Instituição de Ensino:</label>
				<input type="text" class="form-control btn-flat" name="instituicao_pos[0]" >
			</div>
		</div>
		<div class="col-sm-3"><br>
			<div class="form-group m-top-sm">
				<label class="">Cursando
					<input type="radio" name="status_pos_graduacao[0]" class="minimal" value="cursando"/>

				</label>
				<label class="">Concluído
					<input type="radio" name="status_pos_graduacao[0]" class="minimal"  value="concluido"/>

				</label>
			</div>
		</div>
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddPos"><i class="fa fa-plus"></i> Adicionar Formação</a>
		</div>
	</div>
	@endif

</div>

<div id="box-mestrado">
	<input type="hidden" name="total_mestrado" id="total_mestrado" value="1">
	@if(count($mestrado) > 0)

	@foreach ($mestrado as $key => $formacao)

	<div class="col-sm-12 row_mestrado">

		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Mestrado em:</label>
				<input type="text" class="form-control btn-flat" name="mestrado[{{$key}}]" value="{{$formacao['curso']}}">
			</div>
		</div>

		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Instituição de Ensino:</label>
				<input type="text" class="form-control btn-flat" name="instituicao_mestrado[{{$key}}]" value="{{$formacao['instituicao']}}" >
			</div>
		</div>
		<div class="col-sm-3"><br>
			<div class="form-group m-top-sm">
				<label class="">Cursando
					<input type="radio" name="status_mestrado[{{$key}}]" class="minimal" value="Cursando" @if($formacao['status']== 'Cursando') checked="" @endif/>

				</label>
				<label class="">Concluído
					<input type="radio" name="status_mestrado[{{$key}}]" class="minimal" value="Concluído" @if($formacao['status']== 'Concluído') checked="" @endif/>

				</label>
			</div>
		</div>


		@if($key == 0)
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddMestrado"><i class="fa fa-plus"></i> Adicionar Formação</a>
		</div>
		@elseif ($key > 0)
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-danger removerCurso" ><i class="fa fa-minus"></i> Remover</a>
		</div>
		@endif

	</div>
	@endforeach
	@else
	<div class="col-sm-12 row_mestrado">

		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Mestrado em:</label>
				<input type="text" class="form-control btn-flat" name="mestrado[0]" value="">
			</div>
		</div>
		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Instituição de Ensino:</label>
				<input type="text" class="form-control btn-flat" name="instituicao_mestrado[0]" value="" >
			</div>
		</div>
		<div class="col-sm-3"><br>
			<div class="form-group m-top-sm">
				<label class="">Cursando
					<input type="radio" name="status_mestrado[0]"  class="minimal" value="cursando"/>

				</label>
				<label class="">Concluído
					<input type="radio" name="status_mestrado[0]" class="minimal" value="concluido"/>

				</label>
			</div>
		</div>
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddMestrado"><i class="fa fa-plus"></i> Adicionar Formação</a>
		</div>
	</div>
	@endif
</div>
<div id="box-doutorado">
	<input type="hidden" name="total_doutorado" id="total_doutorado" value="1">
	@if(count($doutorado) > 0)

	@foreach ($doutorado as $key => $formacao)
	<div class="col-sm-12 row_doutorado">

		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Doutorado em:</label>
				<input type="text" class="form-control btn-flat" name="doutorado[{{$key}}]" value="{{$formacao['curso']}}">
			</div>
		</div>
		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Instituição de Ensino:</label>
				<input type="text" class="form-control btn-flat" name="instituicao_doutorado[{{$key}}]" value="{{$formacao['instituicao']}}" >
			</div>
		</div>
		<div class="col-sm-3"><br>
			<div class="form-group m-top-sm">
				<label class="">Cursando
					<input type="radio" name="status_doutorado[{{$key}}]" class="minimal" value="Cursando" @if($formacao['status']== 'Cursando') checked="" @endif/>

				</label>
				<label class="">Concluído
					<input type="radio" name="status_doutorado[{{$key}}]" class="minimal" value="Concluído" @if($formacao['status']== 'Concluído') checked="" @endif/>

				</label>
			</div>
		</div>

		@if($key == 0)
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddDoutorado"><i class="fa fa-plus"></i> Adicionar Formação</a>
		</div>
		@elseif ($key > 0)
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-danger removerCurso" ><i class="fa fa-minus"></i> Remover</a>
		</div>
		@endif

	</div>
	@endforeach

	@else
	<div class="col-sm-12 row_doutorado">

		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Doutorado em:</label>
				<input type="text" class="form-control btn-flat" name="doutorado[0]">
			</div>
		</div>
		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Instituição de Ensino:</label>
				<input type="text" class="form-control btn-flat" name="instituicao_doutorado[0]" value="" >
			</div>
		</div>
		<div class="col-sm-3"><br>
			<div class="form-group m-top-sm">
				<label class="">Cursando
					<input type="radio" name="status_doutorado[0]" class="minimal" value="Cursando"/>

				</label>
				<label class="">Concluído
					<input type="radio" name="status_doutorado[0]" class="minimal" value="Concluído"/>

				</label>
			</div>
		</div>
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddDoutorado"><i class="fa fa-plus"></i> Adicionar Formação</a>
		</div>
	</div>
	@endif
</div>
<div id="box-pos-doutorado">
	<input type="hidden" name="total_pos-doutorado" id="total_pos-doutorado" value="1">
	@if(count($pos_doutorado) > 0)

	@foreach ($pos_doutorado as $key => $formacao)
	<div class="col-sm-12 row_pos-doutorado">

		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Pós-Doutorado em:</label>
				<input type="text" class="form-control btn-flat" name="pos-doutorado[{{$key}}]" value="{{$formacao['curso']}}">
			</div>
		</div>
		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Instituição de Ensino:</label>
				<input type="text" class="form-control btn-flat" name="instituicao_pos_doutorado[{{$key}}]" value="{{$formacao['instituicao']}}" >
			</div>
		</div>
		<div class="col-sm-3"><br>
			<div class="form-group m-top-sm">
				<label class="">Cursando
					<input type="radio" name="status_pos-doutorado[{{$key}}]" class="minimal" value="Cursando" @if($formacao['status']== 'Cursando') checked="" @endif/>

				</label>
				<label class="">Concluído
					<input type="radio" name="status_pos-doutorado[{{$key}}]" class="minimal" value="Concluído" @if($formacao['status']== 'Concluído') checked="" @endif/>

				</label>
			</div>
		</div>

		@if($key == 0)
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddpos-doutorado"><i class="fa fa-plus"></i> Adicionar Formação</a>
		</div>
		@elseif ($key > 0)
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-danger removerCurso" ><i class="fa fa-minus"></i> Remover</a>
		</div>
		@endif

	</div>
	@endforeach
	@else
	<div class="col-sm-12 row_pos-doutorado">

		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Pós-Doutorado em:</label>
				<input type="text" class="form-control btn-flat" name="pos-doutorado[0]">
			</div>
		</div>

		<div class="col-sm-3 p-left-0">
			<div class="form-group">
				<label for="">Instituição de Ensino:</label>
				<input type="text" class="form-control btn-flat" name="instituicao_pos_doutorado[0]" >
			</div>
		</div>
		<div class="col-sm-3"><br>
			<div class="form-group m-top-sm">
				<label class="">Cursando
					<input type="radio" name="status_pos-doutorado[0]" class="minimal" value="cursando"/>

				</label>
				<label class="">Concluído
					<input type="radio" name="status_pos-doutorado[0]" class="minimal" value="concluido"/>

				</label>
			</div>
		</div>
		<div class="col-sm-3" >
			<div class="clear hidden-xs m-top-lg" ></div>
			<a href="" class="btn btn-xs btn-flat btn-primary" id="btAddpos-doutorado"><i class="fa fa-plus"></i> Adicionar Formação</a>
		</div>
	</div>
	@endif
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
									<input type="radio" name="docente" value="Sim" @if(@$user->dados->docente == 'Sim') checked @endif />
									<div class="control__indicator"></div>
								</label>
							</div>
							<div class="col-sm-6 p-left-0">
								<label class="control control--radio">Não
									<input type="radio" name="docente" @if(@$user->dados->docente == 'Não') checked @endif value="Não"  />
									<div class="control__indicator"></div>
								</label>
							</div>
						</div>
						<div class="col-sm-4 ">
							<div class="form-group">
								<label for="">Disciplina(s) ministrada(s): </label>
								<input type="text" class="form-control btn-flat" name="diciplica_docente"  value="{{@$user->dados->diciplica_docente}}">
							</div>
						</div>
						<div class="col-sm-4 ">
							<div class="form-group">
								<label for="">Instituição(ões) em que atua:</label>
								<input type="text" class="form-control btn-flat" name="instituicao_docente"  value="{{@$user->dados->instituicao_docente}}">
							</div>
						</div>
						<div class="col-sm-4">
							<label for="">Pesquisador(a):</label><br>
							<div class="col-sm-6 p-left-0">
								<label class="control control--radio">Sim
									<input type="radio" name="pesquisador" value="Sim"  @if(@$user->dados->pesquisador == 'Sim') checked @endif  />
									<div class="control__indicator"></div>
								</label>
							</div>
							<div class="col-sm-6 p-left-0">
								<label class="control control--radio">Não
									<input type="radio" name="pesquisador" @if(@$user->dados->pesquisador == 'Não') checked @endif value="Não" />
									<div class="control__indicator"></div>
								</label>
							</div>
						</div>
						<div class="col-sm-4 ">
							<div class="form-group">
								<label for="">Grupo de Pesquisa em que  atua:</label>
								<input type="text" class="form-control btn-flat" name='grupo_pesquisa' value="{{@$user->dados->grupo_pesquisa}}">
							</div>
						</div>
						<div class="col-sm-4 ">
							<div class="form-group">
								<label for="">Instituição a qual está vinculado(a): </label>
								<input type="text" class="form-control btn-flat" name="instituicao_pesquisa"  value="{{@$user->dados->instituicao_pesquisa}}">
							</div>
						</div>
						<hr>

						<div class="clearfix"></div>
						<div class="col-sm-4 pull-right">
							<button type="submit" class="btn btn-success btn-block btn-flat"  id="btAvancar" >ATUALIZAR</button>
						</div>


						{!!Form::close()!!}			