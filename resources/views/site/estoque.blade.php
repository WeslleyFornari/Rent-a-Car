@extends('templates.site')

@section('pre-assets')

@endsection

@section('content')
		
		

			<div id="estoque">
				<h2>NOSSOS <span class="text-amarelo">VEÍCULOS</span></h2>
				<div id="filtro-avancado">
					<div class="col-sm-12">
					<h3>Encontre seu Veículo</h3>
					</div>
					 {!! Form::open(['route'=>'veiculos.busca', 'id'=>'formBuscar','method'=>'GET']) !!}
						
							<div class="form-group col-md-12 col-sm-6">
							    <label for="">Marca</label>
							   
							    <select name="marca" id="marca" class="form-control">
			                        <option value="">SELECIONE...</option>
			                          @foreach($marcas as $marca)
			                          
			                             <option value="{{$marca->marca}}" @if(request()->input('marca') == $marca->marca) selected @endif>{{$marca->marca}}</option>
			                          @endforeach
			                      </select>
							</div>
							<div class="form-group col-md-12 col-sm-6">
							    <label for="">Modelo</label>
							   
							   <select name="modelo" id="modelo" class="form-control">
		                        <option value="">AGUARDANDO MARCA</option>
		                      </select>
							</div>
							<div class="col-md-12 col-sm-6 p-all-0">
							<div class="form-group col-sm-5 col-xs-5 p-right-0">
								<label for="">Ano</label>
								<input type="number" name="ano_min" class="form-control text-center" placeholder="MIN"  value="{{request()->input('ano_min')}}">
							</div>
							<div class="form-group col-sm-2 col-xs-2 p-top-lg p-left-0 p-right-0 text-center">
								<label for="">ATÉ</label>								
							</div>
							<div class="form-group col-sm-5 col-xs-5 p-top-md m-top-xs p-left-0">
								<input type="number" name="ano_max" class="form-control text-center" placeholder="MAX" value="{{request()->input('ano_max')}}">
							</div>
							</div>
							<div class="col-md-12 col-sm-6 p-all-0">
								<div class="form-group col-sm-5 col-xs-5 p-right-0">
									<label for="">Valor</label>
									<input type="text" name="valor_min" id="valor_min" class="form-control text-center moneyMask" placeholder="MIN" value="{{request()->input('valor_min')}}">
								</div>
								<div class="form-group col-sm-2 col-xs-2 p-top-lg p-left-0 p-right-0 text-center">
									<label for="">ATÉ</label>								
								</div>
								<div class="form-group col-sm-5 col-xs-5 p-top-md m-top-xs p-left-0">
									<input type="text" name="valor_max" id="valor_max" class="form-control text-center moneyMask" value="{{request()->input('valor_max')}}" placeholder="MAX">
								</div>
							</div>
							
							<div class="col-md-12 col-sm-12 text-center">
								<button class="btn bg-amarelo btn-block btn-lg m-top-sm">
									<i class="fa fa-search"></i> BUSCAR
								</button>
								
							</div>
							<div class="col-sm-12 text-center"><a href="{{route('veiculos')}}">Limpar busca</a></div>
						 {!! Form::close() !!}
				</div>
				<div id="ofertas" class="resultado">
					@if(count($veiculos) == 0)
					<h2>Nenhum veículo encontrado</h2>
					@endif
					<ul class="">
						 @foreach($veiculos as $veiculo)

			                  <li style="background-image: url('{{$veiculo->fotos[0]->arquivo}}')">
			                    <div class="degrade"></div>
			                    <a href="{{route('veiculos.detalhes',['slug'=>$veiculo->slug])}}">

			                      <div class="title">{{$veiculo->titulo}} <br>{{$veiculo->modelo_versao}}</div>
			                      <div class="btn-oferta"><i class="fa fa-plus"></i> DETALHES</div>
			                    </a>
			                  </li>
			                  @endforeach
						

					</ul>
			
				</div>
						<div class="col-sm-12 text-center m-top-lg">
					  {!! $veiculos->appends(request()->query())->render()!!}
					</div>
			</div>
			
			
		
@endsection







@section('pos-script')
@if(request()->input('marca') != "")
<script>
	var marca = "{{request()->input('marca')}}";
	var modelo = "{{request()->input('modelo')}}";
	 $.post('{{route("veiculos.marcas")}}',{marca:marca},function(data){
                    var html = '<option value="">Selecione...</option>';;
                    $.each(data, function(i, item) {
                    	if(modelo ==item.titulo ){
 							html +='<option value="'+item.titulo+'" selected>' +item.titulo+'</option>';
                    	}else{
                     	 html +='<option value="'+item.titulo+'">' +item.titulo+'</option>';
                      }
                    });
                    $("#modelo").html(html)
                  })
</script>

@endif
<script>
	/*$(document).ready(function(){
		$("#formBuscar").submit(function(e) {
			  		e.preventDefault();

			  		var valor_min = $("#valor_min").val()
			  		var valor_max = $("#valor_max").val()
			  		valor_min = valor_min.replace(".",'');

			  		valor_min = valor_min.replace(",",'.');

			  		valor_max = valor_max.replace(".",'');
			  		valor_max = valor_max.replace(",",'.');
			  		$("#valor_min").val(valor_min);
			  		$("#valor_max").val(valor_max);
			  		$("#formBuscar")[0].submit();

		})
	})*/
</script>



@endsection