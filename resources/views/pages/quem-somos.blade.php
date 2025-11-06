@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
	<div class="row">
				<div class="col-sm-12 ">
					<h1>{{$conteudo[0]->titulo_conteudo}}</h1>
					{!!$conteudo[0]->texto!!}
				</div>
</div>
@endsection

@section('pos-script')

@endsection