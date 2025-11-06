@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
 <div class="row">
				<div class="col-sm-9">
					<h1>Agenda</h1>
					<div class="lista-agenda">
						@foreach($paginatedSearchResults as $agenda)
						<!-- Item -->
						<div class="agenda">
							<div class="data">
								<div class="dia">{{strftime('%d', strtotime($agenda->data_inicio_agenda)) }}</div>
								<div class="mes">{{strftime('%B/%Y', strtotime($agenda->data_inicio_agenda)) }}</div>
							</div>

							<div class="descricao">
								<div class="titulo-evento">{{$agenda->titulo_agenda}}
								</div>
								<div class="content">
									{!! $agenda->texto_agenda!!}
									
								</div>
								<div class="cidade-evento">
									<i class="fa fa-map-marker" aria-hidden="true"></i> {{$agenda->cidade_agenda}} - {{$agenda->estado_agenda}}
									 
								</div>
								<div class="preco-evento">
									<i class="fa fa-money" aria-hidden="true"></i> 
									@if($agenda->valor_agenda != '0.00')
									R$ {{number_format($agenda->valor_agenda,2,".",",")}}

									@elseif($agenda->valor_agenda == '')
										Indefinido
									@else
										Gratuito
									@endif
								</div>
									
							</div>
							<div class="mais-informacoes">
								<a href="{{route('agenda.detalhes',['slug'=>$agenda->slug_agenda])}}" class="btn btn-success btn-flat">
									+ informações
								</a>
							</div>
						</div>
						<!-- Final Item -->
						@endforeach
						<div class="clearfix"></div>
					</div>

					<div class="col-sm-4 col-sm-offset-4 text-center">
						{!!$paginatedSearchResults->render()!!}
					</div>
				</div>
				<div class="col-sm-3">
					@include('includes.noticias')
					@include('includes.agenda')
				</div>
			</div>
			
			




			
		


      

    
@endsection

@section('pos-script')
@include('includes.scripts.agenda')
@endsection