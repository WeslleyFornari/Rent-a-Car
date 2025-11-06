@extends('layouts.site')
@section('title', 'Home')
@section('pre-assets')


<style>

.texto-selecao{
		display= flex;
		flex-direction = row;
		justify-content= flex-end;
    }

.fixed{
	position: fixed;
	top:10px;
	
	z-index: 100
}
#hide {
 
  width: 100%;
  max-width: 500px;

  text-align: justify;
  border-radius: 3px;
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
}
#hide h2{
	margin: 0;
}
#hide .menu-lateral{
	margin-top: 20px;
	width: 100% !important;
}
.fixedReserva{

   /* position: fixed;
    left: 50%;
    margin-left: 190px;
    top: 0px;
    z-index: 100;
    min-width: 366px;
    overflow-y: auto;*/
}
.fixedReserva .menu-lateral{
	    /*margin-top: 0px;*/
}
.btDestaque{
	background: #ff7b00;
    cursor: default;
    color: #fff;
    width: 100%;
    margin-top: 20px;
    padding: 5px;
    border-radius: 5px;
    border: 4px solid #ffb800;
}
.btDestaque:hover{
	background: #ffb800;
	transition: 0.2s all linear;
}
.btDestaque .text{
	display: inline-block;
    font-size: 1.5em;
    width: 100%;
    text-align: center;
}
.btDestaque .val{
	    width: 100%;
    display: inline-block;
    font-size: 2em;
    vertical-align: bottom;
}
.btDestaque .val::after{
	content: " <<"
}
.btDestaque .val::before{
	content: ">> ";
}
</style>
@endsection
@section('filtro')
    @include('site.include.filtro')
@endsection
@section('content')
        
            <div class="container">
               
				<div class="col-md-8">
					<div class="progresso">
						<hr>
						<div class="check-esq @if(!@$data['data_inicio']) next @endif">@if(!@$data['data_inicio']) 1 @else <i class="fas fa-check"></i> @endif
							<div class="txt">Data e hora da reserva</div>
						</div>
						<div class="check-cen @if(!@$data['grupo_id']) next @endif">2<div class="txt">Grupo de veículos</div></div>
						<div class="check-dir next"> 3
							<div class="txt">Dados <br> cadastrais</div>
						</div>

					</div>

					<h2>GRUPO DE VEÍCULOS</h2>
					@if($grupos->count() == 0)
					<h4>Desculpe-nos todos os nossos veículos estão alugados.</h4>
					@endif
					@foreach($grupos as $item)
					<div class="grupo-veiculos"> 
						<div class="item-veiculos">
							<div class="categoria">
								<span class="tit-categoria">{{$item->sigla_grupo}} - {{$item->nome_grupo}}</span>
							</div>
							<div class="titulo">
								 <span class="carros">{{$item->veiculos[0]->nome}} ou similar</span>
							</div>
							<div class="veiculo"><img src="{{$item->media->fullPatch()}}" alt=""></div>
							<div class="especificacao">
								<div class="slider multiple-items">
									<?php $i = 0; 
										$totalpPage = 4;
										$qt = count($item->opcionais);
										$pg = ceil($qt/$totalpPage);
										$count = 1;
									?>
									
									@for($i= 0; $i< $pg;$i++)
									<?php 
									$inicio = ($totalpPage*$count) - $totalpPage; 
									$max_pag = $inicio + $totalpPage;
									if($max_pag > $qt){
										$max_pag = $qt;
									 
									}
									$max_pag = $max_pag - 1;
									?>
									<div>
										<div class="item">
											@for($x = $inicio; $x <= $max_pag ;$x++)
											<p data-x="{{$x}}">
												@if($item->opcionais[$x]->opcional->media)
												<img src="{{$item->opcionais[$x]->opcional->media->fullpatch()}}" alt="">
												@endif
											
												{{$item->opcionais[$x]->opcional->nome}}</p>
											@endfor
										</div>
										
									</div>
								<?php 
								$count++; 
								?>
									@endfor
									
								</div>
							</div>
							<div class="clearfix"></div>
							
							<div class="container-preco">
								{!! Form::model(null,['route'=>['site.selectGrupo'],'class'=>'formGroup']) !!}
								<input type="hidden" name="grupo_id" value="{{$item->id}}">
									 	<input type="hidden" name="data_inicio" value="{{@$data['data_inicio']}}">
									 	<input type="hidden" name="hora_inicio" value="{{@$data['hora_inicio']}}">
									 	<input type="hidden" name="data_termino" value="{{@$data['data_termino']}}">
									 	<input type="hidden" name="hora_termino" value="{{@$data['hora_termino']}}">

									<div class="preco">
										<ul>
											<li class="hvr-float-shadow">
												@if(@$configSite['desconto-avista'] > 0)
												<span class="desconto">{{$configSite['desconto-avista']}}% <small>OFF</small></span>
												@endif
										 <div class="titulo-preco"><small>R$</small> {{number_format($item->descontoAvista(),2,',','.')}} <small><i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Desconto aplicado sobre a(s) diária(s)"></i></small> <div class="legenda">à vista(transferência Bancária)</div></div>
											</li>
											<li class="hvr-float-shadow">
												<div class="titulo-preco"><small>R$</small> {{ number_format($item->valorDiaria($item->id,@$data['hora_inicio'],@$diarias),2,',','.')}}
												 <div class="legenda">Parcelado em até 10 vezes <Br>(cartão de crédito)</div>
												</div>
											</li>
										</ul>
										
										 
									</div>
									<div class="botao">
										 	<button type="button" class="btn-reserva">SIMULAR</button>
										 	
										 </div>
								{!! Form::close() !!}
							</div>
							<!--
							<div class="preco @if(!is_null(@$data['grupo_id']) && @$data['grupo_id'] == $item->id) active @endif">
								 <span class="titulo">R$ {{ number_format($item->valorDiaria($item->id,@$data['hora_inicio'],@$diarias),2,',','.')}}</span>
								 <div class="botao">
								 	 {!! Form::model(null,['route'=>['site.selectGrupo'],'class'=>'formGroup']) !!}
								 	 
									 	<button type="button" class="btn-reserva">Reservar agora</button>
								 	 {!! Form::close() !!}
								 </div>
							</div>
						-->
						</div>
					</div>
					@endforeach				
					
				</div>
				<div class="col-md-4 " id="right" >
					{!! Form::model(null,['route'=>['site.reserva'],'id'=>'formReserva']) !!}
					<div class="resultGroup">
						@if(isset($data['grupo_id']))

							@include('site.include._grupo_selected')

						@else
						<h3>Selecione um grupo de veículos</h3>
						@endif
					</div>
					<div id="camposPreReserva" class="hidden">
						<h2 class="m-bottom-0 text-center"><strong>Pré Reserva</strong></h2>
							<div class="col-md-12 col-xs-12">
								<div class="p-top-sm">Nome completo:*</div>
								<input type="text" class="form-control" required name="cliente[nome]" value="">
							</div>
<div class="col-md-12 col-xs-12">
								<div class="p-top-sm">CPF:* </div>
								<input type="text" class="form-control cpfMask" required name="cliente[cpf]" value="">
							</div>
							<div class="col-md-12 col-xs-12">
								<div class="p-top-sm">Celular:*</div>
								<input type="text" class="form-control telMask" required name="cliente[telefone2]" value="">
							</div>
							<div class="col-md-12 col-xs-12">
								 <button type="submit" class="btn-confirmar btn-block btn-lg">Confirmar</button>
								 <a  data-fancybox data-src="#informacoes-legais" href="javascript:;" class="m-top-md" > Termos e condições </a>
								 <div id="addButtonPagueAgora"></div>
						</div>
				</div>
<!--
					<button type="button"  id="openModal"  data-fancybox data-src="#hide" href="javascript:;" class="btn-confirmar btn-block btn-lg @if(!isset($data['grupo_id'])) hidden 	@endif ">Confirmar</button>
				-->
			
					
					 {!! Form::close() !!} 
				</div>				
            </div>

            
      
        
@endsection




@section('pos-script')


<script>
 
var larguraMenuLateral = $(".menu-lateral").width();



	

	$('[data-fancybox]').fancybox({
	toolbar  : false,
	smallBtn : true,
	iframe : {
		preload : false
	},
	beforeLoad: function() {
      //$(".validateMe").validate();
     $("header").fadeOut('fast')
     $("#hide").css('padding','10px')
    }
})
	$('.multiple-items').slick({
		slidesToScroll: 1,
		arrows:false,
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 2
	});
	$(".btn-reserva").click(function(e){
		e.preventDefault();
		$(".container-preco").removeClass('active');
		$(this).closest('.container-preco').addClass('active')
		var dataForm = $(this).closest('form').serialize();
			$("#form").find('input[name="grupo_id"]').val($(this).closest('form').find('input[name="grupo_id"]').val());
		if($(this).closest('form').find('input[name="data_inicio"]').val() == ""){
			
			$('html,body').animate({
				scrollTop:0,
			},500,function(){
				$(".filtro").find('input[name="data_inicio"]').focus()
			})
				
			return false;
		}
		$.post("{{route('site.selectGrupo')}}",dataForm,function(data){
			$("#openModal").removeClass('hidden');

			$(".resultGroup").html(data);
			$("#camposPreReserva").removeClass('hidden')
			//$("#addButtonPagueAgora").html('<button type="submit" class="btDestaque pagueAgora"><span class="text">Pague agora por</span> <span class="val">R$ '+ $(".resultGroup input[name='valorDestonto']").val() +'</span></button>');
			 $('[data-toggle="tooltip"]').tooltip();
			 $("#iconReserva").click()
		});
	})
	$("body").on('click','.actionEditar',function(e){
		$("#iconReserva").click();
		$('html,body').animate({
				scrollTop:0,
			},500,function(){
				$(".filtro").find('input[name="data_inicio"]').focus()
			})
	})
		$("#formReserva").submit(function(e) {
	  // avoid to execute the actual submit of the form.
		$('#formReserva').append('<input type="hidden" name="page_agora" value="1" />')
		
	});




			$("#iconReserva").click(function(e){
			e.preventDefault();
			var windowWidth = window.innerWidth;
			if(windowWidth < 768){
				if($("#right").hasClass("open")){
					$("#right").animate({
						right:'-100%'
					},function(){
						$(this).removeClass('open');
						$("body").removeAttr('style')
					})
				}else{
					$(".loading-dot").fadeIn('fast');
					$("#right").animate({
						right:'0'
					},function(){
						$(this).addClass('open');
						 
							$("body").css('overflow-y','hidden');
						
						$(".loading-dot").fadeOut('fast');
					})
					}
			}
		})

			

window.addEventListener('scroll', function(e) {
  var y = window.scrollY;
   var positionDiv = document.getElementById("right");

 //$("#right").css('left',positionDiv.offsetLeft);
var find = $("#right").find('.menu-lateral').length;

 if(y > 287 && find > 0){

 	//$("#right").addClass('fixed-right');
 	
 }else{
 	//$("#right").removeClass('fixed-right');
 	
 }
});

$("body").on('click','.btnMaisDias',function(e){
	e.preventDefault();
	var dataNew = $(this).data('dia');
	$("input[name='data_termino']").val(dataNew);
	$("#form").submit()

})
</script>

@endsection