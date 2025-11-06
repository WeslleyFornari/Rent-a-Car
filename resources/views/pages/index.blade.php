@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
<div class="col-sm-12 chamada-socio">
				<div class="col-sm-3"><h3 class="m-top-xs">SÓCIO FIQUE EM DIA</h3></div>
				<div class="col-sm-6 text-center">"Sócio, para que esta associação se mantenha, sua participação é muito necessária,atualize seu cadastro e regularize sua anuidade."</div>
				<div class="col-sm-3"><a href="{{route('cadastro.index')}}" class="btn btn-success btn-block btn-flat ">CLIQUE AQUI E ACESSE SUA CONTA</a></div>
</div>
<div class="row">
<div class="col-sm-9 p-all-0">
	<div  class="col-sm-8 col-xs-12 p-right-0 box-ultima-noticia">
		<div id="ultima-noticia">
			<div class="img-noticia col-xs-12 col-sm-6 p-all-0">
				
				
				
				<img src="<?php echo $urlDestaque;?>" alt="" style="height: 254px;">
			</div>
			<div class="col-sm-6 col-xs-12  p-all-0">
				<div class="content" style="text-overflow: ellipsis;overflow: hidden;max-height: 215px;
margin-bottom: 40px;">
					<h2>{{@$ultimaNoticia->titulo_conteudo}}</h2>
					<!--<div class="data">{{strftime('%d de %B de %Y', strtotime(@$ultimaNoticia->created_at)) }}</div>-->
					<div class="text">
						{!!strip_tags(substr(@$ultimaNoticia->texto,0,300),'<p>')!!}
					</div>
					<a href="{{route('noticia.detalhes',['slug'=>$ultimaNoticia->slug_conteudo])}}" class="leia-mais">Continuar lendo...</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div id="ultimas-noticias" class="col-sm-4 col-xs-12">
		<h3>ÚLTIMAS NOTÍCIAS</h3>
		<ul>
			@foreach($ultimasNoticia as $ultimas)
			<li>
				<div class="data">{{strftime('%d de %B de %Y', strtotime($ultimas->created_at)) }}</div>
				<a href="{{route('noticia.detalhes',['slug'=>$ultimas->slug_conteudo])}}" class="titulo">{{$ultimas->titulo_conteudo}}</a>
			</li>
			@endforeach

		</ul>
		<a href="{{route('noticias')}}" class="leia-mais">Ver todas</a>
	</div>

	<div class="col-sm-12 col-xs-12 p-right-0 box-material-download">
		<div class="col-sm-4 col-xs-12 p-all-0">
			<div id="material-download" style="height: 239px">
				<h3>MATERIAIS PARA DOWNLOAD</h3>
				<ul class="lista-download" style="overflow-y: auto;height: 155px;overflow-x: hidden;">
					@foreach($materiais as $material)

					<li class="row">
						<a href="{{route('material',['folder'=>$material->tipo,'file'=>trim($material->arquivo)])}}" target="_blank">
							<div class="col-sm-2 col-sm-2 col-xs-2"><i class="fa fa-file-pdf-o"></i></div>
							<div class="col-sm-8 col-xs-8 p-all-0">{{$material->titulo}}	</div>
							@if($material->somente_assinante == 'sim')
							<div class="col-sm-2 col-xs-2"><i class="fa fa-lock nivel-seguranca"></i></div>
							@else
							<div class="col-sm-2 col-xs-2"><i class="fa fa-unlock "></i></div>
							@endif
						</a>
					</li>
					@endforeach



				</ul>
				<!--<a href="#" class="leia-mais">Ver todas</a>-->
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12 box-livros">
				<div id="livros">
					<div class="col-sm-6 p-left-0"><h3>LIVROS</h3></div>
					<div class="col-sm-6">
						
					</div>
					<div class="clearfix"></div>

					<div class="livros-carousel"  data-slick='{"slidesToShow": 1, "slidesToScroll": 1}'>
						@foreach($livrosDestaque as $livro)
					<div>
						<div class="capa-livro">
							<img src="img_livros/{{$livro->foto_capa}}" height="170" width="auto" alt="">
						</div>
						<div class="descricao-livro">

							<div class="titulo">
								<a href="{{route('livro.detalhes',['slug'=>$livro->slug_livro])}}" >{{$livro->titulo_livro}} </a>
							</div>
							<div class="autor">
								@if($livro->autor != '')
								Autor: {{$livro->autor}}
								@endif
							</div>
							<a href="{{route('livro.detalhes',['slug'=>$livro->slug_livro])}}" class="btn btn-success btn-block btn-flat">Saiba Mais</a>
						</div>
					</div>
					@endforeach
					
					</div>
				</div>
			</div>
		<div class="col-sm-4 col-xs-12 p-all-0">
				<div id="proximo-evento" class="">
						<h3>PRÓXIMO EVENTO</h3>
						<div class="col-sm-5  p-all-0"><div class="dia">
							{{strftime('%d', strtotime($proximoEvento->data_inicio_agenda)) }}
						</div></div>
						<div class="col-sm-7 p-all-0">
							<div class="mes">{{strftime('%B/%Y', strtotime($proximoEvento->data_inicio_agenda)) }}</div>
							<div class="detalhes">
								{!!$proximoEvento->texto_agenda!!}
							</div>
							<a href="{{route('agenda.detalhes',['slug'=>$proximoEvento->slug_agenda])}}" class="btn btn-success btn-block btn-flat">VER INFORMAÇÕES</a>

						</div>
						<div class="clearfix"></div>
					</div>
		</div>

	</div>
</div>
<div  class="col-sm-3 col-xs-12 p-left-0 ">
			<a href="https://www.paulinas.org.br/loja/paulo-contextos-e-leituras" target="_blank"><img src="{{asset('min/img/ImgDestaqueBanner.png')}}" alt=""></a>
</div>
	
	
</div>
@endsection

@section('pos-script')
@include('includes.scripts.agenda')
<script>
	@if(Input::get('aviso') )
		sweetAlert("Lamento...", "Arquivo não encontrato", "error");
	@endif

</script>
@endsection