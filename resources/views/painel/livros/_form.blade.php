
<section class="col-sm-6">
  <div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    
    <div class="box-body">
    
      <div class="form-group col-xs-6  ">
        <label for="">Status</label><div class="clearfix"></div>
        <div class="col-xs-6">
          <label >
            <input type="radio" name="status"  value="1" class="flat-red" @if(@$livro->status == '1') checked="" @endif >
            Ativo
          </label>
        </div>
        <div class="col-xs-6">
          <label>
            <input type="radio" name="status" value="3" class="flat-red" @if(@$livro->status == '3') checked="" @endif>
            Inativo
          </label>
        </div>   
      </div>
       <div class="form-group col-xs-6  ">
        <label for="">Destaque</label><div class="clearfix"></div>
        <div class="col-xs-6">
          <label>
            <input type="radio" name="destaque" value="1" class="flat-red" @if(@$livro->destaque == '1') checked="" @endif >
            Sim
          </label>
        </div>
        <div class="col-xs-6">
          <label>
            <input type="radio" name="destaque" value="0" class="flat-red" @if(@$livro->destaque == '0') checked="" @endif>
            Não
          </label>
        </div>   
      </div>
      <div class="form-group col-xs-12 ">
        
        {!! Form::label('Título','Título:') !!}
        {!! Form::text('titulo_livro',null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group col-xs-12 ">
        <label for="">Introdução</label>
        {!! Form::label('Introdução','Introdução:') !!}
        {!! Form::textarea('introducao_livro',null,['class'=>'form-control','id'=>'froala-editor']) !!}

        

      </div>
      <div class="form-group  col-xs-6">
        <label>Categoria</label>
        <select class="form-control" name="id_categoria_livro">
          <option value="">Selecione</option>
          @foreach($categorias as $key =>$categoria)
          <option value="{{$key}}" @if(@$livro->id_categoria_livro == $key) selected @endif>{{$categoria}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-xs-6  ">
        {!! Form::label('Autor','Autor:') !!}
        {!! Form::text('autor',null,['class'=>'form-control']) !!}
      </div>
       <div class="form-group col-xs-6  ">
        {!! Form::label('Editora','Editora:') !!}
        {!! Form::text('editora_livro',null,['class'=>'form-control']) !!}
      </div>
       <div class="form-group col-xs-6  ">
        {!! Form::label('tradutor','Tradutor:') !!}
        {!! Form::text('tradutor',null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group col-xs-4  ">
        {!! Form::label('Valor','Valor:') !!}
        {!! Form::text('valor',null,['class'=>'form-control moneyMask']) !!}
      </div>
      <div class="form-group col-xs-4 ">
        {!! Form::label('Formato','Formato:') !!}
        {!! Form::text('formato',null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group col-xs-4">
          {!! Form::label('Edição','Edição:') !!}
        {!! Form::text('edicao',null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group col-xs-4 ">
        {!! Form::label('ISBN','ISBN:') !!}
        {!! Form::text('isbn',null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group col-xs-4 ">
        {!! Form::label('Páginas','Páginas:') !!}
        {!! Form::text('paginas',null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group col-xs-4 ">
        {!! Form::label('Ano Publicação','Ano Publicação:') !!}
        {!! Form::text('ano_publicacao',null,['class'=>'form-control']) !!}
      </div>
    </div>
    <!-- /.box-body -->
    
  </div>
</section>
<section class="col-sm-6">
  <div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->

      <div class="box-body">
      <div class="row">
          <div class="col-sm-12">
            <label for="">Fotos</label>
            <div class="container-upload">
                <div id="carregandoForm" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
              <input type="file"  id="uploadArquivos" class="uploadArquivos" name="file">
              <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER FOTOS CAPA</div>
            </div>
            <div id="preview">
              <ul>
              @if(isset($livro->foto_capa))
                <li>
              <input type="hidden" name="foto_capa" value="{{@$livro->foto_capa}}" />
             <a href="#" class="remove" data-file="{{@$livro->foto_capa}}">
              <i class="fa fa-close" aria-hidden="true"></i> 
              </a>
              <img src="{{URL::to('/')}}/img_livros/{{@$livro->foto_capa}}" alt="">
          </li>
          @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="containerbtn">
        <div class="carregnadobtn">
          <i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>

        </div>

       
      </div>
      <!-- /.box-body -->

  </div>
</section>
<section class="col-sm-6">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Onde Comprar</h3>
      
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
    <table class="table" id="boxAddOndeComprar">
      <tr>
          <td class="col-xs-5"><label for="">Nome da Loja</label>  <input type="text" class="form-control" id="nome_loja"></td>
          <td class="col-xs-5"><label for="">Site</label><input type="text" class="form-control" id="site_loja"></td>
          <td class="col-xs-2"><button type="button" class="btn btn-flat btn-success " style="margin-top: 25px" id="btOndeComprar">Salvar</button></td>
        </tr>
    </table>
      <table class="table" id="tableOndeComprar">
          <thead>
            <tr>
              <th class="col-xs-5">Nome Loja</th>
              <th class="col-xs-5">Site</th>
              <th class="col-xs-2">Ações</th>
            </tr>
          </thead>
        <tbody>
      
        @if(isset($livro->onde_comprar) && $livro->onde_comprar)
         <?php $cont = 0;
         ?>
          @foreach(@$livro->onde_comprar as $key => $onde_comprar)
          <tr>
            <td class="col-xs-5"><input type="hidden" name="onde_comprar[<?=$cont?>]['nome_local']" value="{{@$onde_comprar['nome_local']}}" class="cont_onde_comprar"/>{{@$onde_comprar['nome_local']}}</td>
            <td class="col-xs-5"><input type="hidden" name="onde_comprar[<?=$cont?>]['url_local']"  value="{{@$onde_comprar['url_local']}}"/><a href="{{@$onde_comprar['url_local']}}">{{@$onde_comprar['url_local']}}</a></td>
            <td class="col-xs-2"><a href="#" class="btn btn-danger btn-xs removeOndeComprar"><i class="fa fa-trash-o"></i></a> </td>
          </tr>
           <?php $cont++?>
          @endforeach
        @endif

        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</section>


