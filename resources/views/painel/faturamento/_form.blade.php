
              <div class="box-body">
                <div class="form-group col-xs-2 p-left-0">
                <div class="form-group">
                    {!! Form::label('dia_faturamento','Dia :') !!}
                    @if($faturamento)
                    {!! Form::text('dia_faturamento','05',['class'=>'form-control']) !!}
                    @else
                    {!! Form::text('dia_faturamento',null,['class'=>'form-control']) !!}
                    @endif
                </div>
                </div>
                <div class="form-group col-xs-2 p-left-0">
                  {!! Form::label('mes_faturamento','Mês :') !!}
                   

                     @if($faturamento)
                    {!! Form::text('mes_faturamento',null,['class'=>'form-control']) !!}
                    @else
                     {!! Form::text('mes_faturamento',date('m'),['class'=>'form-control']) !!}
                    @endif
                </div>
               
                <div class="form-group col-xs-2 p-left-0">
                  {!! Form::label('ano_faturamento','Ano :') !!}
                  @if($faturamento)
                   {!! Form::text('ano_faturamento',null,['class'=>'form-control']) !!}
                    @else
                    {!! Form::text('ano_faturamento',date('Y'),['class'=>'form-control']) !!}
                    @endif
                  
                </div>
                
                <div class="form-group col-xs-3 p-left-0">
                 {!! Form::label('valor_faturamento','Valor :') !!}
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-dollar"></i>
                      </div>
                       @if($faturamento)
                     {!! Form::text('valor_faturamento',number_format($faturamento->valor_faturamento,2,',','.'),['class'=>'form-control' ,'rows'=>'5']) !!}
                    @else
                    {!! Form::text('valor_faturamento',number_format($anuidade,2,',','.'),['class'=>'form-control' ,'rows'=>'5']) !!}
                    @endif

                    
                    </div>
                </div>
                <div class="form-group col-xs-3 p-left-0">
                  <label for="">Status:</label>
                  <select name="status_faturamento" class="form-control" id="">
                  <option value="">Selecione</option>
                  <option value="pendente" @if(@$faturamento->status_faturamento == 'pendente') selected @endif >Pendente</option>
                    <option value="pago" @if(@$faturamento->status_faturamento == 'pago') selected @endif >Pago</option>
                    
                  </select>
                </div>
                <div class="form-group col-xs-12 p-left-0">
                  {!! Form::label('observacao','Observações:') !!}
                  
                  {!! Form::textarea('observacao',null,['class'=>'form-control']) !!}
                </div>
                 <div class="form-group col-xs-12 p-left-0">
                <small>As 3h da manhã no período selecionado acima, será enviado o e-mail padrão de cobrança recorrente com a obser~vação acima.</small>
                 </div>
                
              </div>
              <!-- /.box-body -->

           
   
   


   