<?php

namespace RW940cms\Http\Controllers\Painel;

use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Models\Veiculos;
use RW940cms\Models\Opcionais;
class OpcionaisController extends Controller
{
   
    public function index(Request $request){
       
        return view('painel.opcionais.opcionais');
    }
    public function getOpcionais(Request $request){
      $opcionais = Opcionais::where('status','1')->get();
      return view('painel.opcionais.lista',compact('opcionais'));
    }
    

    public function store(Request $request)
    {
       $data = $request->except('_token'); 
       Opcionais::create($data);
       return response()->json(['erro'=>'0','msg'=>'Opcional cadastrado com sucesso']);
      

    }

    public function edit(Request $request, $id)
    {
      
      $opcional = Opcionais::find($id);
      return view('painel.opcionais.editar',compact('opcional'));
    
    } 
    public function novo(Request $request)
    {
      
  
      return view('painel.opcionais.novo');
    
    }
    public function update(Request $request, $id)
    {
       $data = $request->except('_token');
           Opcionais::where('id',$id)->update($data);
           return response()->json(['erro'=>'0','msg'=>'Opcional alterado com sucesso']);
    
    }

    public function delete($id){
      Opcionais::where('id',$id)->update(['status'=>'0']);
      return response()->json(['erro'=>'0','msg'=>'Opcional removido com sucesso']);
    }

  
}
