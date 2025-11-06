@extends('templates.site')
@section('title', 'Home')
@section('pre-assets')
<style>

</style>
@endsection
@section('content')
		
			<div class="content panel">
				<h2>{{$conteudo->titulo_conteudo}}</h2>
				{!!$conteudo->texto!!}
			
				
				<div class="col-sm-6 p-xs-all-0 col-xs-12">
					<div class="contatos" class="">
						
						<div><i class="fa fa-phone"></i><a href="tel.:+551230215010" class=""><strong>	(12) 3021-5010</strong></a></div>
						<div><i class="fa fa-phone"></i><a href="tel.:+551239163630
							" class=""><strong>	(12) 3916-3630</strong></a></div>
							<div class=""><i class="fa fa-whatsapp"></i>
								<a href="https://api.whatsapp.com/send?phone=5512999999999" class="">(12) 9999-99999</a>
								
							</div>
							<div><i class="fa fa-envelope" aria-hidden="true"></i>
								<a href="mailto:contato@veiculoscapital.com.br"> contato@veiculoscapital.com.b </a></div>
								
							</div>
						</div>
						<div class="col-sm-6 p-xs-all-0  col-xs-12">
							<div id="resultado">
							<div class="alert alert-success alert-dismissible">
							
							<h2><i class="fa fa-paper-plane" aria-hidden="true"></i> Formulário enviado com sucesso.</h2>
							<h3>Em breve entraremos em contato.</h3>
							<h3>Obrigado</h3>
</div>
						</div>
							{!!Form::open(['route'=>'fale-conosco.send','id'=>"fale-conosco", 'class'=>''])!!}
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
								<div class="col-sm-6 p-xs-all-0">
									<label for="">Nome</label>
									<input type="text" name="nome" class="form-control ">
								</div>
								<div class="col-sm-6 p-xs-all-0">
									<label for="">E-mail</label>
									<input type="email" name="email" class="form-control ">
								</div>
								<div class="col-sm-6 p-xs-all-0">
									<label for="">Telefone</label>
									<input type="text" name="telefone" class="form-control telMask">
								</div>
								<div class="col-sm-6 p-xs-all-0">
									<label for="">Assunto</label>
									<input type="text" name="assunto" class="form-control ">
								</div>
								
								<div class="col-sm-12 p-xs-all-0">
									<label for="">Mensagem</label>
									<textarea name="mensagem" rows="5" id="" class="form-control btn-block "></textarea>
									
								</div>
								<div class="col-xs-12 col-sm-4 pull-right text-center m-top-md p-xs-all-0">
									<button id="btEnviar" class="btn bg-amarelo btn-block  ">Enviar</button>
								</div>
							{!!Form::close()!!}
						</div>
						<div class="clearfix m-bottom-lg"></div>
					
			
			</div>

			
			
			
		
@endsection
@section('filtro')

@include('includes.filtro-basico')



@endsection
@section('pos-script')
<script>
	$("#fale-conosco").submit(function(e) {
		$("#btEnviar").attr('disabled',true)
			  		e.preventDefault();
			  		$(".loading").fadeIn('fast');
				    var url = "{{route('fale-conosco.send')}}"; // the script where you handle the form input.

				    $.ajax({
				           type: "POST",
				           url: url,
				           data: $("#fale-conosco").serialize(), // serializes the form's elements.
				           success: function(data)
				           {
				           	console.log(data)
				              if(data == "enviado"){
				              	$(".loading").fadeOut('fast');
				              	
				              	swal("Sucesso!","Formulário enviado com sucesso, em breve entraremos em contato.", "success");
								$("#fale-conosco")[0].reset();

				              	$(".loading").fadeOut('fast');
				              
				              	
				              }
				           }
				         });

				    e.preventDefault(); // avoid to execute the actual submit of the form.
				});
</script>
@endsection