@extends('layouts.painel')
@section('pre-assets')
<style>
.select-icon{
  position: relative;
  border: 1px solid #ededed;
  border-radius: 4px;
  box-shadow: 1px 1px 1px #ededed;

}
.item-icon{
  padding: 5px;
  border-bottom:  1px dotted #ededed;
  display: block;
  color: #333;
}
.item-icon.active{
  background: #039ef7;
  color: #333;
}
.item-icon.active:hover{
  color: #333;
}
.item-icon:hover{
  color: #039ef7;
  cursor: pointer;
}
.item-icon i{
  float: right;
}
.content-icon{
  overflow-y: scroll;
  max-height: 100px;
}

body.dragging, body.dragging * {
  cursor: move !important;
}

.dragged {
  position: absolute;
  opacity: 0.5;
  z-index: 2000;
}

ol.example li.placeholder {
  position: relative;
  /** More li styles **/
}
ol.example li.placeholder:before {
  position: absolute;
  /** Define arrowhead **/
}
</style>
@endsection
@section('content')

     <section class="content-header">
                    <h1  class="col-sm-6">Menus</h1>
                
                    
    <div class="clearfix"></div>
  </section>

   
<section class="col-xs-4">
  <div class="box box-default col-xs-12 m-top-md">
    <div class="box-header with-border">
            
            <h3 class="box-title">Cadastrar</h3>
            
            </div>
            <div class="box-body">
              @if(@$menu)
               {!! Form::model($menu,['route'=>['admin.menu.update',$tipo_menu_id,$menu->id],'class'=>'']) !!}
                  @else
               {!! Form::model(null,['route'=>['admin.menu.store'],'class'=>'']) !!}
               @endif
                <input type="hidden" name="tipo_menu_id" value="{{$tipo_menu_id}}">

               <div class="form-group col-sm-12 ">
                <label for="">Status</label><div class="clearfix"></div>
                <div class="col-xs-6">

                  <label >
                    <input type="radio" name="status"  @if(@$menu->status == "1") checked=""  @endif  value="1" class="flat-red" checked="" >
                    Ativo
                  </label>
                </div>
                <div class="col-xs-6">
                  <label>
                    <input type="radio" name="status" @if(@$menu->status == "3") checked=""  @endif value="3" class="flat-red" f>
                    Inativo
                  </label>
                </div>   
              </div>
           <div class="col-sm-12 form-group ">
              <label for="">Item Pai</label>
            
            <select name="id_menu_pai" id="" class=" form-control">
            <option value="0">Selecione..</option>
             @foreach ($itensMenu as $item)
               <option value="{{$item->id}}"  @if(@$menu->id == $item->id) selected @endif>{{ $item->titulo }}</option>
           @endforeach
          </select>
          </div>
          <div class="col-sm-12 form-group ">
              {!! Form::label('Nome Menu','Nome Menu:') !!}
              {!! Form::text('titulo',@$menu->titulo,['class'=>'form-control']) !!}
          </div>
          <div class="form-group col-sm-12 ">
                <label for="">Ocultar Texto?</label><div class="clearfix"></div>
                <div class="col-xs-6">

                  <label >
                    <input type="radio" name="ocultar_texto" @if(@$menu->ocultar_texto == "1") checked=""  @endif value="1" class="flat-red"  >
                    Sim
                  </label>
                </div>
                <div class="col-xs-6">
                  <label>
                    <input type="radio" name="ocultar_texto" @if(@$menu->ocultar_texto == "0") checked=""  @endif value="0" class="flat-red"  >
                    Não
                  </label>
                </div>   
            </div>
          <div class="col-sm-12 form-group ">
          
              {!! Form::label('Class Customizada','Class Customizada:') !!}
              {!! Form::text('class_custom',null,['class'=>'form-control']) !!}
          </div>
          <div class="col-sm-12 form-group ">
              {!! Form::label('Conteúdo','Conteúdo:') !!}
              {!! Form::select('id_conteudo',$conteudo,@$conteudo->id,['class'=>'form-control select2']) !!}
          </div>

          <div class="col-sm-12 form-group ">
          
              {!! Form::label('Link Personalizado','Link Personalizado:') !!}
              {!! Form::text('link_custom',@$menu->link_custom,['class'=>'form-control','id'=>'link_custom']) !!}
          </div>
          <div class="col-sm-12 form-group ">
          
              {!! Form::label('icone','Icone:') !!}
              {!! Form::text('icone_texto',@$menu->icone_texto,['class'=>'form-control','id'=>'icone_texto']) !!}
          </div>
          <div class="col-sm-12 form-group ">

          
            <div class="select-icon">
              
            <div class="content-icon">
              @foreach ($icons as $icon) 
                <a href="#" class="item-icon @if(@$menu->icone_texto == $icon->class) active @endif" data-icon="{{$icon->class}}">
                  {{$icon->class}} <i class="fa {{$icon->class}}"></i>
                </a>
              @endforeach
              </div>
    </div>

           </div>
          
          
          
           <div class="col-sm-12 m-top-sm">
           <button type="submit" class="btn btn-success btn-flat btn-block">SALVAR</button>
          </div>

  {!! Form::close() !!}
            </div>
  </div>
</section>
<section class="col-xs-8">
   

<div class="box box-default col-xs-12 m-top-md">
            <div class="box-header with-border">
              <i class="fa fa-book"></i>

              <h3 class="box-title">Lista</h3>
             
            </div>
            <!-- /.box-header -->
          
                <table class="table table-hover sorted_table">
                <thead>
                    <tr>
                        <th style="width: 10px;">Ordem</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                  <form action="" id="formOrdem">
                  @foreach($itensMenu as $itemMenu)
                <tr id="{{$itemMenu->id}}" class="ordem">
                  <td><i class="fa fa-arrows" style="cursor: move;"></i>
                  
                  </td>
                  <td>@if($itemMenu->ocultar_texto == '1') <i class="fa {{$itemMenu->icone_texto}}"></i> @else {{$itemMenu->titulo}}@endif</td>
                  <td>@if($itemMenu->status == '1')
                            <span class="label label-success">Ativo</span>
                            @elseif($itemMenu->status == '2')
                            <span class="label label-warning">Pendente</span>
                            @elseif($itemMenu->status == '3')
                            <span class="label label-danger">Inativo</span>
                            @endif</td>
                  <td>
                    <a href="{{route('admin.menu.delete',['idMenu'=>$tipo_menu_id,'idItemMenu'=>$itemMenu->id])}}" class="btn btn-danger btn-destroy btn-xs"><i class="fa fa-trash-o"></i></a>
                   
                    <a href="{{route('admin.menu.editar',['idMenu'=>$tipo_menu_id,'idItemMenu'=>$itemMenu->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fa fa-pencil"></i></a></td>
                </tr>
                @endforeach

                </form>
             </tbody>
            </table>
               
            
          
            <!-- /.box-body -->
          </div>

    <hr class="clearfix">

</section>
 
<link href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" rel="stylesheet">
@endsection

@section('pos-script')
<!--<script src="https://johnny.github.io/jquery-sortable/js/jquery-sortable.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">


  $(document).ready(function(){
     $(".item-icon").click(function(e){
    e.preventDefault();
    $(".item-icon").removeClass("active")
    $(this).addClass('active');
    var icone = $(this).data('icon');
    console.log(icone);
    $("input[name='icone_texto']").val(icone)
  })

   
    $( ".sorted_table tbody" ).sortable( {
    update: function( event, ui ) {

      
    },
        stop:function(){
          var data = [];

       
           $( ".sorted_table tbody tr").each(function(index) {
            var id = $( ".sorted_table tbody tr").eq(index).attr('id');
            data["ordem"] = [id,index]; 
          });
           console.log(data);
          $.post("{{route('admin.ajax.ordem.menu')}}",{data},function(response){
            console.log(response)
          });
      }
});
  })
 

</script>
  @endsection