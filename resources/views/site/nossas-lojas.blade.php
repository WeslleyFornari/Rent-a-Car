@extends('templates.site')
@section('title', 'Home')
@section('pre-assets')
<style>

</style>
@endsection
@section('content')
		
			<div class="content nossas-lojas">
				<h2>{{$conteudo->titulo_conteudo}}</h2>
				{!!$conteudo->texto!!}

				@foreach($unidades as $unidade)
				         
				          <div class="panel p-all-md">
				          	@if($unidade->arquivo != "")
					          <div class="col-sm-5">
					          	<img src="{{asset('img/unidades/'.$unidade->arquivo)}}" alt="">
					          </div>
					          @endif
				          <div class="col-sm-7">
				          	
				         
				            <h3 class="m-top-0">{{$unidade->titulo}}</h3>
				            <a href="http://maps.google.com/maps?q={{htmlentities(urlencode($unidade->endereco . ','.$unidade->numero. '-'.$unidade->bairro .'-'.$unidade->cidade.'-'.$unidade->cidade))}}" target='_blank'  class="address">
				              {{$unidade->endereco}}, {{$unidade->numero}} <br>{{$unidade->bairro}} <br>{{$unidade->cidade}} - {{$unidade->estado}}  
				            </a>
				           
				            @if($unidade->telefone_1 != "")
					            <hr>
					            <a href="tel.:+55{{ preg_replace('([^0-9])','',$unidade->telefone_1)}}" class="tel">{{$unidade->telefone_1}} </a>
				            @endif
				            @if($unidade->telefone_2 != "")
					            
					            <a href="tel.:+55{{ preg_replace('([^0-9])','',$unidade->telefone_2)}}" class="tel">{{$unidade->telefone_2}} </a>
				            @endif
				            @if($unidade->telefone_3 != "")
					            
					            <a href="tel.:+55{{ preg_replace('([^0-9])','',$unidade->telefone_3)}}" class="tel">{{$unidade->telefone_3}} </a>
				            @endif
				          </div>
				          <div class="clearfix"></div>
				          </div>
				        
				@endforeach
			
			</div>

			
			
			
		
@endsection
@section('filtro')

@include('includes.filtro-basico')



@endsection
@section('pos-script')





@endsection