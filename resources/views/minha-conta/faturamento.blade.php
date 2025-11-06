<h4>FATURAMENTO</h4>
<table class="table box-body">
        <tr>
          <th>Vencimento</th>            
          <th>Vigência</th>            
          <th class="col-xs-2 text-center">Status</th>  
            <th class="col-xs-1 text-center">Valor</th>                       
          <th class="col-xs-1 text-center">Ações</th>
        
        </tr>
        <tr>
        
          @if(count($faturamentos) == 0)
          <td colspan="4">
            Nenhum faturamento encontrado
          </td>
          @endif
        
        @foreach($faturamentos as $faturamento)
          <td>{{$faturamento->dia_faturamento}}/{{$faturamento->mes_faturamento}}/{{$faturamento->ano_faturamento}}</td>
          <td>{{$faturamento->dia_faturamento-1}}/{{$faturamento->mes_faturamento}}/{{$faturamento->ano_faturamento+1}}</td>
          <td class="text-center">
            @if($faturamento->status_faturamento == 'pago')
            <span class="label label-success">{{$faturamento->status_faturamento}}</span>
            @elseif($faturamento->status_faturamento == 'pendente' && $faturamento->ano_faturamento <= date('Y'))
             <span class="label label-warning">{{$faturamento->status_faturamento}}</span>@elseif($faturamento->status_faturamento == 'pendente' && $faturamento->ano_faturamento > date('Y'))
             <span class="label label-info">À Vencer</span>
            @endif
          </td>
          <td>
            R$ {{number_format($faturamento->valor_faturamento,2,',','.')}}
          </td>
          <td class="text-center">
            @if($faturamento->status_faturamento == 'pendente')
          <a href="{{route('faturamento.anuidade',['id'=>$faturamento->user_id])}}" target="_blank" class="btn btn-primary btn-xs btn-flat"><i class="fa fa-dollar"></i> Pagar</a>
            
            @elseif($faturamento->status_faturamento == 'pago')
                <i class="fa fa-check-circle text-success" style="font-size: 20px;"></i> Pago
            @endif
            </td>
          </tr>
          @endforeach
        </table>