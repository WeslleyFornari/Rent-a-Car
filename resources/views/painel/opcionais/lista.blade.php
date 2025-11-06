   @foreach($opcionais as $op)
   <div class="row m-bottom-xs">
    <div class="col-sm-1 col-xs-1 text-right">
      @if($op->media)
      <img src="{{$op->media->fullpatch()}}" alt="">
      @endif
    </div>
   <div class="col-sm-7 col-xs-4 text-left">
       {{$op->nome}}
       </div>

   <div class="col-sm-2 col-xs-1 text-right pull-right">
       <a href="{{route('admin.opcionais.edit',$op->id)}}" class="btn btn-primary btn-xs btnEdit"><span class="fa fa-pencil"></span></a>
       <a href="{{route('admin.opcionais.delete',$op->id)}}" class="btn btn-danger btn-xs btnDelete"><span class="fa fa-trash"></span></a>
       </div>
       
       
   </div>
   @endforeach