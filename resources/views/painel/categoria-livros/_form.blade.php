<div class="box-body">

            <div class="form-group col-xs-12 ">
              <label for="">Status</label><div class="clearfix"></div>
              <div class="col-xs-3">
                <label>
                  <input type="radio" name="status"  value="1" class="flat-red" @if(isset($categoria->status) == '1') checked="" @endif >
            Ativo
                </label>
              </div>
              <div class="col-xs-3">
                <label>
                  <input type="radio" name="status"  value="3" class="flat-red" @if(isset($categoria->status) == '3') checked="" @endif >
                  Inativo
                </label>
              </div>
               
            </div>
            
            <div class="form-group col-xs-12  ">
             
               {!! Form::label('Nome Categoria','Nome Categoria:') !!}
       			 {!! Form::text('nome_categoria_livros',null,['class'=>'form-control']) !!}
            </div>
            



          </div>