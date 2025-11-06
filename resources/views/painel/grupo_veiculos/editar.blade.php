@extends('layouts.painel')
@section('title')
Home | Novo Usuário
@stop

@section('content')
 {!! Form::model(null,['route'=>['admin.grupo_veiculos.update',$grupo->id],'id'=>'form']) !!}
  
  
 
<section class="content-header p-all-0 m-top-md">
                    <h1 class="col-sm-6">Cadastrar Grupo</h1>
                    <div class="col-sm-6">
                    <div class="list-action">
                      <ul>
                        <li><button type="button" class="btn btn-flat btn-default" data-action="sair">Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-primary" data-action="salvar_sair">Salvar e Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-success" data-action="salvar">Salvar</button></li>
                      </ul>
                    </div>
              </div>
    <div class="clearfix"></div>
  </section>


<div class="panel">
  <div class="panel-heading">
    
     <h2 class="panel-title"><strong></strong></h2> 
    
  </div>
  <div class="panel-body">
    <div class="col-sm-4">
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          
          
            <div class="col-xs-12">
              <div id="preview">
                <ul class="targetUseImage">
                   @if(!is_null($grupo->media))
                  <li>
                    <input type="hidden" name="media_id" value="{{$grupo->media_id}}" />
                    <a href="#" class="remove" data-file="{{$grupo->media_id}}">
                      <i class="fa fa-close" aria-hidden="true"></i> 
                    </a>
                   
                      <img src="{{@$grupo->media->fullpatch()}}">
                  
                   </li>
                   @endif
               
                </ul>
              </div>
            </div>
            <div class="col-xs-12">
              <button class="btn btn-default btn-block openPopUpMedia">
                <i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGEM
              </button>
          
            </div>

  </div>
</div>
</div>
    <div class="col-sm-8">
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="">Sigla</label>
            <input type="text" class="form-control" name="sigla_grupo" value="{{$grupo->sigla_grupo}}">
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <label for="">Nome do Grupo</label>
            <input type="text" class="form-control" name="nome_grupo" value="{{$grupo->nome_grupo}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
           <div class="form-group">
            <label for="">Valor Padrão</label>
            <input type="text" class="form-control moneyMask" name="valor_padrao" value="{{number_format($grupo->valor_padrao,2,',','.')}}">
          </div>
        </div>
      
      </div>
      <div class="row">
        <div class="col-sm-4">
           <div class="form-group">
            <label for="">Status</label><Br>
            <label class="switch">
              <input type="checkbox" name="status" @if($grupo->status == "ativo") checked="" @endif id="" value="ativo">
              <span class="slider round" ></span>
            </label>
          </div>
        </div>
      </div>

    </div>
<hr>
<div class="clearfix"></div>

<div class="row">
  <div class="col-sm-12">
    <h3>Valores de acordo com estoque <small>por diária</small></h3>
    <div id="tabelaPreco">
      

    <div class="col-sm-3">
      <div class="input-group">
          <input type="text" class="form-control" id="de_valor">
          <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
      </div>
    </div>  
        <div class="col-sm-1 text-center p-top-sm">
                até
        </div>
        <div class="col-sm-3">
        <div class="input-group">
                <input type="text" class="form-control" id="ate_valor">
                <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
        </div>
      </div>
      <div class="col-sm-3">
       <div class="input-group">
         <span class="input-group-addon"> R$</span>
                <input type="text" class="form-control moneyMask" id="valor_tabela">
               
        </div>
      </div>
      <div class="col-sm-2"> 
        <button type="button" class="btn btn-info btn-flat" id="addTabelaValores">
          <i class="fa fa-plus"></i>
        </button>
      </div>
   </div>
<div class="clearfix"></div>
  <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
    <div class="row">
       <div class="col-sm-10"><strong>Regra</strong></div>
      
      <div class="col-sm-2"><strong>Ação</strong></div>
    </div>
  </div>

  <div class="p-top-md p-bottom-md box box-solid" id="resAddValueTabela">
       @foreach($grupo->tabela_precos as $preco)
<div class="row m-all-0 p-bottom-sm">
         <div class="col-sm-3">
           <div class="input-group">
               <input type="text" name="tabela_valores[qtd_inicio][]"  class="form-control input-sm" value="{{$preco->qtd_inicio}}">
               <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
           </div>
         </div>  
         <div class="col-sm-1 text-center p-top-sm">até</div>
         <div class="col-sm-3">
           <div class="input-group ">
               <input type="text" name="tabela_valores[qtd_fim][]" class="form-control input-sm" value="{{$preco->qtd_fim}}">
               <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
           </div>
         </div>
          <div class="col-sm-3">
          <div class="input-group">
            <span class="input-group-addon"> R$</span>
            <input type="text" name="tabela_valores[valor_padrao][]" class="form-control moneyMask input-sm" value="{{number_format($preco->valor_padrao,2,'.',',')}}">    
           </div>
         </div>
         <div class="col-sm-2 text-center"> 
           <button type="button" class="btn btn-danger btn-sm btn-flat removeValue" >
             <i class="fa fa-minus"></i>
           </button>
         </div>
       </div>
       @endforeach
        <div class="clearfix"></div>
  </div>

  </div>
    <div class="col-sm-12">
         
  
  <h3>Adicionais <small>por diária</small></h3>
  <div id="valores">
    <div class="col-sm-7"> <input type="text" class="form-control" id="nome"></div>
    <div class="col-sm-3"> <input type="text" class="form-control moneyMask" id="valor"></div>
    <div class="col-sm-2"> <button type="button" class="btn btn-info btn-flat" id="addValue"><i class="fa fa-plus"></i></button></div>
 </div>
 <div class="clearfix"></div>
  <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
    <div class="row">
       <div class="col-sm-7"><strong>Adicional</strong></div>
      <div class="col-sm-3"><strong>Preço</strong></div>
      <div class="col-sm-2"><strong>Ação</strong></div>
    </div>
  </div>
  <div class="visible-xs m-top-lg clearfix"></div>
  <div class="box box-solid p-all-sm p-bottom-0 m-bottom-0">
    
     <div class="form-group" id="resAddValue">
     
@foreach($grupo->adicionais as $adicional)
    <div class="row p-bottom-sm" id="adicional">
      <div class="col-sm-7 col-xs-6">
        <label for="" class="visible-xs">Adcional</label>
        <input type="text" class="form-control input-sm" name="adicionais[nome][]" value="{{$adicional->titulo}}">
      </div>
      <div class="col-sm-3 col-xs-4">
            <label for="" class="visible-xs">Preço</label>
            <input type="text" class="form-control moneyMask input-sm"  name="adicionais[valor][]" value="{{number_format(@$adicional->valor,2,'.',',')}}" >
      </div>
      <div class="col-sm-2 col-xs-2">
            <label for="" class="visible-xs">Remover</label>
            <button type="button" class="btn btn-flat btn-danger btn-sm removeValue"><i class="fa fa-minus"></i></button>
      </div>
      
       
      </div>
      @endforeach
     </div>
 </div>
                  
  </div>
  <div class="col-sm-12">
  <h3>Promoções</h3>
  <div id="promocoes">
    <div class="col-sm-3"> <input type="text" name="" placeholder="de" class="form-control" id="de_diaria"></div>
    <div class="col-sm-3"> <input type="text" name="" placeholder="até" class="form-control " id="ate_diaria"></div>
    <div class="col-sm-3"> 
        <div class="input-group">
                <input type="text" placeholder="desconto" class="form-control" id="desconto">
                <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
        </div>
     
    </div>
    <div class="col-sm-2"> <button type="button" class="btn btn-info btn-flat" id="addPromocao"><i class="fa fa-plus"></i></button></div>
 </div>
 <div class="clearfix"></div>
  <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
    <div class="row">
       <div class="col-sm-3"><strong>De</strong></div>
      <div class="col-sm-3"><strong>Até</strong></div>
      <div class="col-sm-3"><strong>Desconto</strong></div>
      <div class="col-sm-2"><strong>Ações</strong></div>
    </div>
  </div>
  <div class="visible-xs m-top-lg clearfix"></div>
  <div class="box box-solid p-all-sm p-bottom-0 m-bottom-0">
    
     <div class="" id="resAddPromocao">
@foreach($grupo->promocoes as $promocao)
    <div class="row p-bottom-sm" id="adicional">
      <div class="col-sm-3 col-xs-6">
        <label for="" class="visible-xs">De</label>
        <input type="text" class="form-control input-sm" name="promocoes[de_diaria][]" value="{{$promocao->de_diaria}}">
      </div>
      <div class="col-sm-3 col-xs-4">
            <label for="" class="visible-xs">Até</label>
            <input type="text" class="form-control input-sm"  name="promocoes[ate_diaria][]" value="{{$promocao->ate_diaria}}" >
      </div>
      <div class="col-sm-3"> 
        <div class="input-group">
                <input type="text" name="promocoes[desconto][]" class="form-control" value="{{$promocao->desconto}}">
                <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
        </div>
     
    </div>
      <div class="col-sm-2 col-xs-2">
            <label for="" class="visible-xs">Remover</label>
            <button type="button" class="btn btn-flat btn-danger btn-sm removeValue"><i class="fa fa-minus"></i></button>
      </div>
      
       
      </div>
      @endforeach
     </div>
 </div>
                  

  </div>
  <div class="col-sm-12">
    <h3>Opcionais</h3>

    <div class="box box-solid p-all-sm m-top-lg bg-gray-active m-bottom-0 hidden-xs ">
      <div class="row">
        <div class="col-sm-4 p-all-0">
          <div class="col-sm-9"><strong>Opcional</strong></div>
          <div class="col-sm-3 text-center"><strong>Status</strong></div>
        </div>
        <div class="col-sm-4 p-all-0">
          <div class="col-sm-9"><strong>Opcional</strong></div>
          <div class="col-sm-3 text-center"><strong>Status</strong></div>
        </div>
        <div class="col-sm-4 p-all-0">
          <div class="col-sm-9"><strong>Opcional</strong></div>
          <div class="col-sm-3 text-center"><strong>Status</strong></div>
        </div>
        
        
        
        
        
      </div>
    </div>
    <div class="visible-xs m-top-lg clearfix"></div>
    <div class="box box-solid p-all-sm p-bottom-0 m-bottom-0">
      @foreach($opcional as $op)

      <div class="col-sm-4 col-xs-12 p-all-0">
        <div class="col-sm-9 col-xs-2">
          <label for="" class="visible-xs">Opcional</label>
          {{$op->nome}}
        </div>
        <div class="col-sm-3 col-xs-10 text-right">
          <label for="" class="visible-xs">Status</label>
          <label class="switch">
            <input type="checkbox" @if(in_array($op->id,$arrayOpcionais)) checked  @endif name="opcional[]" value="{{$op->id}}">
            <span class="slider round" ></span>
          </label>
        </div>

      </div>
      
      
      


      @endforeach
      <div class="clearfix"></div>
    </div>
  </div>
</div>
  </div>
  <div class="panel-footer">
    <div class="list-action">
                      <ul>
                        <li><button type="button" class="btn btn-flat btn-default btn-xs" data-action="sair">Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-primary btn-xs" data-action="salvar_sair">Salvar e Sair</button></li>
                        <li><button type="button" class="btn btn-flat btn-success btn-xs" data-action="salvar">Salvar</button></li>
                      </ul>
                    </div>
  </div>
</div>
 {!! Form::close() !!}
@endsection

@section('pos-script')
<script>
  
  $(document).ready(function(){
    $(".list-action").on('click','button',function(e){
      e.preventDefault();
      var action = $(this).data('action');

      if(action == 'sair'){
         swal({
            title: "Tem certeza?",
            text: "As alterações no formulário seram perdidas",
            icon: "warning",
            dangerMode: false,
              buttons:{
                  cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: true,
                  },
                  confirm: {
                    text: "Sim, Sair",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true
                  }
                }
          }) .then(confirmar => {
             if (confirmar) {
              window.location = '{{route("admin.grupo_veiculos.lista")}}'
             }
         });
      }else if(action == 'salvar_sair'){
        $.post($("#form").attr('action'),$("#form").serialize(),function(data){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
              });

             
              window.location = '{{route("admin.grupo_veiculos.lista")}}'
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }else if(action == 'salvar'){
        $.post($("#form").attr('action'),$("#form").serialize(),function(data){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
                timer:1000,
              });
              //$("#form")[0].reset();
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }

    });

 $("#addValue").click(function(e){
      e.preventDefault();
      var nome = $('#valores #nome').val();
      var valor = $('#valores #valor').val();
      $(this).closest("#valores").find('input').val('');

      $("#resAddValue").append('<div class="row p-bottom-sm">'
      +'<div class="col-sm-7 col-xs-6">'
        +'<label for="" class="visible-xs">Adcional</label>'
        +'<input type="text" class="form-control input-sm" name="adicionais[nome][]" value="'+nome+'">'
      +'</div>'
      +'<div class="col-sm-3 col-xs-4">'
            +'<label for="" class="visible-xs">Preço</label>'
            +'<input type="text" class="form-control moneyMask input-sm"  name="adicionais[valor][]" value="'+valor+'" >'
      +'</div>'
      +'<div class="col-sm-2 col-xs-2">'
            +'<label for="" class="visible-xs">Remover</label>'
            +'<button type="button" class="btn btn-flat btn-danger btn-sm removeValue"><i class="fa fa-minus"></i></button>'
      +'</div>'
      +'</div>');
    }) 
 $("#addPromocao").click(function(e){
      e.preventDefault();
      var de_diaria = $('#de_diaria').val();
      var ate_diaria = $('#ate_diaria').val();
      var desconto = $('#desconto').val();
      $(this).closest("#promocoes").find('input').val('');

      $("#resAddPromocao").append('<div class="row p-bottom-sm">'
      +'<div class="col-sm-3 col-xs-6">'
        +'<label for="" class="visible-xs">De</label>'
        +'<input type="text" class="form-control input-sm" name="promocoes[de_diaria][]" value="'+de_diaria+'">'
      +'</div>'
      +'<div class="col-sm-3 col-xs-4">'
            +'<label for="" class="visible-xs">Até</label>'
            +'<input type="text" class="form-control input-sm"  name="promocoes[ate_diaria][]" value="'+ate_diaria+'" >'
      +'</div>'
      +'<div class="col-sm-3 col-xs-4">'
           +'<div class="input-group">'
                +'<input type="text" placeholder="desconto" name="promocoes[desconto][]" class="form-control" value="'+desconto+'" >'
                +'<span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>'
        +'</div>'
      +'</div>'
      +'<div class="col-sm-2 col-xs-2">'
            +'<label for="" class="visible-xs">Remover</label>'
            +'<button type="button" class="btn btn-flat btn-danger btn-sm removeValue"><i class="fa fa-minus"></i></button>'
      +'</div>'
      +'</div>');
    }) 
 $("#resAddPromocao").on('click','.removeValue',function(e){
      e.preventDefault();
      $(this).closest('.row').remove();
    })

 
 $("#addTabelaValores").click(function(e){
      e.preventDefault();
      var de_valor = $('#de_valor').val();
      var ate_valor = $('#ate_valor').val();
      var tabela_valor = $('#valor_tabela').val();
      $(this).closest("#tabelaPreco").find('input').val('');
      $("#resAddValueTabela").append('<div class="row m-all-0 p-bottom-sm">'
          +'<div class="col-sm-3">'
            +'<div class="input-group">'
                +'<input type="text" name="tabela_valores[qtd_inicio][]"  class="form-control input-sm" value="'+de_valor+'">'
                +'<span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>'
            +'</div>'
          +'</div>  '
          +'<div class="col-sm-1 text-center p-top-sm">até</div>'
         +' <div class="col-sm-3">'
           +' <div class="input-group ">'
                +'<input type="text" name="tabela_valores[qtd_fim][]" class="form-control input-sm" value="'+ate_valor+'">'
               +' <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>'
            +'</div>'
          +'</div>'
           +'<div class="col-sm-3">'
           +'<div class="input-group">'
            +' <span class="input-group-addon"> R$</span>'
            +' <input type="text" name="tabela_valores[valor_padrao][]" class="form-control moneyMask input-sm" value="'+tabela_valor+'">'    
           +' </div>'
          +'</div>'
          +'<div class="col-sm-2 text-center"> '
            +'<button type="button" class="btn btn-danger btn-sm btn-flat removeValue" >'
             +' <i class="fa fa-minus"></i>'
            +'</button>'
          +'</div>'
        +'</div>');
    })

  $("#resAddValueTabela").on('click','.removeValue',function(e){
      e.preventDefault();
      $(this).closest('.row').remove();
    })
 $("#de_valor").change(function() {
  var val = $(this).val();
  $("input[name='tabela_valores[qtd_fim][]']").each(function(index){
    if($(this).val() == val){
      $("#de_valor").val(val+',01')
    }
  })
$("input[name='tabela_valores[qtd_inicio][]']").each(function(index){
    if($(this).val() == val){
      $("#de_valor").val('');
     swal({
                title: "Atenção!",
                text: 'Valor já existe nesta posição',
                icon: "info",
                button: false,
                timer:1000,
              });
    }
  })

 })
 $("#ate_valor").change(function() {
  var val = $(this).val();
  $("input[name='tabela_valores[qtd_inicio][]']").each(function(index){
    if($(this).val() == val){
      $("#ate_valor").val(val+',01')
    }
  })

  $("input[name='tabela_valores[qtd_fim][]']").each(function(index){
    if($(this).val() == val){
      $("#ate_valor").val('');
     swal({
                title: "Atenção!",
                text: 'Valor já existe nesta posição',
                icon: "info",
                button: false,
                timer:1000,
              });
    }
  })
 })
 })


</script>
@endsection