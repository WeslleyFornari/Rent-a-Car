 <div id="filtro-basico">
              <div class="container">
                <i class="fa fa-search"></i>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <h2>Encontre seu Veículo</h2>
                </div>
                <div class="col-md-7 col-sm-10 col-xs-12">
                  {!! Form::open(['route'=>'veiculos.busca', 'id'=>'formBuscar','method'=>'GET']) !!}
                    <div class="form-group col-sm-6">
                      <label for="">Marca</label>
                      <select name="marca" id="marca" class="form-control">
                        <option value="">SELECIONE...</option>
                          @foreach($marcas as $marca)
                          
                             <option value="{{$marca->marca}}">{{$marca->marca}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="">Modelo</label>                 
                      <select name="modelo" id="modelo" class="form-control">
                        <option value="">AGUARDANDO MARCA</option>
                      </select>
                    </div>
                   </div>
                     <div class="col-sm-2 p-top-md ">
                      <div class="col-xs-12 col-sm-12">
                  <button type="submit" class="btn bg-amarelo m-top-xs col-md-12 btn-block "><span class="fa fa-search form-inline"></span> <span class="visible-xs"> PESQUISAR </span></button>
                  </div>
                </div>
                  {!! Form::close() !!}
               
               

              </div>
            </div>