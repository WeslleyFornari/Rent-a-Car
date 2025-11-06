@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
	<div class="row">
				<div class="col-sm-12 ">
					<h1>Pesquisa</h1>
				@if(count($resConsulta) == 0 )
					<h3>Nenhum resultado encontrado.</h3>
				@endif
				@foreach($resConsulta as $res)

				
					<h2>{{$res['titulo']}}<br> <small style="font-size: 0.5em">Categoria: {{$res['categoria']}}</small></h2>

						@if(isset($res['img']))
						<div class="col-sm-2">
							<img src="{{$res['img']}}" alt="">
						</div>
						<div class="col-sm-9">
							{!!$res['texto']!!}
						<a href="{{$res['slug']}}" class="btn btn-xs btn-success">SAIBA MAIS</a>
						</div>
						@else
						{!!$res['texto']!!}
						<a href="{{$res['slug']}}" class="btn btn-xs btn-success">SAIBA MAIS</a>
						@endif
				<div class="clearfix m-top-md"></div>		 
				
				<hr >
				@endforeach
				
				{!!$paginatedSearchResults->render()!!}
				</div>
</div>
@endsection

@section('pos-script')

@endsection