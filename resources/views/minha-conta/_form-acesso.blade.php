{!!Form::open(['route'=>'minha-conta.update-password','id'=>"form-cadastro", 'class'=>'col-sm-6'])!!}
<h4>Trocar Senha</h4>

		<div class="col-sm-12">
			<div class="form-group">
				<label for="">E-mail</label>
				<input type="email" name="email" class="form-control btn-flat" id="" value="{{@$user->email}}">
			</div>
		</div><div class="col-sm-12">
			<div class="form-group">
				<label for="">Senha Atual</label>
				<input type="password" name="mypassword" class="form-control btn-flat" id="">
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<label for="">Nova Senha</label>
				<input type="password" name="password" class="form-control btn-flat" id="">
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<label for="">Repetir Nova Senha</label>
				<input type="password" name="password_confirmation" class="form-control btn-flat" id="">
			</div>
		</div>
		<div class="col-sm-12 pull-right">
			<button type="submit" class="btn btn-success btn-block btn-flat">TROCAR SENHA</button>
		</div>
		{!!Form::close()!!}