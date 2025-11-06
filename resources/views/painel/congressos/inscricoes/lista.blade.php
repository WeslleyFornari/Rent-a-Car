@extends('templates.painel')
@section('pre-assets')
@endsection
@section('content')

<section class="content-header">
  <h1>Inscrições</h1>
  <div class="clearfix"></div>
</section>
<section class="col-xs-12">
  <div class="box box-default col-xs-12 m-top-md">
    <div class="box-header with-border">
     

      <h3 class="box-title pull-left">Lista  <i class="fa fa-book"></i></h3>
        <a href="{{route('painel.inscricoes.exportar',['id'=>$inscricoes[0]->congresso_id])}}" target="_blank" class="btn btn-success btn-flat pull-right btn-xs">Exportar em Excel</a>
    </div>
    <!-- /.box-header -->

    <table class="table box-body table-hover">
      <tr>
        <th>Nome</th>
        <th>Data Inscrição</th>                   
        <th>Status Pagamento</th>                   
        <th class="col-xs-1">Ações</th>
      </tr>
   
        @foreach($inscricoes as $congresso)
        @if($congresso->nome != "")
        @if($congresso->dadosPagamento)
       <tr>
        <td>{{$congresso->nome}}</td>
        <td>{{gmdate('d/m/Y',strtotime($congresso->created_at))}}</td>
        <td>@if(@$congresso->dadosPagamento->statusPagamento->cod_pagseguro == '3' || @$congresso->dadosPagamento->statusPagamento->cod_pagseguro == '4')
              <span class="label label-success" data-toggle="tooltip" data-placement="top" title="{{@$congresso->dadosPagamento->statusPagamento->descricao_pagamento}}">{{$congresso->dadosPagamento->statusPagamento->titulo_pagamento}}</span>
              @elseif(@$congresso->dadosPagamento->statusPagamento->cod_pagseguro == '1')
              <span class="label label-warning" data-toggle="tooltip" data-placement="top" title="{{@$congresso->dadosPagamento->statusPagamento->descricao_pagamento}}">{{$congresso->dadosPagamento->statusPagamento->titulo_pagamento}}</span>
              @elseif(@$congresso->dadosPagamento->statusPagamento->cod_pagseguro == '7')
              <span class="label label-danger" data-toggle="tooltip" data-placement="top" title="{{@$congresso->dadosPagamento->statusPagamento->descricao_pagamento}}">{{$congresso->dadosPagamento->statusPagamento->titulo_pagamento}}</span>
              @else
              <span data-toggle="tooltip" data-placement="top" title="{{@$congresso->dadosPagamento->statusPagamento->descricao_pagamento}}">
               {{@$congresso->dadosPagamento->statusPagamento->titulo_pagamento}}
               </span>
              
              @endif
        </td>
        <td>
          <a href="{{route('painel.inscricoes.delete',['id'=>$congresso->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
         
        </td>
        </tr>
        @endif
        @endif
        @endforeach
      </table>
      <div class="text-center">
    {!!$inscricoes->render()!!}
</div>

      <!-- /.box-body -->
    </div>

    <hr class="clearfix">

  </section>


  @endsection
   @section('pos-script')
<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  $(".btn-danger").click(function(e){
    var url = $(this).attr('href');
      e.preventDefault();
      $(this).closest('tr').addClass("remove-row");
         swal({
        title: 'Tem certeza?',
        text: "Você irá remover definitivamente este item",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, remover!'
      }).then(function () {
      
        $.get(url,function(data){
         $(".remove-row").remove()
           swal({
            title: 'Sucesso!',
            text: 'Item removido com sucesso.',
             type:'success',
            timer: 2500,
            }
          )
        })
       
      })
  })
</script>
  @endsection