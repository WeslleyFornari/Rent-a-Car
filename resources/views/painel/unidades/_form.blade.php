<section class="col-xs-12">

<div class="row">
 

</div>
<div class="row">
  <div class="col-xs-8">
    <div class="row">
     <div class="col-xs-12">
       <div class="form-group ">
        {!! Form::label('Título','Título:') !!}
        {!! Form::text('titulo',null,['class'=>'form-control']) !!}
      </div>
    </div>
    <div class="col-xs-12">
       {!! Form::label('conteudo','Texto:') !!}
      {!! Form::textarea('conteudo',null,['class'=>'form-control','id'=>'summernote']) !!}

    </div>
   <hr class="col-sm-12 m-bottom-lg">
     <div class="col-sm-4">
       {!! Form::label('Telefone 1','Telefone 1:') !!}
       {!! Form::text('telefone_1',null,['class'=>'form-control telMask']) !!}
    </div>

    <div class="col-sm-4">
        {!! Form::label('Telefone 2','Telefone 2:') !!}
       {!! Form::text('telefone_2',null,['class'=>'form-control telMask']) !!}
    </div>

    <div class="col-sm-4">
       {!! Form::label('Telefone 3','Telefone 3:') !!}
       {!! Form::text('telefone_3',null,['class'=>'form-control telMask']) !!}
    </div>
   <hr class="col-sm-12 m-bottom-sm">
    <div class="col-sm-4">
       {!! Form::label('Cep','Cep:') !!}
       {!! Form::text('cep',null,['class'=>'form-control cepMask']) !!}
    </div>

    <div class="col-sm-4">
       {!! Form::label('Endereço','Endereço:') !!}
       {!! Form::text('endereco',null,['class'=>'form-control']) !!}
    </div>

    <div class="col-sm-4">
       {!! Form::label('Número','Número:') !!}
       {!! Form::text('numero',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-sm-4">
       {!! Form::label('Complemento','Complemento:') !!}
       {!! Form::text('complemento',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-sm-4">
       {!! Form::label('Bairro','Bairro:') !!}
       {!! Form::text('bairro',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-sm-4">
       {!! Form::label('Cidade','Cidade:') !!}
       {!! Form::text('cidade',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-sm-4">
       {!! Form::label('Estado','Estado:') !!}
       {!! Form::text('estado',null,['class'=>'form-control']) !!}
    </div>
     

</div>
    </div>
    <div class="col-xs-4">
       <label for="exampleInputFile">Imagem em Destaque</label>
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group col-xs-12 ">
            <div class="container-upload">
              <div id="carregandoForm" class="carregandoDestaque" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
              <input type="file"  id="uploadArquivos" class="uploadArquivos" name="file[]">
              <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGEM</div>
            </div>
            <div class="col-xs-12">
              <div id="preview">
                <ul>
                  @if(isset($unidade->arquivo))
                  <li>
                    <input type="hidden" name="arquivo" value="{{@$unidade->arquivo}}" />
                    <a href="#" class="remove" data-file="{{@$unidade->arquivo}}">
                      <i class="fa fa-close" aria-hidden="true"></i> 
                    </a>
                    <img src="{{URL::to('/')}}/img/{{@$unidade->arquivo}}" alt="">
                  </li>
                  @endif
                </ul>
              </div>
            </div>
           
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</div>
<div class="clearfix m-top-lg m-bottom-lg">

</div>

  <div class="col-xs-12">
    <div class="box-footer">
     <a href="{{route('admin.unidades.lista')}}" class="btn btn-default btn-flat">Voltar</a>
     {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat pull-right"])!!}
   </div>
 </div>

</section>


