@extends('layouts.login')

@section('content')
<div class="login-box">
  <div class="login-logo p-all-lg m-all-0" >
    <img src="{{asset('img/logo-g.png')}}"  style="max-height: 70px;">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body p-top-0">
     @if($errors->any())

      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        <ul>
         @foreach($errors->all() as $error)
         <li>{{$error}}</li>   
         @endforeach
       </ul>
     </div>
     @endif

    <form action="{{ url('login') }}" method="post">
    {{ csrf_field() }}
      <div class="form-group has-feedback">
        <label for="">E-mail</label>
        <input type="email" class="form-control"  name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label for="">Senha</label>
        <input type="password" class="form-control" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-success btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@stop