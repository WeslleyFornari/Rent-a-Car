@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
<div class="row">
	<div class="col-sm-10 col-sm-offset-1 ">
	 @include('errors._check')
		
		{!!Form::open(['route'=>'auth.login','id'=>"form-acessar", 'class'=>'col-sm-4 col-sm-offset-4'])!!}
		<h2 class="text-center">Acessar</h2>
		 
		<div class="col-sm-12">
			<div class="form-group">
				<label for="">E-mail</label>
				<input type="email" name="email" class="form-control btn-flat" id="">
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<label for="">Senha</label>
				<input type="password" name="password" class="form-control btn-flat" id="">
			</div>
		</div>
		
		<div class="col-sm-12 pull-right">
			<button type="submit" class="btn btn-success btn-block btn-flat">ENTRAR</button>
		</div>
		<div class="col-sm-12 m-top-xs">
		<a href="{{route('esqueci-senha')}}">Esqueci minha senha</a>
			</div>
		{!!Form::close()!!}

		
	</div>
	
</div>





@endsection

@section('pos-script')
<script>
	$(document).ready(function(){

		/*$("#cep").change(function(){
			var cepVal = $(this).val();
			$.post("{{route('ajax.cep')}}",{cep:cepVal},function(data){
				console.log(data)
			})
		})*/
		$("#li_aceito").change(function(){

			if($(this).is(":checked")){
				$("#btAvancar").removeAttr("disabled");
				$("#btAvancar").removeClass("btn-default")
				$("#btAvancar").addClass("btn-success")
			}
		})
		
		
	})
</script>
@endsection