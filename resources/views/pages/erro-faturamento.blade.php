@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
	<div class="row">
		
		<div class="col-sm-6 col-xs-12 col-sm-offset-3 text-center">
						
						
							<div style="font-size: 2em;font-weight: bold;margin-top: 40px;">ERROS NO SEU CADASTRO</div>
							<p>Corriga os erros antes de efeturar o pagamento</p>
							<br><br>
				@foreach($xmlLoad->error as $value)
					<p class="text-danger">{{$erroPagseguro['erro_'.$value->code]}}</p>
					<hr class="clearfix">
					
				@endforeach
				
				<a href="{{route('cadastro.index')}}" class="btn btn-success btn-block btn-lg">ACESSAR CONTA</a>
				
		</div>
		
		
</div>	
@endsection

@section('pos-script')

@endsection