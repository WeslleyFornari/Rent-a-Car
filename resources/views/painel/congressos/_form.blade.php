<div class="col-sm-8">
	<div class="form-group col-xs-12 ">
              <label for="">Status</label><div class="clearfix"></div>
              <div class="col-xs-3">
                <label>
                  <input type="radio" name="status"  value="1" class="flat-red" @if(@$congresso->status == '1') checked="" @endif > Ativo
                </label>
              </div>
              <div class="col-xs-3">
                <label>
                  <input type="radio" name="status"  value="3" class="flat-red" @if(@$congresso->status == '3') checked="" @endif >
                  Inativo
                </label>
              </div>
            </div>
	<div class="col-sm-8">
		<div class="form-group">
			{!! Form::label('titulo','Título:') !!}
			{!! Form::text('titulo',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">

			{!! Form::label('ano_edicao','Ano Edição:') !!}
			{!! Form::text('ano_edicao',date('Y'),['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-xs-12 fr-view">
		{!! Form::label('texto','Introdução:') !!}
		<textarea name="texto" class="froala-editor" cols="30" rows="10">{{@$congresso->texto}}</textarea>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix "></div>
	<div class="col-xs-12 fr-view m-top-lg">
		{!! Form::label('programacao','Programação:') !!}
		<textarea name="programacao" id="programacao" class="froala-editor" >{{@$congresso->programacao}}</textarea>
	</div>
	<div class="clearfix "></div>
	<div class="col-xs-12 fr-view m-top-lg">
		{!! Form::label('data_horario','Data e Horário:') !!}
		<textarea name="data_horario" class="froala-editor" cols="30" rows="10">{{@$congresso->data_horario}}
		</textarea>
	</div>
	<div class="col-xs-12 m-top-lg">
		<h4>Conferencistas</h4>

		<div class="box box-default col-xs-12 m-top-md">
			<div class="box-header with-border">
				<i class="fa fa-book"></i>

				<h3 class="box-title">Lista</h3>
				<div class="pull-right p-all-0">
					<a href="" target="_blank" data-toggle="modal" data-target="#novoCongressista" class="btn btn-primary btn-xs btn-flat">Cadastrar Conferencistas</a>
				</div>
			</div>
			<!-- /.box-header -->

			<table class="table box-body" id="tableConferencistas">
			<thead>
				<tr>
					<th style="width: 50px;">Foto</th>
					<th>Nome</th>                   
					<th>Selecionar</th>                   
					<th class="col-xs-2">Ações</th>
				</tr>
			</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<!-- /.box-body -->
		</div>
	</div>
	<div class="col-xs-12 m-top-lg">
		<h4>Local</h4>
				<div class="form-group col-xs-12 p-left-0">
                  {!! Form::label('nome_local','Local:') !!}
                  {!! Form::text('nome_local',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-xs-4 p-left-0">
                  {!! Form::label('cep','Cep:') !!}
                  {!! Form::text('cep',null,['class'=>'form-control cepMask']) !!}
                </div>
                <div class="form-group col-xs-6">
                  {!! Form::label('endereco','Endereço:') !!}
                  {!!Form::text('endereco',null,['class'=>'form-control','id'=>'endereco']) !!}
                </div>
                <div class="form-group col-xs-2  p-right-0">
                  {!! Form::label('numero','Número:') !!}
                  {!! Form::text('numero',null,['class'=>'form-control','id'=>'']) !!}
                </div>
                <div class="form-group col-xs-3 p-left-0">
                    {!! Form::label('complemento','Complemento:') !!}
                  {!! Form::text('complemento',null,['class'=>'form-control','id'=>'']) !!}
                </div>
                <div class="form-group col-xs-3 ">
                   {!! Form::label('bairro','Bairro:') !!}
                  {!! Form::text('bairro',null,['class'=>'form-control','id'=>'bairro']) !!}
                </div>
                 <div class="form-group col-xs-4">
                  {!! Form::label('cidade','Cidade:') !!}
                  {!! Form::text('cidade',null,['class'=>'form-control','id'=>'cidade']) !!}
                </div>
                 <div class="form-group col-xs-2 p-right-0">
                  {!! Form::label('estado','UF:') !!}
                  {!! Form::text('estado',null,['class'=>'form-control','id'=>'estado']) !!}
                </div>
	</div>
	<div class="col-xs-12 fr-view">
		{!! Form::label('texto_adicional','Texto Adicional:') !!}
		<textarea name="texto_adicional" class="froala-editor" cols="30" rows="10">
		{{@$congresso->texto_adicional}}
		</textarea>
		<div class="clearfix"></div>
	</div>
	<hr>
				
					<div class="col-sm-12  m-top-lg">
						<label for="">Galeria de Fotos</label>
						<div class="container-upload">
								<div id="carregandoForm"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
							<input type="file"  class="uploadArquivos uploadArquivosGaleria" name="file" multiple>
							<div><i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER FOTOS</div>
						</div>
						<div id="previewGaleria">
							<ul>
								@if(@$galeria)
								@foreach(@$galeria as $foto)
								<li>
					              <input type="hidden" name="fotos[]" value="{{$foto->foto}}" />
					              <a href="#" class="remove" data-file="{{$foto->foto}}">
					              <i class="fa fa-close" aria-hidden="true"></i>
					              </a>
					              <img src="{{URL::to('/')}}/galeria/{{$foto->foto}}" alt="">
					         </li>
					         @endforeach
					         @endif
							</ul>
						</div>


					</div>
				
				<div class="containerbtn">
				<div class="carregnadobtn">
					<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>

				</div>
					
				</div>
				
</div>	
<div class="col-sm-4">
	<div class="box box-primary">
		<div class="box-body">
		<div class="form-group col-xs-12 ">
              <label for="">Status Inscrição</label><div class="clearfix"></div>
              <div class="col-xs-6">
                <label>
                  <input type="radio" name="status_inscricao"  value="aberto" class="flat-red" @if(@$congresso->status_inscricao == 'aberto') checked="" @endif >
            Aberta
                </label>
              </div>
              <div class="col-xs-6">
                <label>
                  <input type="radio" name="status_inscricao"  value="fechada" class="flat-red" @if(@$congresso->status_inscricao == 'fechada') checked="" @endif >
                  Fechada
                </label>
              </div>
               
            </div>
			<div class="form-group">

				{!! Form::label('valor','Valor:') !!}
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-dollar"></i>
					</div>
					{!! Form::text('valor',number_format(@$congresso->valor,2,',','.'),['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-group">

				{!! Form::label('valor_associado','Valor Associado:') !!}
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-dollar"></i>
					</div>
					{!! Form::text('valor_associado',number_format(@$congresso->valor_associado,2,',','.'),['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('qtd_inscricoes','Quantidade de Inscrições:') !!}
				{!! Form::text('qtd_inscricoes',null,['class'=>'form-control']) !!}  
			</div>
			<div class="form-group">
				{!! Form::label('data_encerramento','Data Encerramento Inscrições:') !!}
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					{!! Form::text('data_encerramento',null,['class'=>'form-control dataMask']) !!}
				</div>
			</div>
		</div>
	</div>
</div>

