@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')


<section class="content-header">
  <h1> <i class="fa fa-life-ring" aria-hidden="true"></i> Suporte</h1>
</section>

   
<section class="box box-default col-xs-12 m-top-md">
   <div class="box-header with-border">

    <h3 class="box-title">Olá Tudo bom?</h3>
   </div>

<div class="box-body">
  <div class="col-sm-6">
    <p> Estou aqui para o que precisar, caso tenha alguma dificuldade técnica, duvida na utilização, sugestão de melhoria ou só queira nos dar um feedback estamos a disposição.</p>
    <br>
    <br>
    <br>
    <p>Meus Contatos são:</p>
    <h4>Tel.: (12) 9 9139-5346</h4>
    <h4>E-mail.: rafaw940@yahoo.com.br</h4>
    <h4>Skype.: rafaw940</h4>
    <h3>Rafael William <small>Desenvolvedor</small></h3>
    <img src="{{asset('min/img/rw940.png')}}" class="col-sm-4 p-all-0">
  </div>
  <div class="col-sm-6">
    

{!! Form::model(null,['route'=>['admin.suporte.enviar'],'id'=>'formSuporte']) !!}

  
   <div class="form-group col-sm-12">
    <p>Se preferir....</p>
      {!! Form::label('Nome','Nome:') !!}
      {!! Form::text('nome',Auth::user()->name,['class'=>'form-control']) !!}
    </div>
     <div class="form-group col-sm-6">
      {!! Form::label('email','E-mail:') !!}
      {!! Form::email('email',Auth::user()->email,['class'=>'form-control']) !!}
    </div>
     <div class="form-group col-sm-6">
      {!! Form::label('telefone','Telefone:') !!}
      {!! Form::text('telefone',null,['class'=>'form-control']) !!}
    </div>
     <div class="form-group col-sm-12">
      {!! Form::label('assunto','Assunto:') !!}
      {!! Form::text('assunto',null,['class'=>'form-control']) !!}
    </div>
     <div class="form-group col-sm-12">
      {!! Form::label('mensagem','Assunto:') !!}
      {!! Form::textarea('mensagem',null,['class'=>'form-control','id'=>'descricao','style'=>'height:100px']) !!}
    </div>
    <div class="form-group col-sm-12">
    <button type="submit" id="btEnviar" class="btn btn-success btn-lg btn-block pull-right btn-flat">ENVIAR</button>

 </div>
  
  {!! Form::close() !!}
  </div>
</div>
         
         

    <hr class="clearfix">

</section>
 

@endsection

@section('pos-script')
<script>
  $("#formSuporte").submit(function(e) {
            $("#btEnviar").attr('disabled',true)
            e.preventDefault();

            var url = "{{route('admin.suporte.enviar')}}"; // the script where you handle the form input.

            $.ajax({
                   type: "POST",
                   url: url,
                   data: $("#formSuporte").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                    console.log(data)
                      if(data.status == "enviado"){
                         swal("Sucesso!", "E-mail enviado com sucesso, em breve entro em contato com você.", "success");
                      }else{
                         swal("Opa!", "Algo Aconteceu, entre em contato no meu whats.", "info");
                      }
                      $("#formSuporte")[0].reset()
                   }
                 });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
</script>
@endsection