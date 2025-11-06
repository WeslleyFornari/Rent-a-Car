@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
<div class="row">
				<div class="col-sm-12">

					<h2>Formulário de Inscrição</h2>
				</div>
				<div id="passos-formulario">
					<div class="passo ">
						<span class="number ">1</span>
						<h3>DADOS DOS PARTICIPANTES</h3>
					</div>
					<div class="passo ">
						<span class="number ">2</span>
						<h3>DADOS DE PAGAMENTO</h3>
					</div>
					<div class="passo active">
						<span class="number ">3</span>
						<h3>PAGAMENTO</h3>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-8 col-sm-offset-2 p-all-0 m-top-lg">
					<div><strong>Dados pagamento</strong><br>
						Nome: {{$dadosPagamento->nome}}
					</div>
					<ul id="lista-participantes">
						<?php $valorTotal = ''; ?>
						@foreach($inscricoes as $inscricao)
						<?php $valorTotal += $inscricao->dadosPagamento->valor_congresso ?>
						
						<li class="col-sm-12">
							<div class="dados col-sm-8">
								<i class="fa fa-ticket" aria-hidden="true"></i> 
								{{$inscricao->nome}}
								<div class="email-participante">
									{{$inscricao->cpf}} | {{$inscricao->email}} | {{$inscricao->telefone}}
								</div>
							</div>
							<div class="valor col-sm-4">
								R$ {{number_format($inscricao->dadosPagamento->valor_congresso,'2',",",".")}}
							</div>
						</li>
						@endforeach
						
					</ul>
					<div class="col-sm-6 p-all-md">
								<small>As Taxas e juros de parcelamento serão aplicadas no próximo passo.</small>
							</div>
					<div id="total" class="col-sm-6">
						TOTAL R$ {{number_format($valorTotal,'2',",",".")}}
					</div>
						<div class="col-sm-10 col-sm-offset-2">

							<button class="btn btn-success  btn-flat col-sm-3 pull-right" id="btAvancar">Efeturar Pagamento</button>
						</div>
				</div>
</div>	
@endsection

@section('pos-script')
<script type="text/javascript" src="/pagseguro/javascript"></script>
@endsection