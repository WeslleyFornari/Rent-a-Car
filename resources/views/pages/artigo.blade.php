@extends('templates.site')
@section('pre-assets')
<link href='{{asset("min/simplelightbox-master")}}/dist/simplelightbox.css' rel='stylesheet' type='text/css'>
@endsection
@section('content')
<div class="row">
				<div class="col-sm-9" id="artigo">
					<h1>{{$artigo->titulo_conteudo}}</h1>
					<div class="data-artigo"><i class="fa fa-calendar" aria-hidden="true"></i> {{strftime('%d de %B de %Y', strtotime($artigo->created_at)) }}</div>
					<div class="clearfix m-top-sm m-bottom-sm"></div>
					<div class="content-artigo">
						@if(@$artigo->img_destaque->mostrar_artigo == '1')
							@if(isset($artigo->img_destaque->arquivo))
							<img src="{{asset('img_noticias').'/'.@$artigo->img_destaque->arquivo}}" alt="" class="img-responsive" style="max-width: 50%;{{@$artigo->img_destaque->style}}">
							@endif
						@endif
						
						
						{!!@$artigo->texto!!}
					</div>
					@if(@$galeria)
					 <div class="gallery m-top-lg">
					 	<?php $count=1; ?>
					@foreach($galeria as  $foto)
					 	
						<a href="{{asset('galeria').'/'.$foto->foto}}" class="col-sm-2 p-all-0"><img src="{{asset('galeria').'/'.$foto->foto}}" alt="{{$artigo->titulo}}" title="{{$artigo->titulo}}" /></a>

						<?php $count++ ?>
					  	@endforeach
					</div>
					@endif
					<hr><div class="sharethis-inline-share-buttons"></div>

				</div>
				<div class="col-sm-3">
						@include('includes.noticias')
				</div>

			</div>
			







@endsection

@section('pos-script')
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=598f5d28d85a710012ca4dfe&product=inline-share-buttons"></script>

<script type="text/javascript" src="{{asset('min/simplelightbox-master')}}/dist/simple-lightbox.js"></script>

<script>
	$('.gallery a').simpleLightbox()
</script>
@endsection