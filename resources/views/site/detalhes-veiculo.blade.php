@extends('templates.site')
@section('title', 'Home')
@section('pre-assets')
<style>

</style>
@endsection
@section('content')
		
			

			<div id="detalhes-veiculos">
				<div class="titulo">
					<div class="content">
						<h2>{{$veiculo->titulo}}<br><small>{{$veiculo->modelo_versao}}  {{$veiculo->ano_modelo}}</small></h2>
					</div>
				</div>
				<div class="content panel">
					<div class="fotos">
						@foreach($veiculo->fotos as $foto)
						<div class="foto">
							<picture>
									<img srcset="{{$foto->arquivo}}" alt="">
							</picture>
							
						</div>
						@endforeach
						
					</div>
					<div class="desc">
						<ul>
							<li>{{$veiculo->cor}}, </li>
							<li>{{$veiculo->portas}} portas, </li>
							<li>{{$veiculo->combustivel}}, </li>
							<li>{{$veiculo->km}} Km,</li>
						</ul>
					</div>
					<div class="form-cotacao">
						<h3>Faça uma cotação</h3>
						
						{!!Form::open(['route'=>'cotacao.send','id'=>"cotacao", 'class'=>''])!!}
							<input type="hidden" name="veiculo_id" value="{{$veiculo->id}}">
							<input type="hidden" name="link" value="{{route('veiculos.detalhes',$veiculo->slug)}}">
							<input type="hidden" name="veiculo" value="{{$veiculo->titulo}}<br>{{$veiculo->modelo_versao}} - {{$veiculo->ano_modelo}}">
							<div class="loading">
								<div class="sk-cube-grid">
								  <div class="sk-cube sk-cube1"></div>
								  <div class="sk-cube sk-cube2"></div>
								  <div class="sk-cube sk-cube3"></div>
								  <div class="sk-cube sk-cube4"></div>
								  <div class="sk-cube sk-cube5"></div>
								  <div class="sk-cube sk-cube6"></div>
								  <div class="sk-cube sk-cube7"></div>
								  <div class="sk-cube sk-cube8"></div>
								  <div class="sk-cube sk-cube9"></div>
								</div>
							</div>
							<div class="form-group">
								<label for="">NOME</label>
								<input type="text" name="nome" class="form-control">
							</div>
							<div class="form-group">
								<label for="">E-MAIL</label>
								<input type="text" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label for="">TELEFONE</label>
								<input type="text" name="telefone" class="form-control telMask">
							</div>
							<div class="form-group">
								<label for="">VALOR ENTRADA</label>
								<input type="text" name="valor_entrada" class="form-control moneyMask" placeholder="R$ 9.999,99">
							</div>
							<div class="form-group">
								<label for="">VALOR PARCELA PRETENDIDA</label>
								<input type="text" name="valor_parcela" class="form-control  moneyMask" placeholder="R$ 999,99">
							</div>
							<button id="btEnviar" class="btn btn-block bg-preto">ENVIAR</button>
						{!!Form::close()!!}
					</div>
					<hr>
					<div class="col-sm-8 col-xs-12">
						<h3 class="m-top-0">Equipamentos e Acessórios</h3>
						
						@if($veiculo->equipamentos != "")
						<ul class="opcionais">

						<?php $opcionais = explode(",",$veiculo->equipamentos);
									$divisao = ceil(count($opcionais)/ 2);
								
								for ($i=0; $i < count($opcionais); $i++) { 
									
									if($i == $divisao){
										echo '</ul><ul class="opcionais">';
									}else{
									echo '<li>'.$opcionais[$i].'</li>';
									}
								}
							?>
							
						
						</ul>
						@endif
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="selos">
							<ul>
								<li><a href="" data-toggle="modal" data-target="#modalCertificado">
									<div class="title">certificadode qualidade</div>
									<div class="img">
											<img src="{{asset('min/img/icon-certificado-preto.png')}}" alt="">
									</div>
									</a>
								</li>
								<li>
									<a href="" data-toggle="modal" data-target="#modalChecklist">
									<div class="title">ckecklist de revisão</div>
									<div class="img">
											<img src="{{asset('min/img/icon-checklist-preto.png')}}" alt="">
									</div>
									</a>
								</li>

							</ul>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			
			</div>
			
		@include("includes.modais-certificados")
@endsection
@section('filtro')

@include('includes.filtro-basico')



@endsection
@section('pos-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$("#cotacao").submit(function(e) {
		$("#btEnviar").attr('disabled',true)
			  		e.preventDefault();
			  		$(".loading").fadeIn('fast');
				    var url = "{{route('cotacao.send')}}"; // the script where you handle the form input.

				    $.ajax({
				           type: "POST",
				           url: url,
				           data: $("#cotacao").serialize(), // serializes the form's elements.
				           success: function(data)
				           {
				           	console.log(data)
				              if(data == "enviado"){

								swal("Sucesso!","Formulário enviado com sucesso, em breve entraremos em contato.", "success");
								$("#cotacao")[0].reset()

				              	$(".loading").fadeOut('fast');
				              	
				              }
				           }
				         });

				    e.preventDefault(); // avoid to execute the actual submit of the form.
				});
</script>
@endsection