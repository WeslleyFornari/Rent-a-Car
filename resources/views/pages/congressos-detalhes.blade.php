@extends('templates.site')
@section('pre-assets')


<link href='{{asset("min/simplelightbox-master")}}/dist/simplelightbox.css' rel='stylesheet' type='text/css'>

@endsection
@section('content')
	<div class="row">	
	<?php 
	if($congresso->status_inscricao == 'aberto'){
		$colL = 'class="col-sm-8"';
		$colR = 'class="col-sm-4 p-all-lg"';
	}else{
		$colL = 'class="col-sm-12"';
		$colR = 'class="col-sm-8" style="display:none"';
	}
	 ?>
	
	


		<div <?=$colL?>>	
			<h1>{{$congresso->titulo}}</h1>
			{!!$congresso->texto!!}

			@if(@$congresso->programacao)
			<div class="clearfix m-top-lg"></div>
			<h3>PROGRAMAÇÃO</h3>
				{!!$congresso->programacao!!}
			@endif
			
			@if(count($congressistas) > 0)
			<div class="clearfix m-top-lg"></div>
			<h3>CONFERENCISTAS</h3>
			<div class="clearfix m-top-md"></div>
				@foreach($congressistas as $conferencista)
				<h4>{{$conferencista->conferencista->nome}}</h4>
				<div class="col-sm-12 p-all-0">
					<div class="col-sm-4 p-left-0"><img src="{{asset('img_perfil').'/'.$conferencista->conferencista->foto}}" alt=""></div>
					<div class="col-sm-8">
						{!!$conferencista->conferencista->texto!!}

					</div>
						
				</div>

				<hr class="clearfix m-top-md m-bottom-md">
				@endforeach
			@endif
			@if(@$congresso->data_horario)
			<div class="clearfix m-top-lg"></div>
			<h3>DATA E HORÁRIO</h3>
				{!!$congresso->data_horario!!}
			@endif

			@if(@$congresso->nome_local)
			<div class="clearfix m-top-lg"></div>
			<h3>LOCAL</h3>
				{!!$congresso->nome_local!!}
			@endif

			@if(@$congresso->texto_adicional)
			<div class="clearfix m-top-lg"></div>
			
				{!!$congresso->texto_adicional!!}
			@endif
			@if(@$galeria)
			 <div class="gallery m-top-lg">
			 	<?php $count=1; ?>
			@foreach($galeria as  $foto)
			 	
				<a href="{{asset('galeria').'/'.$foto->foto}}" class="col-sm-2 p-all-0"><img src="{{asset('galeria').'/'.$foto->foto}}" alt="{{$congresso->titulo}}" title="{{$congresso->titulo}}" /></a>

				<?php $count++ ?>
			  	@endforeach
			</div>
			@endif
		</div>
		@if($congresso->status_inscricao == 'aberto')
		<div <?=$colR?>>
				<div id="boxInscricao">
					{!!Form::open(['route'=>'inscricao.store','id'=>"", 'class'=>''])!!}
					<input type="hidden" name="congresso_id" value="{{$congresso->id}}">
						<h4><i class="fa fa-ticket" aria-hidden="true"></i> Inscricão</h4>
						<div class="valorInscricao">
							<small>Associado <br></small>
							R$ {{number_format($congresso->valor_associado,2,',','.')}} <small>(+ taxas)</small><br>

							<small>Não Associado <br></small>
							R$ {{number_format($congresso->valor,2,',','.')}} <small>(+ taxas)</small>
						</div>
						<div class="boxQtdInscricao">
							<a  href="#" class="menus"><i class="fa fa-minus" aria-hidden="true"></i></a >
							<input class="qtdInscricao" name="qtdInscricao" type="text" value="1">
							<a href="#"  class="mais"><i class="fa fa-plus" aria-hidden="true"></i></a >
						</div>
						<div class="clearfix"></div>
						<div class="p-all-sm ">
							<button type="submit" class="btn btn-block btn-flat btn-md btn-success">CONTINUAR</button>
						</div>
						<div class="p-all-sm text-center">
							<small class="btn-block">Forma de Pagamento</small>
							<img src="{{asset('min/img/pagseguro.png')}}" alt="">
						</div>
					{!!Form::close()!!}
				</div>
		
			
		</div>
		@endif
</div>	
@endsection

@section('pos-script')

<script type="text/javascript" src="{{asset('min/simplelightbox-master')}}/dist/simple-lightbox.js"></script>
<script>
		$(document).ready(function(e){

			$(".boxQtdInscricao a.menus").click(function(e){
				e.preventDefault()
				var qtdInscricao = $(".qtdInscricao").val();
				if(qtdInscricao >1){
					qtdInscricao = qtdInscricao - 1;
					$(".qtdInscricao").val(qtdInscricao);
				}
			})

			$(".boxQtdInscricao a.mais").click(function(e){
				e.preventDefault()
				var qtdInscricao = $(".qtdInscricao").val();
				
					qtdInscricao = parseInt(qtdInscricao) + 1;
					$(".qtdInscricao").val(qtdInscricao);
				
			})
		});	
		$(function() {
			var offset = $("#boxInscricao").offset().top;
			var width = $("#boxInscricao").width();
			$("#boxInscricao").css("max-width",width+'px');
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();

        if (scroll >= offset) {
            $("#boxInscricao").addClass("fix-inscricao");

        } else {
            $("#boxInscricao").removeClass("fix-inscricao");
        }
    });
});	
		$('.gallery a').simpleLightbox(options)
	</script>



@endsection