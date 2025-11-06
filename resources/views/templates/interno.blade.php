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

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>A Biblica - Associação Brasileira de Pesquisa Bíblica</title>
	<link rel="stylesheet" href="{{asset('/min/css/styles.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	@yield('pre-assets')

</head>
<body>
	<div id="tudo">
		<header>
			<div class="container-fluid">
				<div class="col-sm-6 logo" >
					<a href="{{route('home')}}">
						<div class="col-sm-6 p-all-0">
							<img src="../../min/img/logo.png" class="img-responsive" alt="A Biblica - Associação Brasileira de Pesquisa Bíblica">
						</div>
						<div class="desc col-sm-6">
							Associação<br> Brasileira de<br> Pesquisa Bíblica
						</div>
					</a>
				</div>
				<div class="col-sm-6">
					<div class="row">
						<div class="login_user">
							<a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> LOGIN</a>
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
					<ul>
					 {!!$menu!!}
						
					</ul>
				</nav>
			</div>
			
		</header>
		<div id="conteudo" class="container-fluid">
			@yield('content')
			<div class="clearfix"></div>
		</div><!-- final conteudo -->

		@include('includes.footer')
	</div><!-- final tudo -->
	<script src="{{asset('/min/js/jquery.min.js')}}"></script>
	<script src="{{asset('/min/js/abiblica.js')}}"></script>

	@yield('pos-script')
</body>
</html>