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
		<div class="passo active">
			<span class="number ">2</span>
			<h3>DADOS DE PAGAMENTO</h3>
		</div>
		<div class="passo">
			<span class="number ">3</span>
			<h3>PAGAMENTO</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-sm-8 col-sm-offset-2 p-all-0 m-top-lg">
		{!!Form::open(['route'=>'inscricao.dados-pagamento.store','id'=>'dados-formulario', 'class'=>''])!!}
		<input type="hidden" name="id" id="id" value="">
		<input type="hidden" name="token_pagseguro" id="token_pagseguro" value="">
		<input type="hidden" name="valor_congresso" id="valor" value="{{$inscricoes[0]['congresso']['valor']}}">
		<div class="col-sm-6">
			<div class="form-group ">
				<label for="">Usar dados participante:</label>
				<select class="form-control btn-flat" id="idFaturamento" >
					<option value="">Selecione...</option>
					@foreach($inscricoes as $inscricao)
					<option value="{{$inscricao->id}}">{{$inscricao->nome}}</option>
					@endforeach
					
				</select>
			</div>
			<div class="form-group ">
				<label for="">Nome</label>
				<input type="text" name="nome" id="nome" required="" class="form-control btn-flat">
			</div>
			<div class="form-group ">
				<label for="">E-mail</label>
				<input type="email" name="email" id="email" required="" class="form-control btn-flat" >
			</div>
			<div class="form-group">
				<label for="">Telefone</label>
				<input type="text" name="telefone" id="telefone" required="" class="form-control btn-flat masktel" >
			</div>
			<div class="form-group">
				<label for="">CPF</label>
				<input type="text" name="cpf" id="cpf" required="" class="form-control btn-flat maskCpf">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="col-sm-6 p-left-0">
				<div class="form-group">
					<label for="">Data Nascimento</label>
					<input type="text" name="data_nascimento" class="form-control btn-flat dataMask" required="" id="">
				</div>
			</div>
			<div class="col-sm-6 p-right-0">
				<div class="form-group">
					<label for="">Sexo</label><br>
					<select class="form-control btn-flat" required="" name="sexo" id="sexo">
						<option value="">Selecione</option>
						<option value="M">Masculino</option>
						<option value="F">Feminino</option>
					</select>
				</div>
			</div>
			
			
			
			
			<div class="col-sm-12 p-all-0">
				<div class="form-group">
					<label for="">Cep</label>
					<input type="text" class="form-control btn-flat cepMask" required id="cep" name="cep">
				</div>
			</div>
			<div class="col-sm-8 p-left-0">
				<div class="form-group">
					<label for="">Endereço</label>
					<input type="text" disabled="" class="form-control btn-flat" id="endereco" required  name="endereco">
				</div>
			</div>
			<div class="col-sm-4 p-all-0">
				<div class="form-group">
					<label for="">Número</label>
					<input type="number" disabled="" class="form-control btn-flat" id="numero" required name="numero">
				</div>
			</div>
			<div class="col-sm-6 p-left-0">
				<div class="form-group">
					<label for="">Complemento</label>
					<input type="text" disabled="" class="form-control btn-flat" id="complemento" required  name="complemento">
				</div>
			</div>
			<div class="col-sm-6 p-all-0">
				<div class="form-group">
					<label for="">Bairro</label>
					<input type="text" disabled="" class="form-control btn-flat" id="bairro" required  name="bairro">
				</div>
			</div>
			<div class="col-sm-6 p-left-0">
				<div class="form-group">
					<label for="">Cidade</label>
					<input type="text" disabled="" class="form-control btn-flat" id="cidade" required name="cidade">
				</div>
			</div>
			<div class="col-sm-3 p-left-0">
				<div class="form-group">
					<label for="">Estado</label>
					<input type="text" disabled="" class="form-control btn-flat" id="estado" required  name="estado">
				</div>
			</div>
			<div class="col-sm-3 p-all-0">
				<div class="form-group">
					<label for="">País</label>
					<input type="text" disabled="" class="form-control btn-flat" id="pais" required  name="pais">
				</div>
			</div>
		</div>
		<div class="col-sm-10 col-sm-offset-2">
			
			<button type="submit" class="btn btn-primary  btn-flat col-sm-3 pull-right" id="btAvancar">Avançar</button>
		</div>
		{!!Form::close()!!}
	</div>

</div>	
@endsection

@section('pos-script')
<script>
	$(document).ready(function(){
		$(".cepMask").change(function(){
			var str = $(this).val();
			var res = str.replace("-", "");
			$("#endereco,#numero,#complemento,#bairro,#cidade,#estado,#pais").attr('disabled',false);
			$.get('http://cep.republicavirtual.com.br/web_cep.php?cep='+res+ '&formato=json',function(data){
				console.log(data);

				$("#endereco").val(data.logradouro)
				$("#bairro").val(data.bairro)
				$("#cidade").val(data.cidade)
				$("#estado").val(data.uf)
				$("#pais").val('Brasil')
			})		
			
			
		});
		$("#idFaturamento").change(function(){
			var url = '{{route("inscricao.dados-participante")}}';
			$.post('{{route("inscricao.dados-participante")}}',{'id':$(this).val(),"_token": "{{ csrf_token() }}",},function(data){
				

				$("#id").val(data.id)
				$("#nome").val(data.nome)
				$("#email").val(data.email)
				$("#telefone").val(data.telefone)
				$("#cpf").val(data.cpf)
				$("#token_pagseguro").val(data.token_pagseguro)
				$("#valor").val(data.congresso.valor)
			})
		})
	})
</script>
@endsection