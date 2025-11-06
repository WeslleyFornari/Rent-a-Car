@extends('templates.site')
@section('title', 'Home')
@section('pre-assets')
<style>
/*#banner .titulo {
  font-weight: 700;
}
#banner .texto {
  font-size: 3.2em;
  font-weight: 700;
}
@media screen and (max-width: 480px) {
  #banner .controle{
   overflow:hidden; 
   display: table;
 }
 #banner .slick-prev-banner{
  left: 10px;
  top:100%;
  margin-top: 15px;
}
#banner .slick-next-banner{
  right: 10px;
  top:100%;
  margin-top: 15px;
  font-weight: 700;
}
#banner .contentPreview{
  width: 90% !important;
  left: 5% !important;
  text-align: center !important;
  top: 5% !important;
  display: table-cell;
  vertical-align: middle;
  position: initial !important;
}
#banner .titulo {
  font-weight: 700;
}
#banner .texto {
  font-size: 2em;
  font-weight: 700;
}
#banner .imgFront{
  position: absolute;
}
#banner  .contentPreview .titulo{
  font-size: 1.8em !important;
}
#banner .imgFundo{
  background-position: center center !important;
}
}
*/
</style>
@endsection
@section('content')
<div id="banner" class="slick-banner" style="overflow: hidden;">
 @foreach($banners as $banner)
 <div class="item">
  <div class="imgFundo"  style="@if($banner->img_fundo == '1') {{$banner->style_bg}}  @endif height:395px;width: 100%"  >
    <div class="controle" style="position: relative;" >
      @if($banner->img_fundo != '1') 
      @if($banner->link_full == '1')
      <a href="{{$banner->link}}">
        @endif
        <img src="{{asset('img/banners')}}/{{$banner->arquivo}}" class="imgFront" alt="">  @endif
        <div class="contentPreview" style="{{$banner->style_texto}}">
          <div class="titulo" style="font-size: 2.3em;">{{$banner->titulo}}</div>
          <div class="texto">{{$banner->texto}}</div>
          <div class="botao">
            @if(substr($banner->style_link,'0',5) == "class")
            <a href="{{$banner->link}}" class="{{substr($banner->style_link,7,7)}}">{{$banner->label_link}}</a>
            @else
            <a href="{{$banner->link}}" {{str_replace("'",'',$banner->style_link)}}>{{$banner->label_link}}</a>
            @endif


          </div>
        </div>
        @if($banner->link_full == '1')</a>  @endif
      </div>

    </div>
  </div>
  @endforeach
  @foreach($bannersVeiculos as $bannerVeiculo)
  <div class="item">
    <div class="produto-slide">
      <div class="container-fluid">
        <div class="fotos">
          @foreach($bannerVeiculo->fotos as $key => $foto)
            @if($key <= 1)
          <div class="foto">
            <picture>
             
                  <img srcset="{{$foto->arquivo}}" alt="{{$bannerVeiculo->titulo}}">
                </picture>
                <div class="sombra">
                  <img src="{{asset('min/img/sombra-banner.png')}}" alt="">
                </div>
              </div>
            @endif
              @endforeach


            </div>
            <div class="desc">
              <div class="title">
                {{$bannerVeiculo->titulo}}<br><small>{{$bannerVeiculo->modelo_versao}} {{$bannerVeiculo->ano_modelo}}</small>
              </div>
              <div class="options"> {{$bannerVeiculo->cor}}, {{$bannerVeiculo->portas}} portas, {{$bannerVeiculo->combustivel}}, {{$bannerVeiculo->km}} Km.</div>
              <a href="{{route('veiculos.detalhes',['slug'=>$bannerVeiculo->slug])}}" class="btn btn-block btn-flat bg-amarelo">VER OFERTA</a>
            </div>
          </div>
        </div>

      </div>
      @endforeach
      


            </div>
            @include('includes.filtro-basico')
            <section id="ofertas">
              <div class="container">
                <h2>Ofertas em <span class="text-amarelo">Destaque</span></h2>
                <ul class="lista-ofertas">

                  @foreach($veiculosEmDestaque as $veiculo)

                  <li style="background-image: url('{{$veiculo->fotos[0]->arquivo}}')">
                    <div class="degrade"></div>
                    <a href="{{route('veiculos.detalhes',['slug'=>$veiculo->slug])}}">

                      <div class="title">{{$veiculo->titulo}} <br>{{$veiculo->modelo_versao}}  2018</div>
                      <div class="btn-oferta"><i class="fa fa-plus"></i> DETALHES</div>
                    </a>
                  </li>
                  @endforeach
                  @foreach($veiculos as $veiculo)

                  <li style="background-image: url('{{$veiculo->fotos[0]->arquivo}}')">
                    <div class="degrade"></div>
                    <a href="{{route('veiculos.detalhes',['slug'=>$veiculo->slug])}}">

                      <div class="title">{{$veiculo->titulo}} <br>{{$veiculo->modelo_versao}}  2018</div>
                      <div class="btn-oferta"><i class="fa fa-plus"></i> DETALHES</div>
                    </a>
                  </li>
                  @endforeach
                 
              </ul>
              <div class="col-sm-2 col-sm-offset-5 m-top-lg col-xs-12">
                <a href="{{route('veiculos')}}" class="btn bg-preto btn-block">VER TODAS</a>
              </div>

            </div>
          </section>
          <section id="destaque-capital">
            <h2>PORQUE ESCOLHER A <span class="text-amarelo">CAPITAL VEÍCULOS</span></h2>
            <ul>
              <li>
                <a href="{{route('financiamento')}}">
                  <div class="title">FINANCIAMENTO FACILITADO</div>
                  <div class="img">
                    <img src="{{asset('min/img/icon-finaciamento.png')}}" alt="">
                  </div>
                  <div class="desc">Trabalhamos com as melhores financeiras, a fim de encontrar a melhor opção para compra de seu veículo.</div>
                </a>
              </li>
              <li>
                <a href="#" data-toggle="modal" data-target="#modalCertificado">
                  <div class="title">certificado de qualidade</div>
                  <div class="img">
                    <img src="{{asset('min/img/icon-certificado.png')}}" alt="">
                  </div>
                  <div class="desc">Todos os nossos veículos acompanham o selo de perícia realizado pela 3º VISSÂO</div>
                </a>
              </li>
              <li>
                <a href="{{route('veiculos')}}">
                  <div class="title">diversos <br> modelos</div>
                  <div class="img">
                    <img src="{{asset('min/img/icon-modelos.png')}}" alt="">
                  </div>
                  <div class="desc">Com {{ceil(count($veiculos))}} veículos disponíveis para sua escolha.</div>
                </a>
              </li>
              <li>
                <a href="" data-toggle="modal" data-target="#modalChecklist">
                  <div class="title">CHECKLIST DE REVISÃO</div>
                  <div class="img">
                    <img src="{{asset('min/img/icon-checklist.png')}}" alt="">
                  </div>
                  <div class="desc">Checklist de entrega de veículo garantindo total satisfação na sua compra.</div>
                </a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </section>

@include("includes.modais-certificados")

          @endsection

          @section('pos-script')


          @endsection