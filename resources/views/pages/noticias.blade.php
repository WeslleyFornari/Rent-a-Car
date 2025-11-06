@extends('templates.site')
@section('pre-assets')
<style>
	.titulo-noticia h4{
		margin: 0;
		font-size: 15px;
		line-height: 20px;
	}
</style>
@endsection
@section('content')
<div class="row">
	<div class="col-sm-9 col-xs-12">
		<h1>Notícias</h1>
		<div class="lista-noticias bricklayer">

			@foreach($paginatedSearchResults as $noticia)

			<div class="noticia col-sm-4 col-xs-12">
				<a href="{{route('noticia.detalhes',['slug'=>$noticia->slug_conteudo])}}">
			
				
					<div class="img-noticia" style="background: url('img_noticias/<?php echo $noticia->imgDestaque;?>');">

					</div>
					<div class="titulo-noticia">
						<h4>{{$noticia->titulo_conteudo}}</h4>
					</div>
					<div class="data-noticia">
						<i class="fa fa-calendar" aria-hidden="true"></i>
					
						{{strftime('%d de %B de %Y', strtotime($noticia->created_at)) }}
					</div>
					<div class="intro-noticia">
						{!!strip_tags(substr($noticia->texto,0,150),'<p>')!!}
					</div>
				</a>	
			</div>
			@endforeach




<div class="celarfix"></div>
		</div>
<div class="row">
		<div class="col-sm-4  col-xs-12 col-sm-offset-4 text-center">
			{!!$paginatedSearchResults->render() !!}
		</div>
		</div>
	</div>
	<div class="col-sm-3 col-xs-12 p-top-lg">
		<div class="clear m-top-lg"></div>
					@include('includes.noticias')
				</div>

</div>








@endsection

@section('pos-script')
<script src="//cdnjs.cloudflare.com/ajax/libs/bricklayer/0.4.2/bricklayer.min.js"></script>
@include('includes.scripts.agenda')
@endsection