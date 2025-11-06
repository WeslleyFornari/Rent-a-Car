
<input type="hidden" name="diarias" value="{{@$diarias}}">
<input type="hidden" name="data_inicio" value="{{@$data['data_inicio']}}">
<input type="hidden" name="hora_inicio" value="{{@$data['hora_inicio']}}">
<input type="hidden" name="data_termino" value="{{@$data['data_termino']}}">
<input type="hidden" name="hora_termino" value="{{@$data['hora_termino']}}">
<input type="hidden" name="grupo_id" value="{{@$grupo->id}}">

<div class="menu-lateral ">
<div class="cabecalho-lateral">
	<li class="destaque">CONFIRME SUA RESERVA</li>
	<li class="editar "><a href="#" class="actionEditar">Editar</a></li>
</div>
<div class="reserva p-top-xs">
	<div class="itens"><span class="texto-item">{{@$diarias}}</span></div>
	<div class="itens"><span class="hora-item">{{@$data['hora_inicio']}}</span> <span class="data-item">{{@$data['data_inicio']}}</span></div>
	<div class="itens"><span class="hora-item">{{@$data['hora_termino']}}</span> <span class="data-item">{{@$data['data_termino']}}</span></div>
	<div class="itens"><span class="legenda-item">DIÁRIA</span></div>
	<div class="itens"><span class="legenda-item">RETIRADA</span></div>
	<div class="itens"><span class="legenda-item">DEVOLUÇÃO</span></div>	
	<hr>
	<div class="oferta">
		<h4>OFERTA GRUPO {{@$grupo->sigla_grupo}} - {{@$grupo->nome_grupo}}</h4>

		<span class="detalhes">{{@$grupo->veiculos[0]->nome}} ou Similar</span>
		<div>
			<li class="destaque">{{@$diarias}} Diárias</li>
			<li class="text-right destaque">TOTAL</li>
			<li class="valor">{{@$diarias}} x R${{@number_format($valorDiaria,2,',','.')}}</li>
			@if(@$valorPeriodo)
			<li class="text-right valor">R$ {{@number_format($valorPeriodo,2,',','.')}}</li>
			@endif
		</div>


		<hr>
		@if(@$grupo->adicionais)
		 	@foreach ($grupo->adicionais as $key => $value)

			<h4>{{$value->titulo}}</h4>
			<div>
				<li class="valor">{{$diarias}} x R$ {{number_format($value->valor,2,',','.')}}</li>
				<li class="text-right valor">R$ {{number_format($value->adicional_periodo,2,',','.')}}</li>
			</div>
			<hr>
			@endforeach
		@endif
		
	
		@if(@$desconto)
			<div class="descontos">
				<h4 class="text-laranja text-center">DESCONTO ESPECIAL PARA HOJE !!!</h4>
				<li class="destaque">Desconto: <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="Desconto aplicado sobre a(s) diária(s)"></i></li>
				
				<li class="text-right valor"> - {{@$desconto->desconto}}%</li>
				@if(@$promocao->de_diaria > 0 && (@$promocao->de_diaria - $diarias) > 0 )
				<div style="background: #f60; padding: 10px 30px; color: #fff; text-align: center;"><a href="#" class="btnMaisDias" data-dia="{{@$dataNew}}" style="color: #fff;"><p>Alugue por mais {{$promocao->de_diaria - $diarias}} dia(s) e consiga {{$promocao->desconto}}% de desconto</p></a></div>
				@endif
			</div>
		@endif
		@if(@$taxaAdministrativa)
			<div>
				
				<li class="destaque">Taxa Administrativa</li>
				
				<li class="text-right valor"> + {{@$configSite['taxa-administrativa']}}%</li>
				
				
			
			</div>
		@endif
	</div>
</div>
@if(@$valores)
<div class="rodape-lateral">
	<li class="txt-valor">Valor Final</li>
	<li class="valor">R$ {{number_format($valores['valor_final'],2,',','.')}}</li>
	<div class="parcelamento">Em até 10x de: R$ {{@$valores['valor_final_dez_vezes']}}</div>
	<input type="hidden" name="valor" value="{{$valores['valor_final']}}">
</div>
@endif
</div>

@if(@$valorDescontoAvista)
<input type="hidden" name="valorDestonto" value="{{number_format($valorDescontoAvista,2,',','.')}}">

@endif

