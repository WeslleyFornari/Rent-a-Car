
					<div id="ultimas-noticias" style="height: auto !important">
						<h3>ÚLTIMAS NOTÍCIAS</h3>
						<ul>
						@foreach ($ultimasNoticias as $ultima)
							<li>
								<div class="data">{{strftime('%d de %B,%Y', strtotime($ultima->created_at)) }}</div>
								<a href="{{route('noticia.detalhes',['slug'=>$ultima->slug_conteudo])}}" class="titulo">{{$ultima->titulo_conteudo}}</a>
							</li>
						@endforeach
							
						</ul>
						<a href="http://abiblica.org.br/noticias" class="leia-mais">Ver todas</a>
					</div>
					