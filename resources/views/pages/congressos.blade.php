@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
	<div class="row">
		@foreach($congressos as $congresso)
		<div class="col-sm-12">
						
						
							<h2>{{$congresso->titulo}}</h2>
							{!!$congresso->texto!!}
				
				<a href="{{route('congresso.detalhes',['id'=>$congresso->slug_titulo])}}" class="btn btn-success btn-xs btn-flat">Continuar lendo</a>

				<hr class="clearfix">
		</div>
		
		@endforeach
</div>	
@endsection

@section('pos-script')

@endsection