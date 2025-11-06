<?php

namespace RW940cms\Http\Controllers\Painel;

use Illuminate\Http\Request;

use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Repositories\ConfiguracoesRepository;



class ConfiguracoesController extends Controller
{
     public function __construct(ConfiguracoesRepository $configuracoesRepository){
        $this->configuracoesRepository = $configuracoesRepository;
     
        
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuracoes = $this->configuracoesRepository->all();

        return view("painel.configuracoes.index",compact('configuracoes'));
    }
 public function lista(Request $request)
    {
       $configuracoes = $this->configuracoesRepository->all();

       return response()->json($configuracoes);   

    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['parametro'] = str_slug($data['titulo'], "-");  
        
        $check = $this->configuracoesRepository->findWhere(['parametro'=>$data['parametro']])->first();
        if(!$check){
            $this->configuracoesRepository->create($data);
            return response()->json(['status'=>'ok']);   
        }else{
            return response()->json(['status'=>'existe']);   
        }

        //return redirect()->route('admin.configuracoes.index');   
    }

    public function editar($id)
    {
        $configuracoes = $this->configuracoesRepository->all();
        $config = $this->configuracoesRepository->find($id);
        return view("painel.configuracoes.index",compact('configuracoes','config'));
    }

   
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $data['parametro'] = str_slug($data['titulo'], "-");  
        
        $check = $this->configuracoesRepository->findWhere(['parametro'=>$data['parametro']])->first();
        
        if($check->id == $id){
            $this->configuracoesRepository->update($data,$id);
            return response()->json(['status'=>'ok']);   
        }else{
            return response()->json(['status'=>'existe']);   
        }
    }

    public function delete($id)
    {
        $this->configuracoesRepository->delete($id);
    }
}
