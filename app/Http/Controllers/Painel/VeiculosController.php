<?php

namespace RW940cms\Http\Controllers\Painel;

use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Models\Veiculos;
use RW940cms\Models\GruposVeiculos;
use RW940cms\Models\Clientes;
class VeiculosController extends Controller
{
    public function __construct(

       ){
        

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$status = null){
        $veiculos = Veiculos::where('status','!=','removido')->get();
        return view('painel.veiculos.lista',compact('veiculos'));
    }
   
    public function novo(){
         $grupo = GruposVeiculos::where('status','ativo')->pluck('nome_grupo','id');
         
         return view('painel.veiculos.novo',compact('grupo'));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = $request->except('_token');
         $veiculo = Veiculos::create($data);
         return response()->json(['erro'=>'0','msg'=>'Veículo cadastrada com sucesso','veiculo'=>$veiculo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id = null){

         $veiculo = Veiculos::find($id);
        return view('painel.veiculos.show',compact('veiculo'));
    }    
    public function cliente(Request $request,$id = null){
          $cliente = Clientes::find($id);
        return view('painel.veiculos.cliente',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {   
        $veiculo = Veiculos::find($id);
        $grupo = GruposVeiculos::where('status','ativo')->pluck('nome_grupo','id');
        return view('painel.veiculos.editar',compact('veiculo','grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $veiculo = Veiculos::where('id',$id)->update($data);
        return response()->json(['erro'=>'0','msg'=>'Veículo atualizado com sucesso','veiculo'=>$veiculo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         Veiculos::where('id','=',$id)->update(['status'=>'removido']);
    }
}
