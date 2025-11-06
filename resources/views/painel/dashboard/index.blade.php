@extends('layouts.painel')
    @section('title')
        Home
    @stop

    @section('content')
    <div class="box box-default col-sm-12 m-top-md text-left">
        <div class="row p-all-0">
  			<div class="col-sm-7"><div id="chart" class="p-all-0"></div></div>
  			<div class="col-sm-5">
			  <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
			    <div class="row">
			       <div class="col-sm-12"><strong>Últimas Reservas</strong></div>
			    </div>
			  </div>
			  <div class="visible-xs m-top-lg clearfix"></div>
			  @foreach($reservas as $reserva)
		
			    <div class="row">
			      <div class="col-sm-8 col-xs-6">
			        <label for="" class="visible-xs">Cliente</label>
              
			        <a href="{{route('admin.reservas.show',['id'=>$reserva->id])}}" class="">{{$reserva->cliente->nome}}</a><Br>
              <label for="">#{{$reserva->id}}</label> | <strong>Grupo:</strong>  {{$reserva->grupo_veiculo->nome_grupo}}
             
			      </div>
            <div class="col-sm-4 col-xs-6">
              De: {{$reserva->data_inicio->format('d/m/Y')}} <Br>Até {{$reserva->data_termino->format('d/m/Y')}}
            </div>
			       </div>
			   <hr class="m-all-xs">


			     @endforeach
<div class="text-center">
 <a href="{{route('admin.reservas.lista')}}" class="btn btn-primary btn-xs">Ver Todas</a>
     
</div>
  			</div>
  		</div>
  		 <div class="row p-all-0">	
  			<div class="col-sm-6"><div id="grafico" style="width: 100%;height: 400px;"></div></div>
  			<div class="col-sm-6"><div id="grafico2" style="width: 100%;height: 400px;"></div></div>
        </div>
	</div>
@section('pos-script')
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
     	google.charts.load("current", {packages:['corechart']});
      	google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Meses", "Aluguéis", { role: "style" }],
        @foreach($ReservasMeses as $key => $mes)
          ["{{$key}}", {{$mes->count()}}, "#00a65a"],
          @endforeach 
        ]);

        var options = {
          title: "Aluguéis de carro por mês.",
        height: 400,
        legend: { position: "none" },
        };

          var dt = google.visualization.arrayToDataTable([
          ['Carros', 'Quantidade'],
          @foreach($ReservasVeiculos as $veiculo)
            ['{{$veiculo->nome}}',    {{$veiculo->total}} ],
          @endforeach
         
        ]);

        var op = {
          title: 'Carros mais alugados',
          height: 400,
           pieHole: 0.5,
          legend: {position: 'left'},

        };

      	var dt2 = google.visualization.arrayToDataTable([
 		  ['Grupos', 'Quantidade'],
       @foreach($ReservasGrupos as $grupo)
          ['Grupo {{$grupo->sigla_grupo}}',    {{$grupo->total}}],
           @endforeach
       
          ]);

        var op2 = {
          title: 'Grupos mais utilizados',
          pieHole: 0.5,
   		  height: 400
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
        chart.draw(data, options);

        var grafico = new google.visualization.PieChart(document.getElementById('grafico'));
        grafico.draw(dt, op);

       var grafico2 = new google.visualization.PieChart(document.getElementById('grafico2'));
        grafico2.draw(dt2, op2);
      }
    </script>
@stop
@endsection



    
