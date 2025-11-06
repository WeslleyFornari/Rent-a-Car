@extends('layouts.painel')
@section('pre-assets')
<style>
    .controle_950 {
        max-width: 950px !important;
        margin: 0 auto;
    }
    th,
    td {
        text-align: left;
    }
    .list-group-item:first-child {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .list-group-item:last-child {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    td img {
        max-width: 100px;
        max-height: 40px;
    }
    .star {
        color: gray;
    }
    .star.select {
        color: #ff9f00;
    }
    label {
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
    }
    li a {
        color: #000;
    }
    .bg-blue-opacity {
        background-color: #ccf4fb;
    }
    .bg-blue-opacity a {
        color: #007bff;
        font-weight: bold;
    }
    .box {
        padding: 0 !important;
    }
    td:first-child,
    th:first-child {
        width: 500px;
    }
</style>
@endsection
@section('content')
<section class="col-sm-12 mt-5 mb-3 container" >
    <div class="col-4">
        <h4><b>Banners</b></h4>
    </div>
</section>
<section class="col-sm-12 container">
    <div class="box box-default col-12 m-top-md br-8">
        <div class="box-header with-border">
            <h2 class="box-title">Lista</h2>
            <a href="{{route('admin.banners.novo')}}" class="btn btn-primary btn-xs"
            style="margin-left:10px">
            <i class="fa fa-plus"></i>
        Adicionar</a>
         
    </div>
    <!-- /.box-header -->
 
    {!! Form::model(null,['route'=>['admin.banners.order'],'id'=>'formListOrder']) !!}


    <div class="box-body p-0">
        <table class="table table-hover">
            <tr>
                <th style="width: 150px;">Thumb</th>
                <th>Title</th>
                <th class="text-center">Ordem</th>
                <th class="text-center">Status</th>
                <th class="text-right">Actions</th>
            </tr>
@foreach($banners as $key => $item)
            <tr>
                <td style="width: 150px;">  
                    <img style="height: 50px ;" src="{{URL::to('/')}}/img/banners/{{@$item->media_desktop}}" alt=""></td>
                <td>
              
                  
                    <p>{{$item->nome}}</p>
                </td>
                <td style="width: 100px" class="order">
                    <input type="text" name="ordem[{{$item->id}}]" class="form-control input-sm inputOrdem" style="padding: 3px" value="{{$item->ordem}}">
                </td>
                <td class="text-center">
                    <label class="btn-success"> {!!$item->status!!}</label>
                </td>
                <td style="width: 150px" class="text-right">
                    <a href="{{route('admin.banners.delete', $item->id)}}" class="btn btn-danger btn-xs btn-destroy">
                        <i class="fa fa-trash"></i>
                    </a>
                    <a href="{{route('admin.banners.editar', $item->id)}}" class="btn btn-primary btn-xs ">
                        <i class="fa fa-pencil"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- /.box-body -->
    {!! Form::close() !!}
</div>
</section>
@endsection
@section('pos-script')

<script type="text/javascript">
function saveOrder(){
      var url = $("#formListOrder").attr('action');
      $(".campos").html('');
      $('.order').each(function(index) {
        var eqindex = index - 1;
        if(index === 0){
         var val = 10; 
       }else{
         var val = Number($('.order').eq(eqindex).find('input').val()) + 10;
       }
       console.log(val)
       var name = $('.order').eq(eqindex).find('input').attr('name')
       $(this).find('.inputOrdem').val(val);
       //$("#formListOrder .campos").append('<input type="text" name="'+name+'" value="'+val+'" />')
     });
     $('.inputOrdem').each(function(index) {
         var name = $(this).attr('name')
      var val = $(this).val();
       $("#formListOrder .campos").append('<input type="hidden" name="'+name+'" value="'+val+'" />')
       });
      $.post(url,$("#formListOrder").serialize(),function(data){
        console.log(data);
        toastr.success('Update order with success.', 'Order')
      })
    }
$(".inputOrdem").change(function(e){
      e.preventDefault();
      $(".campos").html('')
      var name = $(this).attr('name')
      var val = $(this).val()
      $(".campos").append('<input type="hidden" name="'+name+'" value="'+val+'" />');
      var url = $("#formListOrder").attr('action');
      $.post(url,$("#formListOrder").serialize(),function(data){
        console.log(data);
        toastr.success('Update order with success.', 'Order')
      })
    })
</script>
@endsection