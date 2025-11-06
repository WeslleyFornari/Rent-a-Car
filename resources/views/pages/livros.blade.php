@extends('templates.site')
@section('pre-assets')
@endsection
@section('content')
<div class="row">
  <div class="col-sm-12  col-xs-12">
    <h1>Livros</h1>
    <hr>
    
    <div id="livros" class="wapper-destaque">
      <h3>Destaques</h3>
      <div class="livros-carousel"  data-slick='{"slidesToShow": 4, "slidesToScroll": 1}'>

        @foreach($livrosDestaque as $livro)
        <div>
          <div class="capa-livro">
            <img src="img_livros/{{$livro->foto_capa}}" height="170" width="auto" alt="">
          </div>
          <div class="descricao-livro">

            <div class="titulo">
              <a href="{{route('livro.detalhes',['slug'=>$livro->slug_livro])}}" >{{$livro->titulo_livro}} </a>
            </div>
            <div class="autor">
              @if($livro->autor != '')
              Autor: {{$livro->autor}}
              @endif
            </div>
            <a href="{{route('livro.detalhes',['slug'=>$livro->slug_livro])}}" class="btn btn-success btn-block btn-flat">Saiba Mais</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="clearfix"></div>
{!!Form::open(['route'=>'livros.filtrar','class'=>'','id'=>"formFiltroLivros",'style'=>'position:relative'])!!}
    <form class="form" id="formFiltroLivros">
      <div class="row">
        <div class="col-xs-6 col-sm-4">
          <div class="form-group">
            <label for="exampleInputEmail1">Filtrar por Categoria</label>
          
            {!! Form::select('categoria', $categoriaLivros, NULL, array('class' => 'form-control'));!!}
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 pull-right">
          <label for="exampleInputEmail1">Ordenar por </label>
          <div class="clearfix"></div>
          <div class="col-xs-6 p-left-0">
            <select class="form-control">
              <option>Preço</option>
              <option>Nome Autor</option>
              <option>Titulo</option>

            </select>
          </div>
          <div class="col-xs-6">
            <select class="form-control">
              <option>Crescente</option>
              <option>Decrescente</option>
            </select>
          </div>

        </div>
      </div>
   {!!Form::close()!!}

    <ul class="lista-livros">
      @foreach($paginatedSearchResults as $livro)
      <li>
        <div class="capa-livro">
          <img src="img_livros/{{$livro->foto_capa}}" alt="">
        </div>
        <div class="titulo-livro">
          <a href="{{route('livro.detalhes',['slug'=>$livro->slug_livro])}}"><small>{{$livro->titulo_livro}}</small></a>
          </div>
          @if($livro->valor != "")

          <div class="valor-livro">
            R$ {{number_format($livro->valor,2,',','.')}}
          </div>
          @endif

        </li>
        @endforeach

      </ul>

</div>


      <div class="col-sm-4 col-xs-12 col-sm-offset-4 text-center">
       {!!$paginatedSearchResults->render()!!}
     </div>

   </div>









   @endsection

   @section('pos-script')

   @endsection