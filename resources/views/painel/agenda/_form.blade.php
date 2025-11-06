 <div class="row">
     <div class="form-group col-xs-6 ">
      <label for="">Status</label><div class="clearfix"></div>
      <div class="col-xs-3">
        <label>
          <input type="radio" name="status_agenda" value="1" class="flat-red" @if(@$agenda->status_agenda == '1') checked="" @endif >
          Ativo
        </label>
      </div>
      <div class="col-xs-3">
        <label>
          <input type="radio" name="status_agenda" value="3" class="flat-red" @if(@$agenda->status_agenda == '3') checked="" @endif >
          Inativo
        </label>
      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-sm-7">
     <div class="form-group ">
      {!! Form::label('titulo_agenda','Nome Evento:') !!}
      {!! Form::text('titulo_agenda',null,['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-sm-5">
    {!! Form::label('valor_agenda','Valor:') !!}
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
      {!!Form::text('valor_agenda',null,['class'=>'form-control']) !!}
      <span class="input-group-addon"> 
        <input type="checkbox" class="minimal">  Gratuito</span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-7">
     <textarea name="texto_agenda" id="froala-editor" cols="30" rows="10">
       {!!@$agenda->texto_agenda!!}

     </textarea>

   </div>
   <div class="col-xs-5">
     <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Data Evento</h3>
      </div>
      <div class="box-body">
        <!-- Date range -->
        <div class="form-group col-xs-6">
          <label>Data Início:</label>

          <div class="input-group">
            
             {!! Form::text('data_inicio_agenda',null,['class'=>'form-control dataMask','id'=>'']) !!}
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
          </div>
          <!-- /.input group -->
        </div>
         <div class="form-group col-xs-6">
          <label>Data Final:</label>

          <div class="input-group">
            
             {!! Form::text('data_final_agenda',null,['class'=>'form-control dataMask','id'=>'']) !!}
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.form group -->
        <!-- time Picker -->
        <div class="bootstrap-timepicker col-xs-6">
          <div class="form-group">
            <label>Hora Início:</label>

            <div class="input-group">
          
              {!! Form::text('hora_inicio_agenda',null,['class'=>'form-control timepicker']) !!}
              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
        </div>
        <!-- time Picker -->
        <div class="bootstrap-timepicker col-xs-6">
          <div class="form-group">
            <label>Hora Término:</label>

            <div class="input-group">
              {!! Form::text('hora_final_agenda',null,['class'=>'form-control timepicker']) !!}

              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
        </div>
      </div>
      <!-- /.box-body -->
    </div>
  </div>

  <div class="col-sm-7">
  <div class="form-group col-xs-12 p-all-0">
                  {!! Form::label('local_agenda','Local:') !!}
                  {!! Form::text('local_agenda',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-xs-4 p-left-0">
                  {!! Form::label('cep_agenda','Cep:') !!}
                  {!! Form::text('cep_agenda',null,['class'=>'form-control cepMask']) !!}
                </div>
                <div class="form-group col-xs-6">
                  {!! Form::label('endereco_agenda','Endereço:') !!}
                  {!! Form::text('endereco_agenda',null,['class'=>'form-control', 'id'=>'endereco']) !!}
                </div>
                <div class="form-group col-xs-2  p-right-0">
                  {!! Form::label('numero_agenda','Númeo:') !!}
                  {!! Form::text('numero_agenda',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-xs-3 p-left-0">
                    {!! Form::label('complemento_agenda','Complemento:') !!}
                  {!! Form::text('complemento_agenda',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-xs-3 ">
                   {!! Form::label('bairro_agenda','Bairro:') !!}
                  {!! Form::text('bairro_agenda',null,['class'=>'form-control','id'=>'bairro']) !!}
                </div>
                 <div class="form-group col-xs-4">
                  {!! Form::label('cidade_agenda','Cidade:') !!}
                  {!! Form::text('cidade_agenda',null,['class'=>'form-control']) !!}
                </div>
                 <div class="form-group col-xs-2 p-right-0">
                  {!! Form::label('estado_agenda','UF:') !!}
                  {!! Form::text('estado_agenda',null,['class'=>'form-control']) !!}
                </div>
  </div>
</div>