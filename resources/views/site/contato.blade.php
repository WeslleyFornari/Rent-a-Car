@extends('layouts.site')
@section('title', 'Home')
@section('pre-assets')
<style>

</style>
@endsection
@section('content')
        
            <div class="container">
               
              
                <div class="col-md-12">
					<div class="tit-reserva">
					 <h2>{{$conteudo->titulo_conteudo}}</h2>
					</div>
					<div class="col-md-6">
						  {!!$conteudo->texto!!}
					</div>
					<div class="col-md-6">
						{!!Form::open(['route'=>'contato.send','id'=>"fale-conosco", 'class'=>''])!!}
						<div class="grupo-formulario"> 
							<div class="clearfix p-top-sm"></div>
							<div class="col-md-6 col-xs-12 p-xs-all-0">
								<div class="p-top-sm">Nome:</div>
								<input type="text" class="form-control" name="nome" value="" required="">
							</div>
							<div class="col-md-6 col-xs-12 p-xs-all-0">
								<div class="p-top-sm">Email:</div>
								<input type="text" class="form-control" name="email" value="" required="">
							</div>
							<div class="col-md-6 col-xs-12 p-xs-all-0">
								<div class="p-top-sm">Telefone</div>
								<input type="text" class="form-control telMask" name="telefone" value="" required="">
							</div>
							<div class="col-md-6 col-xs-12 p-xs-all-0">
								<div class="p-top-sm">Assunto</div>
								<input type="text" class="form-control" name="assunto" value="" required="">
							</div>
							<div class="clearfix"></div>

							<div class="clearfix"></div>				
							<div class="col-md-12 col-xs-12 p-xs-all-0">
							<div class="p-top-sm">Observação </div>
								<textarea name="mensagem" rows="5" id=""  class="form-control p-xs-all-0" required=""></textarea>
							</div>
							<div class="clearfix"></div>
							<div class="p-top-md p-left-sm">
							{!! Recaptcha::render() !!}
							</div>
							<button type="submit" class="btn-enviar">Enviar <i class="fas fa-paper-plane"></i></button>
							
					</div>
					{!!Form::close()!!}
					</div>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.5632042181123!2d-45.92047643498568!3d-23.222583805053812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc359e00669f79%3A0x888c90042c17f071!2sAv.+Dr.+Jo%C3%A3o+Baptista+Soares+de+Queiroz+J%C3%BAnior%2C+1210+-+Jardim+das+Industrias%2C+S%C3%A3o+Jos%C3%A9+dos+Campos+-+SP%2C+12240-290!5e0!3m2!1spt-BR!2sbr!4v1554216951637!5m2!1spt-BR!2sbr" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
							<div class="clearfix p-bottom-md"></div>

					</div>
            </div>

            
            
            
        
@endsection




@section('pos-script')



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>




	$("#fale-conosco").submit(function(e) {
					$("#btEnviar").attr('disabled',true)
			  		e.preventDefault();
			  		$(".loading-dot").fadeIn('fast');
				    var url = "{{route('contato.send')}}"; // the script where you handle the form input.

				    $.ajax({
				           type: "POST",
				           url: url,
				           data: $("#fale-conosco").serialize(), // serializes the form's elements.
				           success: function(data)
				           {
				           	console.log(data)
				           	if(data == "robot-detected"){
				           		alert("Por favor, preencha o Recaptcha");
				           		$(".loading-dot").fadeOut('fast');
				           	}
				              if(data == "enviado"){
				              	$(".loading-dot").fadeOut('fast');
				              	
				              	swal("Sucesso!","Formulário enviado com sucesso, em breve entraremos em contato.", "success");
								$("#fale-conosco")[0].reset();
								$("#btEnviar").attr('disabled',false)
				              	$(".loading-dot").fadeOut('fast');
				              
				              	
				              }
				           }
				         });

				    e.preventDefault(); // avoid to execute the actual submit of the form.
				});
</script>

@endsection