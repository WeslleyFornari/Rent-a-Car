@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<style>
	table td{
		padding: 10px;
	}
	 table td, table tr{
		border:1px dotted #666 !important;
	}
	.lista-users li{
		list-style: none;
		padding: 5px;
		float: left;
		width: 100%;
		position: relative;
	}
	.lista-users li .fa{
		position: absolute;
		right: 0;
		top: 5px;
	}
	.lista-users li:hover{
		background: #ededed;
	}
	.lista-users{
		max-height: 50vh;
		overflow-y: scroll;
		
		padding: 0;
		margin: 0;
	}
	.panel-header{
		padding: 10px;
	}
</style>
@endsection
@section('content')
     <section class="content-header m-bottom-lg">
      <h1> Enviar E-mails </h1>
     
    <div class="clearfix"></div>
  </section>
  <section >
  {!! Form::model(null,['route'=>['painel.regionais.store'],'class'=>'']) !!}
 <div class="col-sm-8">
	<div class="row">
		<div class="form-group">
			<label for="">Assunto</label>
			<input type="text" class="form-control">
		</div>
	</div>
	<div class="row">
		<div class="form-group">
			<label for="">Mensagem</label>
			<textarea name="" id="summernote" class="form-control" cols="30" rows="10">
				
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif" >
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF" style="padding:20px;"><img src="http://abiblica.org.br/min/img/logo.png" width="191" height="63" /></td>
  </tr>
 
 
  
  
  <tr>
    <td colspan="2" align="center" style="min-height: 200px" > <br><br>
    	<p>Insira aqui seu texto.</p>

    </td>
  </tr>
  <tr>
    <td width="272" align="left" bgcolor="#333333" style="color:#ffffff; font-size:12px;"><a href="mailto:atendimento@abiblica.org.br" style="color:#fff;">E-mail: atendimento@abiblica.org.br</a> <br>
      (11) 97978-8892 | (11) 95279-7387</td>
    <td width="50%" align="right" bgcolor="#333333" style="color:#ffffff; font-size:12px;">Av. Brigadeiro Luís Antônio 993, Sala 205<br>
CEP: 01317-001 São Paulo – SP</td>
  </tr>
</table>

			</textarea>
		</div>
	</div>
</div>
<div class="col-sm-4">
	<div class="panel">
		<div class="panel-header">
			<label for="">Destinatários</label>
		</div>
		<div class="panel-body">
			<div class="form-group">

        <label for="">Filtrar por status</label>
        <select name="status_associado" id="" class="form-control">
          <option value="">Selecione (Todos)</option>
          <option value="1" @if(request()->status_associado == "1") selected @endif>Pagamento em dia</option>
          <option value="2" @if(request()->status_associado == "2") selected @endif>Pendente Pagamento</option>
          <option value="3" @if(request()->status_associado == "3") selected @endif>Inativo</option>
          <option value="4" @if(request()->status_associado == "4") selected @endif>Aguardando Análise</option>
        </select>
      </div>
		<div class="form-group">
			<ul class="lista-users">
				@foreach($associados as $associado)
				<li class="status_{{$associado->status_associado }} filter_status">
					<div class="col-sm-2 p-all-0"><input type="checkbox" class="minimal" name="" id=""></div>
					<div class="col-sm-10 p-left-0">{{@$associado->user->name}}<br><small>{{@$associado->user->email}}</small>

					@if(@$associado->status_associado == '1')
              <span class="fa fa-circle text-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></span>
              @elseif(@$associado->status_associado == '2')
              <span class="fa fa-circle text-warning" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></span>
              @elseif(@$associado->status_associado == '3')
              <span class="fa fa-circle text-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></span>
              @elseif(@$associado->status_associado == '4')
              <span class="fa fa-circle text-primary" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></span>
              @elseif(!@$associado->status_associado)
               
              @endif
          </div>
				</li>
				@endforeach
		</ul>
		</div>	

		</div>
		<div class="panel-footer">
			<div class="col-sm-2  p-all-0"><input type="checkbox" class="minimal" name="selectAll" id=""></div>
			<div class="col-sm-910 -left-">Selecionar todos</div>
			<div class="clearfix"></div>
		</div>
	
	</div>
	
</div>
  {!! Form::close() !!}

</section>

@endsection
@section('pos-script')
   
   
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	 $(function () {
	 	  $('[data-toggle="tooltip"]').tooltip()

	 $('#summernote').summernote({
    toolbar: [
    // [groupName, [list of button]]
    ['style', ['style','bold', 'italic', 'underline', 'clear','underline']],
    ['Insert', ['picture', 'link', 'video', 'table','hr']],
   
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['Misc',['codeview','undo','redo']]
  ],
     placeholder: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione voluptatem praesentium natus temporibus vel. Quos nulla, odit. Optio, earum, delectus perferendis soluta dicta dolorem, ex enim omnis nulla sed consequuntur.',
      tabsize: 1,
        height: 300,
        lang: 'pt-BR',
        popover: {
      image: [

        // This is a Custom Button in a new Toolbar Area
        ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
        ['float', ['floatLeft', 'floatRight', 'floatNone']],
        ['remove', ['removeMedia']]
      ]
    },callbacks: {
        onImageUpload: function(image) {
            uploadImage(image[0]);
        }
    }
  });
  function uploadImage(image) {
    var data = new FormData();
    console.log(image);
    data.append("file[]", image);
    $.ajax({
        url: "",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "post",
        success: function(url) {

            var image = $('<img>').attr('src',"{{URL::to('img')}}/"+url);
            $('#summernote').summernote("insertNode", image[0]);
        },
        error: function(data) {
            console.log(data);
        }
    });
}
  function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
                }
            });
        }
});
	 $("select[name='status_associado']").change(function(){
	 	var value = $(this).val();
	 		if(value == ""){
	 			$(".filter_status").removeClass('.hidden')
	 		}
	 		$(".filter_status").each(function(index){
	 			
	 			if(!$(this).hasClass('status_'+value)){
	 				$(this).addClass('hidden')
	 			}else{
	 				$(this).removeClass('hidden')
	 			}
	 		})
	 })
$('input[name="selectAll"]').on('ifChecked', function (event) {
     
        $(".filter_status").each(function(index){
	 			
	 			if(!$(this).hasClass('hidden')){
	 				$(this).iCheck('check');
	 			}
	 		})
});
$('input[name="selectAll"]').on('ifUnchecked', function (event) {
     
        $(".filter_status").each(function(index){
	 			
	 			if(!$(this).hasClass('hidden')){
	 				$(this).iCheck('uncheck');
	 			}
	 		})
});
</script>
  @endsection 