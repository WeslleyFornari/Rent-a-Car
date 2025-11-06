@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
 <div class="row" >
				<div class="col-sm-9" id="evento">
					<h1>{!!$agenda->titulo_agenda!!}</h1>
					<div class="data">
						<div class="dia">{{strftime('%d', strtotime($agenda->data_inicio_agenda)) }}</div>
						<div class="mes">{{strftime('%B/%Y', strtotime($agenda->data_inicio_agenda)) }}</div>
					</div>
					

					<div class="content">
						{!!$agenda->texto_agenda!!}
					<div class="cidade-evento">
						<a role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$agenda->cidade_agenda}} - {{$agenda->estado_agenda}}
						</a> 
					</div>
					<div class="preco-evento">
						<i class="fa fa-money" aria-hidden="true"></i> 
						@if($agenda->valor_agenda != '0.00')
							R$ {{number_format($agenda->valor_agenda,2,".",",")}}
						@else
							Gratuito
						@endif
					</div>
					    <?php 
						$endereco = $agenda->endereco_agenda."+". $agenda->numero_agenda."+". $agenda->bairro_agenda."+". $agenda->cidade_agenda."+". $agenda->estado_agenda ."," .$agenda->cep_agenda;
						$endereco = str_replace(" ", "+",$endereco);
						?>
						<div class="">
					<div class="collapse p-left-0 m-top-lg col-xs-12" id="collapseExample">
					   <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="http://maps.google.nl/maps?q=<?=$endereco?>&hl=nl&ie=UTF8&t=v&hnear=<?=$endereco?>&z=13&amp;output=embed"></iframe>
					</div>
					</div>
					<hr><div class="sharethis-inline-share-buttons"></div>
					</div>
					

					
				</div>
				<div class="col-sm-3">
					@include('includes.noticias')
					@include('includes.agenda')
				</div>

			</div>
			



@endsection

@section('pos-script')
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=598f5d28d85a710012ca4dfe&product=inline-share-buttons"></script>
@include('includes.scripts.agenda')
@endsection