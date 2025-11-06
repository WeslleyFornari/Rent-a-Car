@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
	<div class="row">
		
		<div class="col-sm-4 col-sm-offset-4 text-center">
						
				 		
			<h2>Recuperação de senha</h2>
			<div class="m-top-sm col-sm-12">
					  @include('errors._check')	
		</div>	
				{!!Form::open(['route'=>'recuperar-senha','id'=>"form-cadastro"])!!}

		<div class="col-sm-12 ">
			<div class="form-group">
				<label for="">E-mail</label>
				<input type="email" name="email" required="" class="form-control btn-flat" id="" value="{{@$user->email}}">
			</div>
		</div>
		<div class="col-sm-12 ">
			<button type="submit" class="btn btn-success btn-block btn-flat">RECUPERAR SENHA</button>
		</div>

		{!!Form::close()!!}
			
		</div>
		
		
</div>	
@endsection

@section('pos-script')

@endsection