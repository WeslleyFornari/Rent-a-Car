<!DOCTYPE html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150724058-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-150724058-1');
</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=10">

	<link rel="apple-touch-icon" sizes="57x57" href="{{asset('min/img/favicon/apple-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{asset('min/img/favicon/apple-icon-60x60.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('min/img/favicon/apple-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('min/img/favicon/apple-icon-76x76.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('min/img/favicon/apple-icon-114x114.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('min/img/favicon/apple-icon-120x120.png')}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{asset('min/img/favicon/apple-icon-144x144.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('min/img/favicon/apple-icon-152x152.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('min/img/favicon/apple-icon-180x180.png')}}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{asset('min/img/favicon/android-icon-192x192.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('min/img/favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{asset('min/img/favicon/favicon-96x96.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('min/img/favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('min/img/favicon/manifest.json')}}">
<meta name="msapplication-TileColor" content="#84c223">
<meta name="msapplication-TileImage" content="{{asset('min/img/favicon/ms-icon-144x144.png')}}">
<meta name="theme-color" content="#84c223">
	<title>Vestro Locadora Veículos São José dos Campos - @yield('title')</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	  <link rel="stylesheet" href="{{asset('min/css/styles.css')}}">
	    <link href="{{asset('vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" />
  	@yield('pre-assets')
	<style>

    .faixa-destaque .box-controle{
      position: relative;
	  margin-left: 950px;
    }
   .faixa-destaque .btnFechar{
          position: absolute;
          right: 10px;
          width: 30px;
          height: 30px;
          color: #000;
          z-index: 100;
          background: #fff;
          border-radius: 100%;
          z-index: 999999;
          line-height: 30px;
          font-size: 1.3em;
       }
    
   .faixa-destaque .link{
   display: inline-block;
    width: 100%;
    height:100%;
 

   }
    .faixa-destaque {
    	 display:none;
    	position: fixed;
    z-index: 100;
    text-align: center;
    left:5%;
    top: 150px;
   
}

	.datepicker {   
    z-index: 999999 !important;
}

</style>

	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PVZQS48F');</script>
<!-- End Google Tag Manager -->


</head>
<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVZQS48F"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<div class="loading-dot" style="--n: 5;">
  <div class="dot" style="--i: 0;"></div>
  <div class="dot" style="--i: 1;"></div>
  <div class="dot" style="--i: 2;"></div>
  <div class="dot" style="--i: 3;"></div>
  <div class="dot" style="--i: 4;"></div>
</div>
	<div id="tudo">
		<header>
			<div class="container">
				<div class="logo">
					<a href="{{route('home')}}">
						<img src="{{asset('min/img/logo-bra.png')}}" alt="vestro - Locadora de veículos">
					</a>
						<div class="slogan">
						Locadora de veículos
					</div>
				</div>
				<div id="nav-icon2" data-alvo="nav#menu">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
				<a id="iconReserva" href="#" class="animated swing">
					<i class="fa fa-car" aria-hidden="true"></i>
				</a>
				<nav id="menu">
					<ul>
						 {!!$menuPrincipal!!}
					</ul>
				</nav>
			</div>
			<div class="clearfix"></div>
		</header>
		<div id="conteudo">
			@yield('filtro')
			@yield('content')
		</div>

		
		<footer>
			<div class="rodape-verde"> Estamos COBRINDO OS PREÇOS da concorrência. Ligue para nós! Por tempo LIMITADO Aproveite. </div>
			<div class="controle">
				<div class="row">
				<a href="https://api.whatsapp.com/send?phone=5512982223921" target="_blank" class="wpp" style="left: calc(100% - 80px);">
								<i class="fab fa-whatsapp"></i>
						</a>
					<div class="col-md-4 col-sm-4 col-xs-6">
						<ul class="menu-fale-conosco">
						<h4>Contato</h4>
							<li><a href="tel:+55{{ preg_replace('([^0-9])','',$configSite['telefone'])}}" target="_blank" ><i class="telefone fas fa-phone"></i>{{$configSite['telefone']}} </a></li>
							<li><a href="https://api.whatsapp.com/send?phone=5512{{ preg_replace('([^0-9])','',$configSite['whatsapp'])}}" target="_blank" ><i class="fab fa-whatsapp"></i> {{$configSite['whatsapp']}}</a></li>
							<li><a href="mailto:{{$configSite['email']}}" target="_blank"><i class="fas fa-envelope"></i> {{$configSite['email']}}</a></li>
						</ul>
					</div>
					<div class="col-sm-4 col-md-4 col-xs-12">
						<h4>Localização</h4>
						<ul class="menu-fale-conosco">
							<li>
						<a href="https://www.google.com/maps/dir/?api=1&destination=<?=urlencode('Av. Dr. João Baptista Soares de Queiroz Júnior, 1210 - Jardim das Industrias, São José dos Campos - SP, 12240-290');?>" target="_blank" >Av. Dr. João Baptista Soares de Queiroz Júnior, 1210 - Jardim das Industrias, São José dos Campos - SP, 12240-290</a>
						</li>
</ul>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-6">
						
						<ul class="menu-navegacao">
						<h4>Navegação</h4>
						{!!$menuPrincipal!!}
						</ul>
					</div>
				</div>
			</div>
		</footer>
		</div>

		<div id="informacoes-legais" style="display: none;">
						<h3>INFORMAÇÕES GERAIS SOBRE A RESERVA</h3>
			<p><strong>Participação:</strong> CO PARTICIPAÇÃO EM CASO DE COLISÃO/ AVARIA VALOR: R$3.500,00 COPARTICIPAÇÃO EM CASO DE ROUBO/FURTO/INCÊNDIO/PERDA TOTAL. VALOR: R$5.000,00 Observação:    Em caso de multas e infrações de trânsito, será cobrado R$50,00 por multa, referente a taxa administrativa, mais o valor integral da multa sem qualquer desconto. O veículo é entregue no início da locação limpo, em caso de necessidade de lavagem na devolução, será cobrado R$40,00 ref. À lavagem simples ou R$90,00 ref. À lavagem completa (motor, caixa de ar, assoalho, etc). O valor deverá ser pago no ato da devolução</p>
			
			<h4>TAXA DE ENTREGA/DEVOLUÇÃO ENTRE FILIAIS</h4>
			<p><strong>ATENÇÃO:</strong> Não estão descritos nesta confirmação os valores de entrega / devolução em caso de retirada e entrega fora da LOCADORA ou ainda caso o veículo seja devolvido em outra filial - A TABELA ESTÁ DISPONÍVEL NA LOCADORA NO MOMENTO DA LOCAÇÃO</p>
			<h4> VALIDADE DA RESERVA</h4>
			<p><strong>IMPORTANTE: </strong>O Prazo desta reserva é valido até 1 (hora) da data / hora para entrega do veículo, após este horário a Vestro Multimarcas LTDA EPP não garante a efetividade e validade da mesma.</p>
			<h4> REQUISITOS PARA LOCAÇÃO</h4>
			<p>O CLIENTE, para retirar o veículo, deve possuir 21 anos de idade, no mínimo 2 anos de habilitação e crédito pré-aprovado pela Vestro Multimarcas LTDA  EPP com cartão de crédito a aprovação poderá ser imediata.</p>
			<h4> INFORMAÇÕES CADASTRAIS</h4>
			<p><strong>ATENÇÃO:</strong> Para sua comodidade e segurança, as informações inseridas em seu cadastro estão sujeitas à confirmação após qualquer reserva realizada na Vestro Multimarcas LTDA EPP. Caso haja qualquer divergência dos dados que possa acarretar em problemas na reserva, você será informado através do seu e-mail cadastrado.</p>
			<h4> ONDE RETIRAR O VEÍCULO:</h4>
			<p>FILIAL<br />
			Vestro Locadora de Veiculos LTDA EPP <br />
			AV. DR. JOÃO BATISTA SOARES DE QUEIROZ JUNIOR, 1210 <br />
			TEL. 12 39336225 </p>
		</div>

		<div class="faixa-destaque" >
        <div class="box-controle">
          <a href="" class="btnFechar"><i class="fa fa-times"></i></a>
		  				  
          <a href="https://vestro.com.br/alugue-mensal" class="link">
            <img src="{{asset('min/img/pop-up-flutuante.png')}}" alt="">
          </a>
		  
        </div>
      </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
	
	<script src="{{asset('/min/js/Vestro.js')}}"></script>
<script src="{{asset('vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-datepicker-master/dist/locales/bootstrap-datepicker.pt-BR.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
<script>

 

	$(document).ready(function(){
		 $('[data-toggle="tooltip"]').tooltip();
		var hoje = moment().format("YYYY-MM-DD");
		$( '.filtro input[name="hora_inicio"]').parent().find('li').each(function( index ) {
					 	if(moment($( this ).text(),'hh:mm:ss').hour() <= moment().hour()){
					 		$(this).addClass('hidden')
					 	};
		});

		$(".timeSelect li").click(function(e){
				var text = $(this).html();
				$(this).closest('div').find('input').val(text)
		})

	$('.calendar').datepicker({
		  	language: 'pt-BR',
    		startDate:'+0d',
    		ignoreReadonly: false,
    		daysOfWeekDisabled: [0,7],
			datesDisabled: ['20-12-2024','21-12-2024','22-12-2024','23-12-2024','24-12-2024','25-12-2024','26-12-2024','27-12-2024','28-12-2024','29-12-2024','30-12-2024','31-12-2024','01-01-2025']	
			}).on("changeDate", function(e) {
      	var name = $(this).attr('name');
      	var data = moment($(this).val(), "DD/MM/YYYY");
        var newDate = moment(data.format("YYYY-MM-DD"));

        var timeSelect = "hora_inicio";
      	var hoje = moment().format("YYYY-MM-DD");

		$( 'input[name="'+timeSelect+'"]').parent().find('li').removeClass('hidden')

		      	if(name == "data_inicio"){
		      		
			      	if(newDate.format("YYYY-MM-DD") == hoje){
			      		$( 'input[name="'+timeSelect+'"]').val(moment().hour()+":00")
			      		$( 'input[name="'+timeSelect+'"]').parent().find('li').each(function( index ) {
							 	if(moment($( this ).text(),'hh:mm:ss').hour() <= moment().hour()){
							 		$(this).addClass('hidden')
							 	};
						});
						
					}else{
						$( 'input[name="'+timeSelect+'"]').val('9:00')
					}

		      	}else{
		      		var timeSelect = "hora_termino";
		      		
		      	}

				if (name == "data_inicio") {
					var maxDate = moment(newDate).add(2, 'days').toDate();
					$('#data_termino').datepicker('setStartDate', maxDate);
    				$('#data_termino').datepicker('update');
    			}
      
			if(newDate.weekday() == 6 ){
				$( 'input[name="'+timeSelect+'"]').parent().find('li').each(function( index ) {
				 	if(moment($( this ).text(),'hh:mm:ss').hour() > 11){
				 		$(this).addClass('hidden')
				 	};
				});
			}else{
				if(newDate.format("YYYY-MM-DD") != hoje){
				$( 'input[name="'+timeSelect+'"]').parent().find('li').removeClass('hidden')
				}
			}
			 
    		});

		})








	$.fn.extend({
  animateCss: function(animationName, callback) {
    var animationEnd = (function(el) {
      var animations = {
        animation: 'animationend',
        OAnimation: 'oAnimationEnd',
        MozAnimation: 'mozAnimationEnd',
        WebkitAnimation: 'webkitAnimationEnd',
      };

      for (var t in animations) {
        if (el.style[t] !== undefined) {
          return animations[t];
        }
      }
    })(document.createElement('div'));

    this.addClass('animated ' + animationName).one(animationEnd, function() {
      $(this).removeClass('animated ' + animationName);

      if (typeof callback === 'function') callback();
    });

    return this;
  },
});

	@if(!Route::is('alugue.mensal'))
    $(window).scroll(function(){

          scroll = $(window).scrollTop();

      if (scroll >= 10 && !$(".faixa-destaque").hasClass("feito")){

        $(".faixa-destaque").show('0');
        
        $('.faixa-destaque').animateCss('bounceIn');
        $(".faixa-destaque").addClass("feito");
      
      }
    });
	@endif
	
    $(".faixa-destaque .btnFechar").click(function(e){
      e.preventDefault();

      $(".faixa-destaque").removeClass('bounceIn');
       $('.faixa-destaque').hide(500);
      $('.faixa-destaque').animateCss('bounceOut');

    })
	</script>
	
	@yield('pos-script')
	
	<script>
		$(".loading-dot").fadeOut('fast');
	</script>
	

</body>
</html>