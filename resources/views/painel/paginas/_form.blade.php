<section class="col-xs-12">
  <div class="row">
   <div class="form-group col-xs-3 col-sm-4 ">
    <label for="">Status</label><div class="clearfix"></div>
    <div class="col-xs-6">
      <label >
        <input type="radio" name="status"  value="1" class="flat-red" @if(@$conteudo->status == '1') checked="" @endif >
        Ativo
      </label>
    </div>
    <div class="col-xs-6">
      <label>
        <input type="radio" name="status" value="3" class="flat-red" @if(@$conteudo->status == '3') checked="" @endif>
        Inativo
      </label>
    </div>   
  </div>

</div>
<div class="row">
  <div class="col-sm-8">
   <div class="form-group ">
    {!! Form::label('Título','Título:') !!}
    {!! Form::text('titulo_conteudo',null,['class'=>'form-control']) !!}
  </div>
</div>
<div class="col-sm-4">
  <div class="form-group">
    {!! Form::label('Categoria','Categoria:') !!}
    {!! Form::select('categoria_id',@$categorias,@$conteudo->categoria_id,['class'=>'form-control']) !!}
  </div>
</div>
</div>
<div class="row">
  <div class="col-xs-8">
    <div class="col-xs-12 p-all-0">
      {!! Form::textarea('texto',null,['class'=>'form-control','id'=>'summernote']) !!}

    </div>
    <div class="col-xs-12 p-all-0">
      <label for="">Galeria de Fotos</label>
      <div class="container-upload">
        <div class="carregandoForm" id="carregandoGaleria" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
        <input type="file"  class="uploadArquivos " id="uploadArquivosGaleria" name="file[]" multiple>
        <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER FOTOS</div>
      </div>
      <div id="previewGaleria">
        @if(@$galeria)
        <div class="box box-default">

          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-striped">
              <thead>


                <tr>
                  <th style="width: 10px">#</th>
                  <th>Miniatura</th>

                  <th style="width: 40px">Ações</th>
                </tr> 
              </thead>
              <tbody class="ordenar">
               @foreach($galeria as $value)
               <tr>
                <td><i class="fa fa-arrows-v" aria-hidden="true"></i></td>
                <td> <input type="hidden" name="fotos[]" value="{{$value->foto}}" />
                   <input type="hidden" class="ordemGaleria" name="ordem[]" value="{{$value->ordem}}">
                  <img src="{{URL::to('/')}}/img/galeria/{{$value->foto}}" style="max-height: 50px" alt=""></td>
                  <td> 

                    <a href="" class="btn btn-danger  remove "  data-file="{{$value->foto}}">
                      <i class="fa fa-trash-o"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
                
              </tbody></table>
            </div>
          </div>
          @endif



        </div>


      </div>

      <div class="containerbtn">
        <div class="carregnadobtn">
          <i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>

        </div>

      </div>


    </div>
    <div class="col-xs-4">
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group col-xs-12 ">
            <label for="exampleInputFile">Imagem em Destaque</label>
            <div class="container-upload">
              <div id="carregandoForm" class="carregandoDestaque" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
              <input type="file"  id="uploadArquivos" class="uploadArquivos" name="file[]">
              <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGEM</div>
            </div>
            <div class="col-xs-12">
              <div id="preview">
                <ul>
                  @if(isset($conteudo->img_destaque->arquivo))
                  <li>
                    <input type="hidden" name="arquivo" value="{{@$conteudo->img_destaque->arquivo}}" />
                    <a href="#" class="remove" data-file="{{@$conteudo->img_destaque->arquivo}}">
                      <i class="fa fa-close" aria-hidden="true"></i> 
                    </a>
                    <img src="{{URL::to('/')}}/img/{{@$conteudo->img_destaque->arquivo}}" alt="">
                  </li>
                  @endif
                </ul>
              </div>
            </div>
            <div id="boxImage" style="@if(!isset($conteudo->img_destaque->arquivo)) display: none" @endif >
              <div class="col-xs-12 " >
               <div class="form-group ">
                <label for="">Exibir Imagem no artigo?</label><div class="clearfix"></div>
                <div class="col-xs-6">

                  <label >
                    <input type="radio" name="mostrar_artigo"  value="1" class="flat-red" @if(@$conteudo->img_destaque->mostrar_artigo == '1') checked="" @endif >
                    Sim
                  </label>
                </div>
                <div class="col-xs-6">
                  <label>
                    <input type="radio" name="mostrar_artigo" value="0" class="flat-red" @if(@$conteudo->img_destaque->mostrar_artigo == '0') checked="" @endif>
                    Não
                  </label>
                </div>   
              </div>
            </div>
            <div class="col-xs-12 m-top-sm">
              <label for="">Alinhamento da imagem:</label><br>

              <div class="col-xs-4">
                <input type="radio" class="flat-red" name="alinhamento" id="" value="nenhum" @if(@$conteudo->alinhamento == 'none') checked="" @endif> <i class="fa fa-align-justify" aria-hidden="true"></i> Nenhum
              </div>
              <div class="col-xs-4">
               <input type="radio" class="flat-red" name="alinhamento" value="left" @if(@$conteudo->alinhamento == 'left') checked="" @endif> <i class="fa fa-align-left" aria-hidden="true"></i> Esquerda
             </div>
             
             <div class="col-xs-4">
              <input type="radio" class="flat-red" name="alinhamento" value="right" @if(@$conteudo->alinhamento == 'right') checked="" @endif> <i class="fa fa-align-right" aria-hidden="true"></i> Direita
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</div>
<div class="clearfix m-top-lg m-bottom-lg">

</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box-footer">
     <a href="{{route('admin.paginas.lista')}}" class="btn btn-default btn-flat">Voltar</a>
     {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat pull-right"])!!}
   </div>
 </div>
</div>
</section>


