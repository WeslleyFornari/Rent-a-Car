<?php

namespace RW940cms\Http\Controllers\Site;
use RW940cms\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RW940cms\Models\GruposVeiculos;
use RW940cms\Models\Veiculos;
use RW940cms\Models\Banner;
use RW940cms\Repositories\BannerRepository;
use Rede;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        BannerRepository $bannerRepository
    ){
        //$this->middleware('auth');
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $banners = Banner::where('status','=','ativo')->orderBy('ordem','asc')->get();
        $grupos = GruposVeiculos::where('status','=','ativo')->orderby('sigla_grupo','asc')->get();
        return view('site.home',compact('grupos','banners'));
        
    }
}
