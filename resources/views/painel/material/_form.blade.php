<div class="box-body">

            <div class="form-group col-xs-12 ">
              <label for="">Status</label><div class="clearfix"></div>
              <div class="col-xs-3">
                <label>
                  <input type="radio" name="status"  value="1" class="flat-red" @if(@$material->status == '1') checked="" @endif >
            Ativo
                </label>
              </div>
              <div class="col-xs-3">
                <label>
                  <input type="radio" name="status"  value="3" class="flat-red" @if(@$material->status == '3') checked="" @endif >
                  Inativo
                </label>
              </div>
               
            </div>
            <div class="form-group col-xs-12 ">
              <label for="">Acesso</label><div class="clearfix"></div>
              <div class="col-xs-3">
                <label>


                  <input type="radio" name="somente_assinante"  value="nao" class="flat-red" @if(@$material->somente_assinante == 'nao') checked="" @endif >
            Público
                </label>
              </div>
              <div class="col-xs-6">
                <label>
                  <input type="radio" name="somente_assinante"  value="sim" class="flat-red" @if(@$material->somente_assinante == 'sim') checked="" @endif >
                  Somente Assinante
                </label>
              </div>
               
            </div>
            
            <div class="form-group col-xs-12  ">
             
               {!! Form::label('Título Arquivo','Título Arquivo:') !!}
       			   {!! Form::text('titulo',null,['class'=>'form-control']) !!}
            </div>

              <div class="col-sm-12">
            <label for="">Arquivo</label>
            <div class="container-upload" @if(@$material->arquivo) style="display: none" @endif>
                <div id="carregandoForm" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
              <input type="file"  id="uploadArquivos" class="uploadArquivos" name="file">
              <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> SELECIONAR ARQUIVO</div>
            </div>
            <div id="preview-arquivo">
              <ul>
              @if(isset($material->arquivo))
                <li>
              <input type="hidden" name="arquivo" value="{{@$material->arquivo}}" />
             <a href="#" class="remove" data-file="{{@$material->arquivo}}">
              <i class="fa fa-close" aria-hidden="true"></i> 
              </a>
              {{@$material->arquivo}}
          </li>
          @endif
              </ul>
            </div>
          </div>
            



          </div>