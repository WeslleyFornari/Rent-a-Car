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

class MenuController extends Controller
{
     public function __construct(
        ConteudoRepository $conteudoRepository,
        CategoriasRepository $categoriasRepository,
        ImagemDestaqueRepository $imagemDestaqueRepository,
        ItensMenuRepository $menuRepository,TipoMenuRepository $tipoMenuRepository){
         $this->conteudoRepository = $conteudoRepository;
         $this->categoriasRepository = $categoriasRepository;
         $this->imagemDestaqueRepository = $imagemDestaqueRepository;
         $this->menuRepository = $menuRepository;
         $this->tipoMenuRepository = $tipoMenuRepository;
}
   
    public function index()
    {
       $tiposMenu = $this->tipoMenuRepository->all();
       return view("painel.menu.tipos",compact('tiposMenu'));
    }

  

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug_menu'] = str_slug($data['nome_menu'], "-");  
        
        $this->tipoMenuRepository->create($data);
        return redirect()->route('admin.tiposMenu.index');   
    }

   
    public function editar($id)
    {
        $menu = $this->tipoMenuRepository->find($id);
        $tiposMenu = $this->tipoMenuRepository->all();
       return view("painel.menu.tipos",compact('tiposMenu','menu'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();    
        $data['slug_menu'] = str_slug($data['nome_menu'], "-"); 
        $this->tipoMenuRepository->update($data,$id);
               return redirect()->route('admin.tiposMenu.index');   
    }
     public function delete($id){
        $product = $this->tipoMenuRepository->delete($id);

        return redirect()->route('admin.tiposMenu.index');   
    }
}
