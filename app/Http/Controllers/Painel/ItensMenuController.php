<?php

namespace RW940cms\Http\Controllers\Painel;

use Illuminate\Http\Request;

use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Repositories\ConteudoRepository;
use RW940cms\Repositories\CategoriasRepository;
use RW940cms\Repositories\ImagemDestaqueRepository;
use RW940cms\Repositories\ItensMenuRepository;
use RW940cms\Repositories\TipoMenuRepository;
use BCA\FontAwesomeIterator\Iterator as FontAwesomeIterator;

class ItensMenuController extends Controller
{
     public function __construct(
        ConteudoRepository $conteudoRepository,
        CategoriasRepository $categoriasRepository,
        ImagemDestaqueRepository $imagemDestaqueRepository,
        ItensMenuRepository $itensMenuRepository,TipoMenuRepository $tipoMenuRepository ){
         $this->conteudoRepository = $conteudoRepository;
         $this->categoriasRepository = $categoriasRepository;
         $this->imagemDestaqueRepository = $imagemDestaqueRepository;
         $this->itensMenuRepository = $itensMenuRepository;
         $this->tipoMenuRepository = $tipoMenuRepository;
    }
   
    public function index($id){
       $tipo_menu_id = $id;
       $itensMenu = $this->itensMenuRepository->orderby('ordem','asc')->findWhere(['tipo_menu_id'=>$id]);

       $conteudo = $this->conteudoRepository->findWhere(['status'=>'1'])->pluck('titulo_conteudo','id')->prepend('Selecione', "")->all();
       $icons = new FontAwesomeIterator('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
      
       return view("painel.menu.menus",compact('itensMenu','conteudo','icons','tipo_menu_id'));
    }

  

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug_menu'] = str_slug($data['titulo'], "-");  
        $this->itensMenuRepository->create($data);
        return redirect()->route('admin.menu.index',['id'=>$data['tipo_menu_id']]);   
    }

   
    public function editar($idMenu,$idItemMenu)
    {
      $tipo_menu_id = $idMenu;
      $itensMenu = $this->itensMenuRepository->findWhere(['tipo_menu_id'=>$idMenu]);

      $conteudo = $this->conteudoRepository->findWhere(['status'=>'1'])->pluck('titulo_conteudo','id')->prepend('Selecione', "")->all();
      $icons = new FontAwesomeIterator('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
      
       


      $menu = $this->itensMenuRepository->find($idItemMenu);
      
      return view("painel.menu.menus",compact('itensMenu','conteudo','icons','tipo_menu_id','menu'));

    }

    public function update(Request $request, $idMenu,$idItemMenu)
    {
        $data = $request->all();  

        $data['slug_menu'] = str_slug($data['titulo'], "-"); 

        $this->itensMenuRepository->update($data,$idItemMenu);
        return redirect()->route('admin.menu.index',['id'=>$idMenu]);   
    }
     public function ordem(Request $request)
    {
        $data = $request->all();    
dd($data);
        foreach ($data['ordem'] as $key => $value) {
          $this->itensMenuRepository->update(['ordem'=>$value],$key);
        }
       
        
    }
     public function delete($idMenu,$idItemMenu){
        $this->itensMenuRepository->delete($idItemMenu);
        return redirect()->route('admin.tiposMenu.index',['id'=>$idMenu]);   
    }
}
