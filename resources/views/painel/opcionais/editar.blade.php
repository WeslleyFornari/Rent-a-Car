  {!! Form::model(null,['route'=>['admin.opcionais.update',$opcional->id],'id'=>'form']) !!}

                      <div class="col-xs-12">
                        <div id="preview">
                          <ul class="targetUseImage">
                              @if(!is_null($opcional->media))
                                    <li>
                                      <input type="hidden" name="media_id" value="{{$opcional->media_id}}" />
                                      <a href="#" class="remove" data-file="{{$opcional->media_id}}">
                                        <i class="fa fa-close" aria-hidden="true"></i> 
                                      </a>
                                     
                                        <img src="{{@$opcional->media->fullpatch()}}">
                                    
                                     </li>
                                     @endif
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-12">
                        <button class="btn btn-default btn-block openPopUpMedia">
                          <i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGEM
                        </button>
                    
                      </div>
                


                <div class="col-sm-12 form-group ">
                    <label for="Nome Categoria">Opcional:</label>
                    <input class="form-control" name="nome" type="text" value="{{$opcional->nome}}">
                </div>
                 <div class="col-sm-12 m-top-sm">
                 <button type="button" class="btn btn-success btn-flat btn-block btSubmit">SALVAR</button>
                </div>

                  {!! Form::close() !!}