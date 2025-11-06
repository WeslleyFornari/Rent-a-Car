@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
  <div class="row">
        <div class="col-sm-12">
          <h1>{{$conteudo[0]->titulo_conteudo}}</h1>
          {!!$conteudo[0]->texto!!}
        
			<div id="box-formulario">
						<div class="col-sm-8 col-xs-12 p-all-0">
						<div id="resultado">
							<div class="alert alert-success alert-dismissible">
							
							<h2><i class="fa fa-paper-plane" aria-hidden="true"></i> Formulário enviado com sucesso.</h2>
							<h3>Em breve entraremos em contato.</h3>
							<h3>Obrigado</h3>
</div>
						</div>
							{!!Form::open(['route'=>'fale-conosco.send','id'=>"fale-conosco", 'class'=>''])!!}
								<div class="col-sm-4">
									<div class="form-group">
									    <label for="">Nome</label>
									    <input type="text" name="nome" class="form-control btn-flat" >
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
									    <label for="">E-mail</label>
									    <input type="text" name="email" class="form-control btn-flat" >
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
									    <label for="">Telefone</label>
									    <input type="text" name="telefone" class="form-control btn-flat">
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
									    <label for="">Assunto</label>
									    <input type="text" name="assunto" class="form-control btn-flat">
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
									    <label for="">Mensagem</label>
									    <textarea name="mensagem" id=""  class="form-control btn-flat"></textarea>
									    
									</div>
								</div>
								<div class="col-sm-4 pull-right">
									<button type="submit" id="btEnviar" class="btn btn-success btn-flat btn-block"> <i class="fa fa-envelope-o"></i> ENVIAR </button>
								</div>
								<div class="clearfix"></div>
							{!!Form::close()!!}
						</div>
						<div class="col-sm-4 col-xs-12 " id="contatosForm">
						<h3>Nossos Contatos</h3>
							<ul>
								<li>
									<a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>atendimento@abiblica.org.br</a>
								</li>
								<li class="separador"></li>
								<li>
									
									Av. Brigadeiro Luís Antônio 993, Sala 205<br>
									CEP: 01317-001 São Paulo – SP
								</li>
								<li class="separador"></li>
								<li>
									<a href="+5511979788892"> (11) 97978-8892</a>
									<a href="+5511952797387"> (11) 95279-7387</a>
								</li>
							</ul>
						</div>
					</div>
        </div>
      
      </div>


      

    
@endsection

@section('pos-script')
<script>
	$("#fale-conosco").submit(function(e) {
		$("#btEnviar").attr('disabled',true)
			  		e.preventDefault();

				    var url = "{{route('fale-conosco.send')}}"; // the script where you handle the form input.

				    $.ajax({
				           type: "POST",
				           url: url,
				           data: $("#fale-conosco").serialize(), // serializes the form's elements.
				           success: function(data)
				           {
				           	console.log(data)
				              if(data == "enviado"){
				              	$("#id_user").val(data.id)
				              
				              	$("#fale-conosco").addClass("animated fadeOutLeft").delay(500).queue(function(next) {
									$("#resultado").slideDown('0');
									$("#resultado").addClass("animated fadeInRight");
									 next();
								});
								$("#fale-conosco").slideUp('fast',function(){
									$("#form-dados").show(0);
									$("#form-dados").addClass("animated bounceInUp");
								});

								
								


				              }
				           }
				         });

				    e.preventDefault(); // avoid to execute the actual submit of the form.
				});
</script>
@endsection