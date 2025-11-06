@extends('layouts.painel')
@section('title')
Home | Editar Usuário
@stop

@section('content')

<section class="content-header">
  <h1>Usuário<small></small></h1>
  <hr>
  <div class="row">
    <div class="col-md-10">
      <div class="box box-primary">
        <!-- /.box-header -->
        <!-- form start -->
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
 {!! Form::model($usuario,['route'=>['admin.users.update',$usuario->id], 'class'=>'form']) !!}
        @include('painel.users._form')

         {!! Form::close() !!}


      </div>
    </div>

  </div>
</section>
@endsection
@section('pos-script')

  <script type="text/javascript">
   
   
  </script>
@endsection