@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<section class="content-header">
  <h1>Faturamentos: {{$associado->name}}</h1>
  
  <div class="clearfix"></div>
</section>
<section class="col-xs-12">

  <div class="box box-default col-xs-12 m-top-md">
    <div class="box-header with-border">
      <i class="fa fa-book"></i>
      <h3 class="box-title">Lista</h3>
      <div class="pull-right">
     <a href="{{route('painel.faturamento.novo',['id'=>$associado->id])}}" class="btn btn-xs btn-primary btn-flat btn-block"><i class="fa fa-plus"></i> Cadastrar</a>
   </div>
    </div>
    <!-- /.box-header -->
   
      <table class="table box-body table-hover">
        <tr>
          <th>Dia</th>
          <th>Mes</th>                   
          <th>Ano</th>                   
          <th>Valor</th>                   
          <th>Status</th>                   
          <th>Observações</th>                   
                        
          <th class="col-xs-1">Ações</th>
        </tr>
        <tr>
        
          @if(count($faturamentos) == 0)
          <td colspan="6">
          Nenhum faturamento encontrado
          </td>
          @endif
        
        @foreach($faturamentos as $faturamento)
          <td>{{$faturamento->dia_faturamento}}</td>
          <td>{{$faturamento->mes_faturamento}}</td>
          <td>{{$faturamento->ano_faturamento}}</td>
          <td>R$ {{number_format($faturamento->valor_faturamento,2,',','.')}}</td>
          <td>{{$faturamento->status_faturamento}}</td>
          <td>{{@$faturamento->observacao}}</td>
          
          <td>
            <a href="{{route('painel.faturamento.delete',['id'=>$faturamento->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
            <a href="{{route('painel.faturamento.editar',['id'=>$faturamento->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a>
            </td>
          </tr>
          @endforeach
        </table>

     <div class="box-footer">
     <div class="col-sm-8 col-sm-offset-2 text-center">
        {!!$faturamentos->render()!!}
        </div>
     </div>

      <!-- /.box-body -->
    </div>

    <hr class="clearfix">

  </section>


  @endsection
  @section('pos-script')
<script type="text/javascript">
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