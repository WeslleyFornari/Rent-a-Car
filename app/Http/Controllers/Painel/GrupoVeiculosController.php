<?php

namespace RW940cms\Http\Controllers\Painel;

use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Models\Veiculos;
use RW940cms\Models\GruposVeiculos;
use RW940cms\Models\Opcionais;
use RW940cms\Models\OpcionaisGrupos;
use RW940cms\Models\AdicionaisGrupos;
use RW940cms\Models\PrecosGrupos;
use RW940cms\Models\Promocoes;
class GrupoVeiculosController extends Controller
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
        $veiculos = GruposVeiculos::where('status','!=','deletado')->get();
        return view('painel.grupo_veiculos.lista',compact('veiculos'));
    }
   
    public function novo(){
        $opcional = Opcionais::where('status','1')->get();
        return view('painel.grupo_veiculos.novo',compact('opcional'));
    }
    public function opcionais(){
         return view('painel.grupo_veiculos.opcionais');
    }

    public function editar(Request $request, $id){
        $grupo = GruposVeiculos::find($id);
        $opcionais_grupo = $grupo->opcionais()->get();
       // dd($opcionais_grupo);
        $arrayOpcionais = [];
        if(count($opcionais_grupo) > 0){
          foreach ($opcionais_grupo as $key => $value) {
            $arrayOpcionais[] = $value->id_opcional;
          }
        }

        $opcional = Opcionais::where('status','1')->get();
        return view('painel.grupo_veiculos.editar',compact('grupo','opcional','arrayOpcionais'));
    }
     public function promo(Request $request, $id = null){
        return view('painel.grupo_veiculos.promo');
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


       $check = GruposVeiculos::where('sigla_grupo',$data['sigla_grupo'])->count();

       if($check != 0){
            return response()->json(['erro'=>'1','msg'=>'Sigla já consta em nosso sistema']);
       }else{
            
           $grupo = GruposVeiculos::create($data);
   

            foreach ($data['opcional'] as $key => $value) {
              OpcionaisGrupos::create([
                'id_grupo',$grupo->id,
                'id_opcional'=>$value
              ]);
            }
          
           return response()->json(['erro'=>'0','msg'=>'Grupo cadastrada com sucesso','grupo'=>$grupo]);
       }

    }

    
    public function update(Request $request, $id)
    { 

       $data = $request->except('_token');
       if(!@$data['status']){
        $data['status'] = 'inativo'; 
       }

       $check = GruposVeiculos::where('sigla_grupo',$data['sigla_grupo'])->where('id','!=',$id)->count();

       if($check != 0){
            return response()->json(['erro'=>'1','msg'=>'Sigla já consta em nosso sistema']);
       }else{
          if(isset($data['opcional'])){
            $opcional = $data['opcional'];
              unset($data['opcional']);
            }

            if(isset($data['adicionais'])){
              $adicionais = $data['adicionais'];

             
               unset($data['adicionais']);
            }
            if(isset($data['tabela_valores'])){
              $tabela_valores = $data['tabela_valores'];
              unset($data['tabela_valores']);
            }
            if(isset($data['promocoes'])){
              $promocoes = $data['promocoes'];
              unset($data['promocoes']);
            }
            $data['valor_padrao'] = str_replace(".", "", $data['valor_padrao']);
            $data['valor_padrao'] = str_replace(",", ".", $data['valor_padrao']);
   

           $grupo = GruposVeiculos::where('id',$id)->update($data);
           
        if(isset($adicionais)){
          AdicionaisGrupos::where('grupo_veiculos_id',$id)->delete();
            foreach ($adicionais['nome'] as $key => $value) {
              $adicionais['valor'][$key] = str_replace(".", "", $adicionais['valor'][$key]);
              $adicionais['valor'][$key] = str_replace(",", ".", $adicionais['valor'][$key]);
   
              AdicionaisGrupos::create([
                'grupo_veiculos_id'=>$id,
                'titulo'=>$value,
                'valor'=>$adicionais['valor'][$key]
              ]);
            }
        }else{
           AdicionaisGrupos::where('grupo_veiculos_id',$id)->delete();
        }
        if(isset($opcional)){
           OpcionaisGrupos::where('id_grupo',$id)->delete();
            foreach ($opcional as $key => $value) {
              OpcionaisGrupos::create([
                'id_grupo'=>$id,
                'id_opcional'=>$value
              ]);
            }
          }else{
             OpcionaisGrupos::where('id_grupo',$id)->delete();
          }
        if(isset($tabela_valores)){
           PrecosGrupos::where('grupo_veiculos_id',$id)->delete();
            foreach ($tabela_valores['qtd_inicio'] as $key => $value) {
               $tabela_valores['valor_padrao'][$key] = str_replace(".", "", $tabela_valores['valor_padrao'][$key]);
              $tabela_valores['valor_padrao'][$key] = str_replace(",", ".", $tabela_valores['valor_padrao'][$key]);
              PrecosGrupos::create([
                'grupo_veiculos_id'=>$id,
                'qtd_inicio'=>$value,
                'qtd_fim'=>$tabela_valores['qtd_fim'][$key],
                'valor_padrao'=>$tabela_valores['valor_padrao'][$key]
              ]);
            }
          }else{
             PrecosGrupos::where('grupo_veiculos_id',$id)->delete();
          }
        if(isset($promocoes)){
           Promocoes::where('grupo_veiculos_id',$id)->delete();
            foreach ($promocoes['de_diaria'] as $key => $value) {
               $promocoes['desconto'][$key] = str_replace(".", "", $promocoes['desconto'][$key]);
              $promocoes['desconto'][$key] = str_replace(",", ".", $promocoes['desconto'][$key]);
              Promocoes::create([
                'grupo_veiculos_id'=>$id,
                'de_diaria'=>$value,
                'ate_diaria'=>$promocoes['ate_diaria'][$key],
                'desconto'=>$promocoes['desconto'][$key]
              ]);
            }
          }else{
             Promocoes::where('grupo_veiculos_id',$id)->delete();
          }
           return response()->json(['erro'=>'0','msg'=>'Grupo alterado com sucesso','grupo'=>$grupo]);
       } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        GruposVeiculos::where('id','=',$id)->update(['status'=>'deletado']);
    }

   
    public function financiamentoShow($id){
     
    }

    public function setBanner(Request $request){
       
    }
   
    public function setEmDestaque(Request $request){
     
    }
}
