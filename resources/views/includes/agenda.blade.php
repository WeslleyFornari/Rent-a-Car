
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
					<div id="calendario">
						
						<div id="calendar"></div>
					
					</div>
			