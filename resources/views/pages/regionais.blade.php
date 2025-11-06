@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
	<div class="row">
				<div class="col-sm-12">
					<h1>{{$conteudo[0]->titulo_conteudo}}</h1>
					{!!$conteudo[0]->texto!!}
				</div>
			
			</div>
			<div class="row"></div>
			<div id="mapa-regionais" class="m-top-md">
      <div class="row">
        <div class="col-md-6">

          <div id="regions_div" style="width: 900px; height: 500px;">
          	 <i class="fa fa-cog fa-spin fa-3x fa-fw"></i> 
          </div>

        </div>
          <div class="col-md-6 feature">
            <h4 >Clique em um estado para visualizar os responsáveis regionais.</h3>
           
            <h4>Unidades em <span id="estado"></span>:<h4>
            <div id="dadosLojas" style="overflow-y: scroll; height:200px;"> 

            </div>
          </div>
      </div>
    </div>
			

		
@endsection

@section('pos-script')
<script type="text/javascript" src="../min/js/mapa/loader.js"></script>
    <script type="text/javascript" src="../min/js/mapa/jsapi.js"></script>
	<script>
		 google.charts.load('current', {'packages':['geochart']});
      google.charts.setOnLoadCallback(drawRegionsMap);


      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country'],
          ['Brazil'],
          ['Acre'],
          ['Alagoas'],
          ['Amapa'],
          ['Amazonas'],
          ['Bahia'],
          ['Ceará'],
          ['Distrito Federal'],
          ['Espírito Santo'],
          ['Goiás'],
          ['Maranhão'],
          ['Mato Grosso'],
          ['Mato Grosso do Sul'],
          ['Minas Gerais'],
          ['Pará'],
          ['Paraíba'],
          ['Paraná'],
          ['Pernambuco'],
          ['Piauí'],
          ['Rio de Janeiro'],
          ['Rio Grande do Norte'],
          ['Rio Grande do Sul'],
          ['Rondônia'],
          ['Roraima'],
          ['Santa Catarina'],
          ['São Paulo'],
          ['Sergipe'],
          ['Tocantins']
        ]);

        var options = {
           region: 'BR',
           resolution: 'provinces',
           datalessRegionColor: 'white',
           defaultColor: '#F1F2F3',

           enableRegionInteractivity: true
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        dicEstados = {
          '1' : 'Acre',
          '2' : 'Alagoas',
          '3' : 'Amapa',
          '4' : 'Amazonas',
          '5' : 'Bahia',
          '6' : 'Ceará',
          '7' : 'Distrito Federal',
          '8' : 'Espírito Santo',
          '9' : 'Goiás',
          '10' : 'Maranhão',
          '11' : 'Mato Grosso',
          '12' : 'Mato Grosso do Sul',
          '13' : 'Minas Gerais',
          '14' : 'Pará',
          '15' : 'Paraíba',
          '16' : 'Paraná',
          '17' : 'Pernambuco',
          '18' : 'Piauí',
          '19' : 'Rio de Janeiro',
          '20' : 'Rio Grande do Norte',
          '21' : 'Rio Grande do Sul',
          '22' : 'Rondônia',
          '23' : 'Roraima',
          '24' : 'Santa Catarina',
          '25' : 'São Paulo',
          '26' : 'Sergipe',
          '27' : 'Tocantins'
        }

        /*unidades = {
          'Acre': 
          {
            '0' : 
            {
              'Name' : 'Nome Responsável 1',
              'Fone' : '(00) 9 9999-9999',
              'Endereco' : 'Rua teste, 00 - Centro'
            }
          },
          'Maranhao':
           {
            '0' : 
            {
              'Name' : 'Nome Responsável 2',
              'Fone' : '(00) 9 9999-9999',
              'Endereco' : 'Rua teste, 00 - Centro'
            }
          },
          'Sao Paulo':
           {
            '0' : 
            {
              'Name' : 'Nome Responsável 3',
              'Fone' : '(00) 9 9999-9999',
              'Endereco' : 'Rua teste, 00 - Centro'
            }
          },
          'Bahia':
           {
            '0' : 
            {
              'Name' : 'Nome Responsável 4',
              'Fone' : '(00) 9 9999-9999',
              'Endereco' : 'Rua teste, 00 - Centro'
            }
          }
        }*/
        unidades = {!!$regionais!!}
        function myClickHandler(){
          var selection = chart.getSelection();
          var message = '';
          for (var i = 0; i < selection.length; i++) {
              var item = selection[i];
              if (item.row != null && item.column != null) {
                  message += '{' + item.row + ',column:' + item.column + '}';
              } else if (item.row != null) {
                  message += '' + item.row + '';
              } else if (item.column != null) {
                  message += '{column:' + item.column + '}';
              }
          }
          if (message == '') {
              message = 'nothing';
          }
            document.getElementById("dadosLojas").innerHTML = '';
            for(var i = 0; i < 2 ; i ++){ //Para fins de demonstracao, so existem duas lojas em cada unidade
              document.getElementById("estado").innerHTML = dicEstados[message];
              document.getElementById("dadosLojas").innerHTML += 
              '<br><strong>Unidade:</strong> ' + 
              unidades[dicEstados[message]][i]['Name'] + 
              '<br><strong>Fone:</strong> ' + 
              unidades[dicEstados[message]][i]['Fone'] + 
              '<br><strong>Endereco:</strong> ' 
              + unidades[dicEstados[message]][i]['Endereco'] + '<br>';
            }
          }

          google.visualization.events.addListener(chart, 'select', myClickHandler);

          chart.draw(data, options);
      }
	</script>
@endsection