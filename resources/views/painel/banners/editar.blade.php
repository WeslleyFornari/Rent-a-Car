@extends('layouts.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('adminLTE/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
@endsection
@section('content')
<section class="content-header m-bottom-lg">
  <style>
    .footerActions {
      position: fixed;
      width: calc(100% - 73px);
      background: #fff;
      z-index: 100;
      bottom: 0;
      left: 73px;
      opacity: 0.5;
    }

    .footerActions:hover {
      opacity: 1;
    }

    .content-wrapper>.content {
      padding-bottom: 100px;
    }

    .list-action {
      padding: 10px;
    }
  </style>
  <div class="clearfix"></div>
</section>
{!! Form::model($banner,['route'=>['admin.banners.update', $banner->id],'id'=>'form']) !!}
@include('painel.banners._form')
{!! Form::close() !!}
@endsection
@section('pos-script')
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset('adminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
@include('painel.banners._script')
@endsection