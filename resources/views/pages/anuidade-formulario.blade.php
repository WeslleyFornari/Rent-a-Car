@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
<div class="row">
	<div class="col-sm-12">

		<h2>Formulário de Inscrição</h2>
	</div>
	<div id="passos-formulario">
		<div class="passo active">
			<span class="number ">1</span>
			<h3>DADOS DOS PARTICIPANTES</h3>
		</div>
		<div class="passo">
			<span class="number ">2</span>
			<h3>DADOS DE PAGAMENTO</h3>
		</div>
		<div class="passo">
			<span class="number ">3</span>
			<h3>PAGAMENTO</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-sm-10 col-xs-12 col-sm-offset-1 p-all-0 m-top-lg">
		{!!Form::open(['route'=>'inscricao.dados-formulario','id'=>'dados-formulario', 'class'=>''])!!}
		<ul id="listaParticipantes">

			@foreach($inscricoes as $key=>$inscricao)
			
			<li class="col-sm-8 col-xs-12 p-all-0 col-sm-offset-2 @if($key == '0') active @else hidden @endif">
				<input type="hidden" name="congresso_id[]" value="{{$inscricao->id}}">
			<input type="hidden" name="id[]" value="{{$inscricao->id}}">
			<input type="hidden" name="token_pagseguro[]" value="{{$inscricao->token_pagseguro}}">
				<h4>Participante número: {{$key+1}}/{{count($inscricoes)}}</h4>
				<div class="dados">
					<div class="form-group col-sm-6 col-xs-12">
						<label for="">Nome <small>*</small></label>
						<input type="text" name="nome[]" class="form-control btn-flat" id="">
					</div>
					<div class="form-group col-sm-6 col-xs-12">
						<label for="">E-mail <small>*</small></label>
						<input type="email" name="email[]" class="form-control btn-flat" id="">
					</div>
					<div class="form-group col-sm-6 col-xs-12">
						<label for="">Telefone <small>*</small></label>
						<input type="text" name="telefone[]" class="form-control btn-flat telMask" id="">
					</div>
					<div class="form-group col-sm-6 col-xs-12">
						<label for="">CPF <small>*</small></label>
						<input type="text" name="cpf[]" class="form-control btn-flat cpfMask" id="">
					</div>
					 <small>* Itens Obrigatórios</small>
				</div>
			</li>
			@endforeach
		
			
		</ul>
		{!!Form::close()!!}
		<div class="col-sm-8 col-sm-offset-2">
			<button class="btn btn-primary  btn-flat col-sm-3 pull-right" id="btAvancar">Avançar</button>
		</div>
	</div>
</div>	
@endsection
@section('pos-script')
<script>
		$(document).ready(function(e){

			$("#btAvancar").click(function(){
				var total = $("#listaParticipantes li").length -1;
				
				var posicao = $("#listaParticipantes li.active").index();
				
				if(posicao < total){
					$("#listaParticipantes li").eq(posicao).addClass("animated bounceOutLeft");
					//$("#listaParticipantes li").eq(posicao).delay(700).addClass("hidden")
					$("#listaParticipantes li").eq(posicao).removeClass("active");
					$("#listaParticipantes li").eq(posicao+1).addClass("active");
					$("#listaParticipantes li").eq(posicao+1).removeClass("hidden");
					$("#listaParticipantes li").eq(posicao+1).addClass("animated bounceInRight");
				}

				if(posicao == total){
 					$("#dados-formulario").submit();
				}
			})
});	
	</script>
@endsection