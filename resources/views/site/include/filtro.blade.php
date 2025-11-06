<div class="filtro">
	<div class="container">
		<h4 class="text-center" style="color: #fff;">SIMULE AQUI !!! <br> <span class="diarias">Diárias até 20% Off</span></h4>
		{!! Form::model(null,['route'=>['site.search'],'id'=>'form']) !!}
		<input type="hidden" name="grupo_id" value="{{@$data['grupo_id']}}">

		<div class="select-container">

			<div class="item-form">
				<label style="color: red !important; font-size: 20px ;">Retirada</label>
				<div class="input-list">
					<input type="text" class="calendar" autocomplete="off" readonly="readonly" value="{{@$data['data_inicio']}}"
						id="data_inicio" name="data_inicio" placeholder="Quando ?" style="font-size:17px; padding-left:10px;">
				</div>
			</div>

			<div class="item-form">
				<div class="select-list timeSelect">
					<input type="text" placeholder="Horário" autocomplete="off" readonly="readonly" name="hora_inicio" value="{{@$data['hora_inicio']}}@if(is_null(@$data['hora_inicio'])) {{date('H:00', strtotime('1 hour'))}} @endif" style="font-size:15px;padding-left:5px;">
					<ul>
						@for($i = 8; $i<= 17; $i++)
							<li>{{$i}}:00</li>
							<li>{{$i}}:30</li>
							@endfor
					</ul>
				</div>
			</div>

			<div class="item-form">
				<label style="color: red !important; font-size: 20px ;">Devolução</label>
				<div class="input-list">
					<input type="text" class="calendar" autocomplete="off" readonly="readonly" name="data_termino" value="{{@$data['data_termino']}}"
						id="data_termino" placeholder="Até quando ?" style="font-size:17px; padding-left:10px;">
				</div>
			</div>
			<div class="item-form">
				<div class="select-list timeSelect"> <input type="text" autocomplete="off" readonly="readonly" name="hora_termino" value="{{@$data['hora_termino']}}@if(is_null(@$data['hora_termino'])) 9:00 @endif" placeholder="Horário" style="font-size:15px; padding-left:5px;">
					<ul>
						@for($i = 8; $i<= 17; $i++)
							<li>{{$i}}:00</li>
							<li>{{$i}}:30</li>
							@endfor
					</ul>
				</div>
			</div>
			<button class="item-btn"> Buscar <i class="fas fa-search"></i></button>

		</div>
		{!! Form::close() !!}
	</div>
</div>