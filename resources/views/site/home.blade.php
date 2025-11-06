@extends('layouts.site')

@section('pre-assets')
   <style>
   
   input[type=button], input[type=submit], input[type=reset] {
    background-color: #04AA6D;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
  }
     .imgFront{
      margin: 0 auto;
     }
    .conversarWhats {
      padding: 5px;
      text-align: center;
      color: #fff;
      font-family: Oswald,sans-serif;
      font-size: 1.5em;
      display: inline-block;
      background: #329c11;
  }
  @media (max-width: 600px) {
 /* .conversarWhats{
	position: fixed;
    top: 66px;
    z-index: 100;
    width: 100%;
    left: 0;
  }*/
}
  .conversarWhats:hover {
    text-decoration: none;
    background: #329c11;
    border-radius: 5px;
    color: #fff;
}

	.titulo-selecao{
		margin-top:30px;
		color: #black;
	}

	.carros-selecao {
		display:flex;
		flex-direction: row;
		justify-content: center;
		align-itens: center;
		font-size: 28px;
		color: #black;
	}

	.texto-selecao{
	  display:flex;
	  flex-direction:row;
	  justify-content:flex-end;
	  align-itens:flex-start;
      position: relative;
	  padding-bottom: 0;
    }

	.texto-selecao li {
		margin-left:20px;
		font-size: 25px;
	}

	.carro-secao {
		display:flex;
		justify-content: space-between;
	}

	.opcoes-selecao {
		display:flex;
		flex-direction: row;
		justify-content: center;
		align-itens: flex-end;
		padding-bottom: 80px;
	}


	
	.opcoes-selecao select {
		display:flex;
		flex-direction:row;
		justify-content: space-between;
		align-itens: center;
		margin-left: 90px;
		padding-left: 20px;
		margin-right: 40px;

	}

	.opcoes-selecao select option:hover {
		background: #84c223;
		color: #fff;
	}

	.btn-reserva {
		background-color: #84c223;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		border-radius: 15px;
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.1), 0 6px 10px 0 rgba(0,0,0,0.1);
	}

	.btn-reserva:hover {
		background-color: #3e8e41;
	}

	.btn-reserva:active {
  		background-color: #3e8e41;
  		box-shadow: 0 5px #666;
  		transform: translateY(4px);
	}

	.options-selecao {
		display: flex;
		justify-content: space-around;
		flex-direction:row;
		position: relative;
	}


@media  (max-width: 767px){
	.especificacao{
		flex-direction:column;
	}	
}

@media only screen and (max-width: 599px){
	.mobile { display: block !important;
}
 .desktop { display: none !important;
}

}

@media only screen and (min-width: 600px){
	.mobile { display: none !important;
}
 .desktop { display: block !important;
}

}

.slider.multiple-items {
    width: 44%;
}

.slick-arrow{
	z-index: 1 !important;
}
</style>
@endsection

@section('filtro')
    @include('site.include.filtro')
@endsection

@section('content')
<div class="row" style="overflow: hidden;">
  <div class="col-sm-12 text-center">
    <a class="conversarWhats animated infinite pulse" href="https://api.whatsapp.com/send?phone=5512982223921" target="_blank"><i class="fab fa-whatsapp fa-fw"></i> Conversar agora via WhatsApp</a>
  </div>
</div>



<div class="container p-all-lg">

		<div class="row" style="display: flex; justify-content: center; flex-direction: column;">
					<div class="col-sm-12" style="text-align: center;">
						<p style="font-size: 25px;"> Não trabalhamos com </p>
					</div>					
					<div style= "display: flex; justify-content: center;">
						<p style="background-color: black; color: white; border-radius: 10px; font-size: 40px; text-align: center;"> UBER e 99</p>
					</div>		
		</div>


	@foreach($grupos as $item)
					<div class="grupo-veiculos"> 
						<div class="item-veiculos">
							<div class="categoria">
								<span class="tit-categoria">{{$item->sigla_grupo}} - {{$item->nome_grupo}}</span>
							</div>
							<div class="veiculo">
								<img src="{{$item->media->fullPatch()}}" alt="">
								<div class="titulo-selecao">
								 	<span class="carros-selecao">{{$item->veiculos[0]->nome}} ou similar</span>
								</div>
							</div>

							
							<div class="especificacao">
								<div class="col-xs-12 col-sm-6">
									<?php $i = 0; 
										$totalpPage = 20;
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
									<div class="carro-secao">
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

								<div class="col-xs-12 col-sm-6">
									<div class="row">
										<div class="col-sm-12">
												<h4 class="m-bottom-xs m-top-md">Periodo de Contrato</h4>
 
												<select id="select-1" name="periodo" class="form-control">
													<option value="">Selecione</option>
													<option value="6 Meses">6 Meses</option>
												   <option value="12 Meses">12 Meses</option>
												   <option value="18 Meses">18 Meses</option>
												   <option value="24 Meses">24 Meses</option>
												   <option value="36 Meses">36 Meses</option>
											   </select>
										</div>
										<div class="col-sm-12">
											<h4 class="m-bottom-xs m-top-md">Franquia de Kms/Mês</h4>

											<select id="select-2" name="franquia" class="form-control">
												<option value="">Selecione</option>
												<option value="1.000 Km">1.000 Km</option>
											   <option value="1.500 Km">1.500 Km</option>
											   <option value="2.000 Km">2.000 Km</option>
											   <option value="3.000 Km">3.000 Km</option>
											   <option value="4.000 Km">4.000 Km</option>
										   </select>
										</div>
									</div>
								<div class="row m-top-lg">
									<div class="col text-center">
										<button type="button" class="btn-reserva" data-veiculo="{{$item->id}}" > Simular </button>
									</div>
								</div>
								</div>					
								</div>
							</div>				
				</div>
				@endforeach

</div>

 

            {!! Form::model(null,['route'=>['site.search'],'class'=>'formGroup']) !!}
            <input type="hidden" name="grupo_id" value="">
                                       
{!! Form::close() !!}

<div class="clearfix"></div>

<div class="">
    <div class="slider single-item p-bottom-lg justify-content-center">
               
		@foreach($banners as $key => $banner)
            <div class="item">
                <a @if($banner->link != "") href="{{$banner->link}}" @endif >
				 @if($banner->media_desktop != "")
                <img src="{{URL::to('/')}}/img/banners/{{@$banner->media_desktop}}" class="desktop">
				@endif
                @if($banner->media_mobile != "")
                <img src="{{URL::to('/')}}/img/banners/{{@$banner->media_mobile}}" class="mobile">
                 @endif
                </a>
            </div>
        @endforeach
      
        </div>
</div>

<div class="clearfix"></div>

<section id="quem-somos" class="p-auto-all-0" style="margin-top: 50px;">
            <div class="container texto">
                <h2>Quem Somos</h2>
                <div>
                    <p><strong>VESTRO Locadora de Veículos</strong>, atua no mercado de locação de veículos no seguimento corporativo e pessoa física. Com serviços em constante inovação e alinhados às últimas novidades tecnológicas.<br></p>                   
                    <p>Atendemos locações com os mais variados perfis destacando-se a terceirização de 
                    frotas, locações diárias, mensais e eventuais, atendimentos a seguradoras, 
                    concessionárias, agências de turismo, hotéis entre outros.</p>
                    <p> 
                    Oferecemos uma estrutura operacional necessária e adequada para melhor atendê-
                    lo e estamos à disposição para receber seu chamado em todos os sentidos.</p>                   
                </div>
            </div>
</section>  



<div class="clearfix"></div> 
        


            <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
				  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						  </button>
						</div>
					<div class="modal-body">
						  <div class="col-md-12">
							  <br>
							  <div>
								  {!!Form::open(['route'=>'mensal.send','id'=>"fale-conosco", 'class'=>''])!!}

								  <input type="hidden" name="veiculo">
								  <input type="hidden" name="franquia">
								  <input type="hidden" name="periodo">
								  <div class="grupo-formulario"> 
									  <div class="clearfix p-top-sm"></div>
									  <div class="col-md-6 col-xs-12 p-xs-all-0">
										<div class="p-top-sm">Período de Contrato</div>
										<div class="periodo"></div>
									</div>
									<div class="col-md-6 col-xs-12 p-xs-all-0">
										<div class="p-top-sm">Franquia de Kms/Mês</div>
										<div class="franquia"></div>
									</div>
									  <div class="col-md-6 col-xs-12 p-xs-all-0">
										  <div class="p-top-sm">Nome:</div>
										  <input type="text" class="form-control" name="nome" value="" required>
									  </div>
									  <!--
									  <div class="col-md-6 col-xs-12 p-xs-all-0">
										  <div class="p-top-sm">Email:</div>
										  <input type="text" class="form-control" name="email" value="">
									  </div>
									-->
									  <div class="col-md-6 col-xs-12 p-xs-all-0">
										  <div class="p-top-sm">Telefone:</div>
										  <input type="text" class="form-control telMask" name="telefone" value="" required>
									  </div>
									  <!--
									  <div class="col-md-6 col-xs-12 p-xs-all-0">
										  <div class="p-top-sm">Empresa:</div>
										  <input type="text" class="form-control " name="empresa" value="">
									  </div>
										-->
									  <div class="clearfix"></div>									 
									  <div class="col-md-6 col-xs-12 p-xs-all-0">
										  <div class="item-form">
											  <div class="p-top-sm">Data Retirada:</div>
											  <div class="input-list">
												  <input type="text" class="calendar form-control" autocomplete="off" value="{{@$dataInicio}}" name="data_inicio" placeholder="Quando ?">
											  </div>
										  </div>
									  </div>
									  <!--									
									  <div class="col-md-6 col-xs-12 p-xs-all-0">
										  <div class="item-form">
											  <div class="p-top-sm">Data Devolução:</div>
											  <div class="input-list">
												  <input type="text" class="calendar form-control" autocomplete="off" value="{{@$dataTermino}}" name="data_termino" placeholder="Quando ?">
											  </div>
										  </div>
									  </div>
									-->
									  <div class="col-md-6 col-xs-12 p-xs-all-0">
										  <div class="item-form">
											  <div class="p-top-sm">Modelo de Contratação</div>
											  <div class="input-list">
													<div class="col-xs-6">
												  <input type="radio" class="form-check-input" autocomplete="off" value="PJ" name="modelo_contratacao">
												  <label for="PJ">PJ</label>
												</div>
													<div class="col-xs-6">
												  <input type="radio" class="form-check-input p-left-md" autocomplete="off" value="PF" name="modelo_contratacao">
												  <label for="PF">PF</label>
												</div>
											  </div>
										  </div>
									  </div>
									<!--
									  <div class="col-md-6 col-xs-12 p-xs-all-0">
										  <div class="p-top-sm">Valor Pretendido:</div>
										  <input type="text" class="form-control moneyMask" name="valor" value="">
									  </div>
										-->
									  <div class="clearfix"></div>
									  <div class="clearfix"></div>		
									  <!--		
									  <div class="col-md-12 col-xs-12 p-xs-all-0">
										  <div class="p-top-sm">
											  Observação 
										  </div>
										  <textarea name="mensagem" rows="5" id=""  class="form-control p-xs-all-0"></textarea>
									  </div>
									-->
									  <div class="col-xs-12 col-sm-9 p-top-md"><h5>Vamos fazer a melhor condição do mercado para você.</h5></div>
									  <div class="col-xs-12 col-sm-3">
									  <button type="submit" class="btn-enviar">Enviar <i class="fas fa-paper-plane"></i></button>
									  </div>
									
							  </div>
							  {!!Form::close()!!}
						  </div>
									  
					  </div>
					  <div class="clearfix"></div>
					  </div>
				
				  </div>
				</div>
			</div>

@endsection



@section('pos-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

	$("body").on('click','.btn-reserva',function(e){
		e.preventDefault();
		var veiculo = $(this).data('veiculo');
		var franquia = $(this).closest('.especificacao').find('select[name="franquia"]').val();
		var franquiaHtml = $(this).closest('.especificacao').find('select[name="franquia"] :selected').text();
		var periodo = $(this).closest('.especificacao').find('select[name="periodo"]').val();
		var periodoHtml = $(this).closest('.especificacao').find('select[name="periodo"] :selected').text();
		if(franquia == "" || periodo == ""){
			
			swal("Atenção!","Selecione uma franquia ou período", "warning");
			return false
		}
		$('input[name="veiculo"]').val(veiculo);
		$('input[name="franquia"]').val(franquia);
		$('input[name="periodo"]').val(periodo);
		$('.periodo').html(periodoHtml);
		$('.franquia').html(franquiaHtml);

		$("#modalCadastro").modal('show')
	})
	$("#fale-conosco").submit(function(e) {
					$("#btEnviar").attr('disabled',true)
			  		e.preventDefault();
			  		$(".loading-dot").fadeIn('fast');
				    var url = $(this).attr('action'); // the script where you handle the form input.
				    $.ajax({
				           type: "POST",
				           url: url,
				           data: $("#fale-conosco").serialize(), // serializes the form's elements.
				           success: function(data)
				           {
				           	console.log(data)
				              if(data == "enviado"){
				              	$(".loading-dot").fadeOut('fast');
				              	
				              	swal("Sucesso!","Formulário enviado com sucesso, em breve entraremos em contato.", "success");
								$("#fale-conosco")[0].reset();
								$("#btEnviar").attr('disabled',false)
				              	$(".loading-dot").fadeOut('fast');
				              
				              	
				              }
				           },error:function(data){
							console.log(data)
							$(".loading-dot").fadeOut('fast');
				           	swal("Ops!","Não conseguimos enviar seu pedido, entre em contato nos meios abaixo.", "info");
				           }
				         });

				    e.preventDefault(); // avoid to execute the actual submit of the form.
				});

    $(".carros a").click(function(e){
        e.preventDefault();
        var grupo_id = $(this).data('grupo');
        $('.formGroup').find('input[name="grupo_id"]').val(grupo_id);
        $('.formGroup')[0].submit()

    })
        $('.single-item').slick({
          autoplay: true,
        });
        $('.multiple-items').slick({
            infinite: true,
            adaptiveHeight: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
            {
              breakpoint: 768,
              settings: {
              adaptiveHeight: true,
               slidesToShow: 2,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                adaptiveHeight: true,
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
        });
    </script>
@endsection