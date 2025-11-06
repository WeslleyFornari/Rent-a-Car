@extends('layouts.painel')
@section('pre-assets')
<link href="{{asset('css/criarComponentes.css') }}" rel='stylesheet' type='text/css' />
<style>
	.list-files{
		list-style: none;
		margin: 0;
		padding: 0;
	}
	.list-files li{
		display: inline-block;
		vertical-align: top;
		text-align: center;
		border: 1px solid #ededed;
		padding: 5px;
		border-radius: 4px;
		margin-bottom: 5px;
		width: 24%;
	}
	.list-files li img{
		width: auto%;
		height: auto;
		max-height: 85px;
	}
	.list-files li:hover{
		background: #ededed;
		transition: 0.2s all linear;
	}
	.list-files li a{
		display: block;
		height: 85px;
		overflow: hidden;
		line-height: 85px;
		vertical-align: middle;
		margin: 0 auto;
		color: #666;
	}
</style>
@endsection
@section('content_header')
 <!-- /.col -->
     <section class="content-header m-bottom-md">
                    <h1  class="col-sm-6">Gerenciador de Media </h1>
                   
    <div class="clearfix"></div>
  </section>
  @stop

@section('content')

      
<div class="content">
	<div class="col-sm-3">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading"><i class="fa fa-folder-open"></i> Pastas</div>



			<ul class="list-group">
				<li class="list-group-item"><a href="" data-folder="{{$folderAtual}}"><i class="fa fa-folder"></i> {{$folderAtual}}</a></li>
				@foreach(@$folders as $folder)
					<li class="list-group-item">|- <a href=""  data-folder="{{$folder}}"><i class="fa fa-folder"></i> {{$folder}}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="col-sm-9 pull-right">
		<div class="panel panel-default">
			<div class="panel-heading"> <h3 class="panel-title"><i class="fa fa-file"></i> Arquivos</h3> </div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
					<div class="form-group">
			          <label for="exampleInputFile">Upload</label>
			            <div class="container-upload">
			               <div class="carregandoForm" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
			               <input type="file"  id="uploadArquivos" class="uploadArquivos" multiple="" name="file">
			               <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGEM</div>
			            </div>
			        </div>
			        </div>
				</div>
				<hr>
				<div class="row  m-bottom-xs actionRemove hidden">
					<div class="col-sm-12 pull-right text-center">
						<a href="" class="btn btn-danger btn-xs">Remover</a>
					</div>
				</div>
				<div class="row">
					<form action="" id="formFiles">
						 @csrf
						<input type="hidden" name="folder" value="{{$folderAtual}}">
						<input type="hidden" name="folder_parent" value="{{$folder_parent}}">
						<div class="col-sm-12">
							<ul class="list-files">
								
							</ul>
						</div>
					</form>
				</div>
				<div class="row  m-top-xs actionRemove hidden">
					<div class="col-sm-12 pull-right text-center">
						<a href="" class="btn btn-danger btn-xs">Remover</a>
					</div>
				</div>
				<div class="row">
					<div class="cols-m-12 text-center">
						{{$files}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




@endsection

@section('pos-script')
<script type="text/javascript">
  $(document).ready(function() {
  	 function listaFiles(folder,page = 1){
	  	if(!folder){
	  		folder = 'img/';
	  	}else{

	  	}
	  	 var data = new FormData();
	  	 data.append('folder', folder);
	  	 data.append('_token', '{{ csrf_token() }}');
	  	 data.append('page', page);

	  	 $.ajax({
            url: '{{route("admin.media.lista-files")}}',
           type: 'POST',
          
          cache: false,
          contentType: false,
          processData: false,
          data : data,
          success: function(result){
           $(".list-files").html(result)
          
          }
          });
         
     
	  }
	   listaFiles();
	   $(".list-files").on('click','a',function(e){
	   			e.preventDefault();
	   });
	   $("body").on('click','.actionRemove',function(e){
	   	e.preventDefault();
	  	 	$.post('{{route("admin.ajax.delete-media")}}',$("#formFiles").serialize(),function(data){
	   		//console.log(data);
	   		var page = $('.pagination .active a').attr('href').split("=");
	 		listaFiles($("input[name='folder']").val(),page[1]);
	   	})
 		
	   })
	    $("body").on('click','.checkFile',function(e){
  	
  		if($('.checkFile:checked').length > 0){
  			$(".actionRemove").removeClass("hidden");
  		}else{
  			$(".actionRemove").addClass("hidden");
  		}

  	})
  	$(".list-group a").click(function(e){
  		e.preventDefault();
  		var folder = $(this).data('folder');

  		$("input[name='folder']").val(folder)
 		listaFiles(folder);
  	})
  	$(".pagination li").eq(1).html('<a class="page-link" href="{{route("admin.media.index")}}?page=1">1</a>');
  	$(".page-link").click(function(e){
  		e.preventDefault();
  		var page = $(this).attr('href').split("=");
  		$(".pagination").find(".active").removeClass("active");
  		$(this).parent().addClass("active")
 		listaFiles($("input[name='folder']").val(),page[1]);
  	})
	  $('#uploadArquivos' ).on('change', function() {
          $("#carregandoForm").show(0);
          var data = new FormData();
        $.each($("input[type='file']")[0].files, function(i, file) {
              data.append('file[]', file);
        });
         data.append('folder', $("input[name='folder']").val());
         data.append('folder_parent',  $("input[name='folder_parent']").val());

          $.ajax({
            url: '{{route("admin.ajax.upload-media")}}',
           type: 'POST',
          
          cache: false,
          contentType: false,
          processData: false,
          data : data,
          success: function(result){
           console.log(result);
          
          }
          });
         
        });

	 
      });
</script>
  @endsection