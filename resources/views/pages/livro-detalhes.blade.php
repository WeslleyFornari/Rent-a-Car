@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')

  <div class="row">
        <div class="col-sm-9" id="artigo">
          <h1>{{$livro->titulo_livro}}</h1>
         
          <div class="clearfix m-top-sm m-bottom-sm"></div>
          <div class="content-artigo">

            <img src="{{asset('img_livros').'/'.$livro->foto_capa}}" alt="" class="img-responsive " style="float: left; margin-right: 10px;margin-bottom: 10px;" >
            
            {!!$livro->introducao_livro !!}
            <div class="m-top-lg m-bottom-lg"></div>
            <h4>ONDE COMPRAR</h4>
            <ul>
              @if(@$livro->onde_comprar)
               @foreach(unserialize(@$livro->onde_comprar) as $onde_comprar)
                <li><a href="{{$onde_comprar['url_local']}}" target="_blank" class="btn btn-success btn-flat">{{$onde_comprar['nome_local']}}</a></li>
              @endforeach
              @endif
            </ul>
            <hr>

            @if($livro->editora_livro != '')
             <div class="col-sm-6"><label for="">Editora:</label> {{$livro->editora_livro}}</div> 
            @endif @if($livro->autor != '')
             <div class="col-sm-6"><label for="">Autor:</label> {{$livro->autor}}</div> 
            @endif
              @if($livro->tradutor != '')
             <div class="col-sm-6"><label for="">Autor:</label> {{$livro->tradutor}}</div> 
            @endif
            @if($livro->isbn != '')
             <div class="col-sm-6"><label for="">ISBN:</label> {{$livro->isbn}}</div> 
            @endif
            @if($livro->formato != '')
             <div class="col-sm-6"><label for="">Formato:</label> {{$livro->formato}}</div> 
            @endif
            @if($livro->paginas != '')
             <div class="col-sm-6"><label for="">Páginas:</label> {{$livro->paginas}}</div> 
            @endif
            @if($livro->edicao != '')
             <div class="col-sm-6"><label for="">Edição:</label> {{$livro->edicao}}</div> 
            @endif
            @if($livro->ano_publicacao != '')
             <div class="col-sm-6"><label for="">Ano de Publicação:</label> {{$livro->ano_publicacao}}</div> 
            @endif
            
           <hr>
          <div class="sharethis-inline-share-buttons"></div>
  
          </div>


        </div>
        <div class="col-sm-3">
          
        </div>

      </div>


   @endsection

   @section('pos-script')
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=598f5d28d85a710012ca4dfe&product=inline-share-buttons"></script>
   @endsection