<div class="box">
   <div class="box-header with-border">
      <h3 class="box-title">Cadastrar</h3>
   </div>
   <!-- /.box-header -->  <!-- form start -->  
  
      <div class="box-body">
         <div class="form-group col-sm-12">
            {!! Form::label('Status','Status:',['class'=>'col-sm-2 control-label']) !!}        
            <div class="col-sm-10">         
            <input type="radio" name="status" class="minimal" checked=""  value="ativo"> Ativo          
            <input type="radio" name="status" class="minimal" value="inativo"> Inativo        
            </div>
         </div>
         <div class="form-group col-sm-12">
            {!! Form::label('Nome','Nome:',['class'=>'col-sm-2 control-label']) !!}        
            <div class="col-sm-6">         
            {!! Form::text('nome',null,['class'=>'form-control']) !!}       
            </div>
         </div>
         <div class="form-group col-sm-12">
            <label for="exampleInputFile" class="col-sm-2 control-label">Link</label>  
            <div class="col-sm-3">       
            {!! Form::text('link',null,['class'=>'form-control','id'=>'link','placeholder'=>'https://www.google.com.br']) !!}
            </div>
            <!-- <div class="col-sm-3"><input type="checkbox" name="link_full" class="linkFull minimal" value="1" id=""> Usar em todo banner</div> -->   
         </div>

         <div class=" mb-3">
         <div class="col-sm-4 p-left-md">
            <label for="exampleInputFile" class="control-label">
               Banner Desktop <small>(1400x395 px)</small>
            </label>      
          
            <div class="container-upload @if(null !== @$banner->media_desktop) hidden @endif" id="containerUpload">
              <div id="carregandoForm" class="carregandoDestaque" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
              <input type="file"  id="uploadArquivos" class="uploadArquivos" name="file[]">
              <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER ARQUIVO</div>
            </div>     
           
            <div id="preview" class="preview" >
            <ul>
                  @if(null !== @$banner->media_desktop)
                  <li class="m-all-0" style="width: 100%;">
                    <input type="hidden" name="media_desktop" value="{{@$banner->media_desktop}}" />
                    <a href="#" class="remove" data-file="{{@$banner->media_desktop}}">
                      <i class="fa fa-close" aria-hidden="true"></i> 
                    </a>
                    <img src="{{URL::to('/')}}/img/banners/{{@$banner->media_desktop}}" alt="">
                  
                

                   
                  </li>
                  @endif
                </ul>
            </div>
            </div>
            <div  class="col-sm-4">
            <label for="exampleInputFile" class="control-label">Banner Mobile <small>(625px x 820px)</small></label>      
            
            <div class="container-upload    @if(null !== @$banner->media_mobile) hidden @endif" id="containerUploadMobile">
              <div id="carregandoForm" class="carregandoDestaque" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
              <input type="file"  id="uploadArquivosMobile" class="uploadArquivos" name="file[]">
              <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER ARQUIVO</div>
            </div> 
               <!-- <div class="col-sm-4">          <input type="checkbox" name="img_fundo"  class="minimal" value="1" id=""> Usar imagem no fundo        </div> -->        
           
            <div id="previewMobile" class="preview_image preview">
                <ul>
                @if(null !== @$banner->media_mobile)
                  <li class="m-all-0" style="width: 100%;">
                    <input type="hidden" name="media_mobile" value="{{@$banner->media_mobile}}" />
                    <a href="#" class="remove" data-file="{{@$banner->media_mobile}}">
                      <i class="fa fa-close" aria-hidden="true"></i> 
                    </a>
                    <img src="{{URL::to('/')}}/img/banners/{{@$banner->media_mobile}}" alt="">
                  
                

                   
                  </li>
                  @endif
                </ul>
            </div>
            </div>
         </div>
         
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
         
      
         <div class="row">
            <div class="col-sm-6 ">      <a  href="{{route('admin.banners.lista')}}" class="btn btn-flat btn-default" data-action="cancelar">Cancelar</a>    </div>
            <div class="col-sm-6">      <button type="submit" class="btn btn-flat btn-success pull-right" id="salvar" data-action="salvar">Salvar</button>    </div>
         </div>
      </div>
      <!-- /.box-footer -->
   
</div>