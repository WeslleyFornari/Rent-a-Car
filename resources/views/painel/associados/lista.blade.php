@extends('templates.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<section class="content-header">
  {!! Form::open(['route'=>'painel.associado.lista', 'class'=>'form','method'=>'GET']) !!}
  <h1 class="col-sm-6">Todos Associados</h1>
  <div class="clearfix"></div>
  <div class="panel">
    <div class="col-sm-3">
      <div class="form-group">

        <label for="">Status</label>
        <select name="status_associado" id="" class="form-control">
          <option value="">Selecione</option>
          <option value="1" @if(request()->status_associado == "1") selected @endif>Pagamento em dia</option>
          <option value="2" @if(request()->status_associado == "2") selected @endif>Pendente Pagamento</option>
          <option value="3" @if(request()->status_associado == "3") selected @endif>Inativo</option>
          <option value="4" @if(request()->status_associado == "4") selected @endif>Aguardando Análise</option>
        </select>
      </div>
    </div>
    <div style="float: left;padding: 30px 10px 20px 10px">
      <div><label for="">Ou</label></div>
    </div>
                <div class="col-sm-3 m-top-md p-top-xs">
                  
                      <div class="form-group">
                        <input class="form-control" name="search" placeholder="Digite um nome ou e-mail" value="{{request()->search}}">

                       
                      </div>
                 
              </div>
              <div class="col-sm-2 m-top-md p-top-xs">
                
                          <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-search"></i></button>
                          <a href="{{route('painel.associado.lista')}}" type="submit" class="btn btn-danger btn-flat"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
                        
              </div>
              <div class="clearfix"></div>
              </div>
       {!! Form::close() !!}

  <div class="clearfix"></div>
</section>
<section class="col-xs-12">

  <div class="box box-default col-xs-12 m-top-md">
    <div class="box-header with-border">
      <i class="fa fa-book"></i>
      <h3 class="box-title">Lista</h3>
      <div class="pull-right">
     <a href="{{route('painel.associado.novo')}}" class="btn btn-xs btn-primary btn-flat btn-block"><i class="fa fa-plus"></i> Cadastrar</a>
   </div>
    </div>
    <!-- /.box-header -->
   
      <table class="table box-body table-hover">
        <tr>

          <th>Nome</th>
          <th>Contato</th>                   
                          
          <th>Status Cadastro</th> 
          <th>Status Pagamento</th> 
                         
          <th style="width: 120px">Ações</th>
        </tr>
        
        @foreach($associados as $associado)
        <tr>
          <td>{{@$associado->user->name}}</td>
          <td>{{@$associado->user->email}}
            <br>
            {{@$associado->telefone}}</td>
              <td>@if(@$associado->status_associado == '1')
              <span class="label label-success">Ativo</span>
              @elseif(@$associado->status_associado == '2')
              <span class="label label-warning">Pendente</span>
              @elseif(@$associado->status_associado == '3')
              <span class="label label-danger">Inativo</span>
              @elseif(@$associado->status_associado == '4')
              <span class="label label-primary">Aguardando Análise</span>
              @elseif(!@$associado->status_associado)
               
              @endif
          </td>
          <td>

            @foreach(@$associado->faturamento as $faturamento)
            @if($faturamento->ano_faturamento < date('Y') +1)
{{@$faturamento->ano_faturamento}}: {{@$faturamento->status_faturamento}}<br>
  @endif
              @endforeach
              
          </td>
        
          <td>
          <a href="{{route('painel.faturamento.associado',['id'=>@$associado->user->id])}}" class="btn btn-default btn-xs"><i class="fa fa-money"></i></a>
            <a href="{{route('painel.associado.delete',['id'=>@$associado->user->id])}}" class="btn btn-danger btnRemove btn-xs"><i class="fa fa-trash-o"></i></a>
            <a href="{{route('painel.associado.editar',['id'=>@$associado->user->id])}}" class="btn btn-primary btn-xs "><i class="fa fa-pencil"></i></a></td>
          </tr>
          @endforeach
        </table>

     <div class="box-footer">
     <div class="col-sm-8 col-sm-offset-2 text-center">
        {!!@$associados->appends(['status_associado' => $_GET['status_associado'],'search' => $_GET['search']])->render()!!}
        </div>
     </div>

      <!-- /.box-body -->
    </div>

    <hr class="clearfix">

  </section>


  @endsection
    @section('pos-script')
<script type="text/javascript">
  $(".btnRemove").click(function(e){
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