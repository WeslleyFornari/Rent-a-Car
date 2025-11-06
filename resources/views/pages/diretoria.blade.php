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
<div class="row m-top-lg">

<div class="col-sm-10 col-xs-12">
@foreach($diretoria as $diretor)
			<div class="col-xs-12 col-sm-6 m-bottom-md" >
				<div class="col-xs-12 col-sm-5">
					<img src="img_perfil/{{@$diretor->dados->foto_perfil}}" alt="" class="img-responsive">
				</div>
				<div class="col-xs-12 col-sm-7">
					<h3>{{$diretor->name}}<br><small>{{$diretor->dados->cargo}}</small></h3>
					<p>E-mail: <a href="mailto:{{$diretor->email}}">{{$diretor->email}}</a> </p>
				</div>
		</div>
	@endforeach
</div>
</div>
@endsection

@section('pos-script')

@endsection