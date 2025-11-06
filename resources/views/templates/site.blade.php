<!DOCTYPE html>
<html>
<head>

		<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105707678-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-105707678-1');
</script>
<link rel="apple-touch-icon" sizes="57x57" href="{{asset('/min/img/fiveicon')}}/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="{{asset('/min/img/fiveicon')}}/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('/min/img/fiveicon')}}/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('/min/img/fiveicon')}}/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('/min/img/fiveicon')}}/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('/min/img/fiveicon')}}/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="{{asset('/min/img/fiveicon')}}/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('/min/img/fiveicon')}}/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('/min/img/fiveicon')}}/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="{{asset('/min/img/fiveicon')}}/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('/min/img/fiveicon')}}/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="{{asset('/min/img/fiveicon')}}/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('/min/img/fiveicon')}}/favicon-16x16.png">
<link rel="manifest" href="{{asset('/min/img/fiveicon')}}/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{asset('/min/img/fiveicon')}}/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>A Biblica - Associação Brasileira de Pesquisa Bíblica</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="{{asset('/min/css/styles.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('pre-assets')
<link rel="stylesheet" href="{{asset('AdminLTE/assets/froala_editor/css/froala_style.min.css')}}">


</head>
<body>
	<div id="tudo">
	<header>
			<div class="container-fluid">
				<div class="col-sm-6 logo col-xs-5" >
					<a href="{{route('home')}}">
						<div class="col-sm-6 p-all-0">
							<img src="../../min/img/logo.png" class="img-responsive" alt="A Biblica - Associação Brasileira de Pesquisa Bíblica">
						</div>
						<div class="desc col-sm-6 hidden-xs">
							Associação<br> Brasileira de<br> Pesquisa Bíblica
						</div>
					</a>
				</div>
				<div class="col-xs-6 pull-right visible-xs">
							<a href="#" class="menu-bars abrir" data-alvo=".menu">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</a>
						</div>
				<div class="col-sm-6 hidden-xs">
					<div class="row">
						<div class="login_user">
							@if (Auth::check())
						<a href="{{route('minha-conta.index')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
 Minha Conta</a> | 
						<a href="{{route('auth.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>
 Sair</a>
						@else
						 <a href="{{route('cadastro.index')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> LOGIN</a>
						@endif
							
						</div>
					</div>
					<div class="row">
						
							{!! Form::model(null,['route'=>['pesquisa'],'class'=>'form-search-top']) !!}
							<input type="text" name="p" placeholder="Pesquisar..." id="" class="input ">
							<button type="submit"><i class="fa fa-search" aria-hidden="true"></i>
							</button>
						 {!! Form::close() !!}
					</div>
				</div>
				<div class="clearfix"></div>
				<nav class="menu">
					<a href="" class="fechar" data-alvo=".menu">
						<i class="fa fa-times" aria-hidden="true"></i> 
					</a>
					
					 {!!$menu!!}
				</nav>
			</div>
			
		</header>
		
		<div id="conteudo" class="container-fluid">
		<div class="fr-view">
			@yield('content')
		</div>
			<div class="clearfix"></div>
		</div><!-- final conteudo -->
		@include('includes.footer')
		
	</div><!-- final tudo -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="{{asset('/min/js/abiblica.js')}}"></script>

     <script>
 	
</script>
	@yield('pos-script')


</body>
</html>