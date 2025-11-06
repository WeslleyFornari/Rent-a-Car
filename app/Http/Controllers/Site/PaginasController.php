<?php

namespace RW940cms\Http\Controllers\Site;

use Illuminate\Http\Request;
use RW940cms\Models\GruposVeiculos;
use RW940cms\Repositories\MenuRepository;
use RW940cms\Repositories\ConteudoRepository;
use RW940cms\Repositories\GaleriaRepository;
use RW940cms\Models\Menu;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use RW940cms\Criteria\WhereServicosCriteria;
use Carbon\Carbon;
class PaginasController extends Controller
{
    private $menuRepository;
    public function __construct(
        MenuRepository $menuRepository,
        ConteudoRepository $conteudoRepository,
        GaleriaRepository $galeriaRepository
    ){
        $this->menuRepository = $menuRepository;
        $this->conteudoRepository = $conteudoRepository;
        $this->galeriaRepository = $galeriaRepository;
    }
  
    public function Paginas(Request $request,$slug){
        
        
        $conteudo = $this->menuRepository->findWhere(['slug_menu'=>$slug])->first()->conteudo()->first();
        $galeria =  $this->galeriaRepository->findWhere(['conteudo_id'=>$conteudo->id])->all();
        
        return view("site.interno",compact('conteudo','galeria'));
        
   
    }

   
    public function contato(Request $request){
        
        $slug = $request->path();
        $conteudo = $this->menuRepository->findWhere(['slug_menu'=>$slug])->first()->conteudo()->first();
        

        return view("site.contato",compact('conteudo'));
    }
    public function alugueMensal(Request $request,$dataInicio = null,$dataTermino = null ){    
        $slug = 'alugue-mensal';
        $data = $request->all();
       
      
       $dataInicio =  new Carbon($dataInicio);
        $dataInicio = $dataInicio->format('d/m/Y');
       $dataTermino =  new Carbon($dataTermino);
      
        $dataTermino = $dataTermino->format('d/m/Y');
        if($dataTermino == date('d/m/Y')){
             $dataTermino = new Carbon();
             $dataTermino->addDays(30);
             $dataTermino = $dataTermino->format('d/m/Y');
        }

        
        $conteudo = $this->menuRepository->findWhere(['slug_menu'=>$slug])->first()->conteudo()->first();

        $grupos = GruposVeiculos::where('status','=','ativo')->orderBy('sigla_grupo','asc')->get();

        return view("site.mensal",compact('conteudo','dataInicio','dataTermino','grupos'));
    }
   
    

     

}
