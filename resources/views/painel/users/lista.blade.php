@extends('layouts.painel')
    @section('title')
        Home | Usuários
    @stop

    @section('content')

         <section class="content-header">
                    <h1  class="col-sm-6 p-all-0">Usuários</h1>
                     <div class="col-sm-6 p-all-0">
                    {!! Form::open(['route'=>'admin.users.lista', 'class'=>'form','method'=>'GET']) !!}
                      <div class="input-group">
                        <input class="form-control" name="search" placeholder="Pesquisar...">

                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                          <a href="{{route('admin.users.lista')}}" type="submit" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
                        </div>
                      </div>
                    {!! Form::close() !!}
              </div>
    <div class="clearfix"></div>
  </section>
<section class="box box-default col-xs-12 m-top-md">

             <div class="box-header with-border">
              <i class="fa fa-book"></i>

              <h3 class="box-title">Lista</h3>
              <div class="pull-right">
                <a href="{{route('admin.users.novo')}}" class="btn btn-primary btn-xs btn-flat btn-block">
                <i class="fa fa-plus"></i>
                Cadastrar</a>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- /.box-header -->
          
              <table class="table box-body table-hover">
               <thead>
              <tr class="headings">
                
               <th class="column-title col-sm-1 text-center"># ID</th>
               <th class="column-title ">Nome</th>
             

               <th class="column-title text-center">Último acesso</th>
    
               <th class="column-title no-link last col-sm-2 text-center"><span class="nobr">Ações</span></th>
               
            </tr>
          </thead>

          <tbody>
          
           

     


      @if(count($usuarios) == 0)
      
 <tr>
 <td></td>
        <td colspan="4">Nenhuma edição cadastrada</td>
      </tr>
      
     @else
       
          @foreach ($usuarios as $usuario) 
            <tr class="even pointer" id="usuario-{{$usuario->id}}">
              
              <td class="text-center">{{$usuario->id}}</td>
              <td class="text-left" valing="middle" >{{$usuario->name}}</td>
           
              <td class="text-center">
               {{gmdate('d/m/Y H:m',strtotime($usuario->updated_at))}}
              </td>
              
              <td class="text-center">
              <a href="{{route('admin.users.edit',['id'=>$usuario->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>  </a>
                
                <a href="{{route('admin.users.delete',['id'=>$usuario->id])}}" class="btn btn-danger btn-destroy btn-xs" data-destroy="{{$usuario->id}}"><i class="fa fa-trash-o"></i>  </a>
              </td>
            </tr>
       
  

      @endforeach
    @endif
    
          
          </tbody></table>
            
        
      
</div>



  </section>
@endsection

@section('pos-script')
<script type="text/javascript">
  $(document).ready(function(){
  $(".btn-danger").click(function(e){
    var url = $(this).attr('href');
      e.preventDefault();
      $(this).closest('tr').addClass("remove-row");
      swal({
  title: "Tem certeza?",
  text: "Você irá remover definitivamente este item",
  icon: "warning",

  dangerMode: true,
})
.then(willDelete => {
   $.get(url,function(data){
     $(".remove-row").remove();
    if (willDelete) {
      swal("Sucesso!", "Item removido com sucesso.", "success");
    }
  });
});

       
       
      
  })

  })
</script>
  @endsection