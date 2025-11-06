<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Painel Administrativo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('adminLTE/bootstrap/css/bootstrap.min.css')}}">
  
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css')}}">
  

  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/PaymentFont/css/paymentfont.min.css')}}">

  <style>
  	
  	body{
  		background-image: url('img/bg-login.jpg') !important;
  		background-size: cover  !important;
  		background-position: center  !important;
  	}
  	.overlayer{
  		position: fixed;
  		width: 100%;
  		height: 100%;
  		left: 0;
  		top: 0;
  		    background: rgba(3, 156, 3, 0.6);
  		    z-index: -1;

  	}

  	.login-box {
  
	    background: #fff;
	  	box-shadow: 0 0 10px   rgba(3, 156, 3, 0.6);;
	}
  </style>
</head>
<body class="hold-transition login-page">
	<div class="overlayer"></div>
@yield('content')


<!-- jQuery 2.2.3 -->
<script src="{{asset('adminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('adminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->

</body>
</html>
