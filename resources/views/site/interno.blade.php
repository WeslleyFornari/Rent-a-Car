@extends('layouts.site')
@section('title', 'Home')
@section('pre-assets')
<style>

</style>
@endsection
@section('content')
        
            <div class="container">
                <h2>{{$conteudo->titulo_conteudo}}</h2>
                {!!$conteudo->texto!!}
            </div>

            
            
            
        
@endsection




@section('pos-script')





@endsection