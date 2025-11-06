<?php

namespace RW940cms\Http\Controllers\Painel;

use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Models\Reservas;
use RW940cms\Models\Veiculos;
use RW940cms\Models\StatusPagamento;
use RW940cms\Models\Condutores;
use RW940cms\Models\Clientes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;
class ReservasController extends Controller
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
        $reservas = Reservas::orderBy('id','desc')->get();
        return view('painel.reservas.lista',compact('reservas'));
    }
   
    public function novo(){
         return view('painel.reservas.novo');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id){
        $reserva = Reservas::find($id);
        
        $StatusPagamento =  StatusPagamento::all()->pluck('titulo_pagamento','id');
       
        $veiculos_estoque = Veiculos::where('data_final_reserva','<',$reserva->data_inicio)
        ->orWhere('data_final_reserva',null)
        ->whereNotIn('status',['inativo','removido'])
        ->get();
//dd($reserva->data_inicio->format('d/m/Y'));
        return view('painel.reservas.show',compact('reserva','veiculos_estoque','StatusPagamento'));
    }
        
    public function print(Request $request,$id){
        $reserva = Reservas::find($id);
        
       
        $veiculos_estoque = Veiculos::where('data_final_reserva','<',$reserva->data_inicio)
        ->orWhere('data_final_reserva',null)
        ->whereNotIn('status',['inativo','removido'])
        ->get();

        return view('painel.reservas.print',compact('reserva','veiculos_estoque'));
    }  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
       $data = $request->except("_token");

     
       $data['reservas']['valor'] =  $this->moneyEn($data['reservas']['valor']);
       $data['reservas']['data_inicio'] =  $this->dateEn($data['reservas']['data_inicio']);
       $data['reservas']['data_termino'] =  $this->dateEn($data['reservas']['data_termino']);
       
       $data['cliente']['data_cnh'] =  $this->dateEn($data['cliente']['data_cnh']);
       $data['condutor']['data_cnh'] =  $this->dateEn($data['condutor']['data_cnh']);

       Reservas::where('id',$id)->update($data['reservas']);
       $reserva = Reservas::find($id);

       Condutores::where('id_cliente',$reserva->id_cliente)->update($data['condutor']);
       Clientes::where('id', $reserva->id_cliente)->update($data['cliente']);

       return response()->json(['erro'=>'0','msg'=>'Conteudo atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   
    public function financiamentoShow($id){
     
    }

    public function setBanner(Request $request){
       
    }
   
    public function dateEn($data){
        if(!is_null($data)){
        $newData = explode("/",$data);

        return $newData[2]."-".$newData[1]."-".$newData[0];
        }
    }
    public function moneyEn($value){
      $NewValue = str_replace(".",'',$value);
            $NewValue = str_replace(",",'.',$NewValue);
     return $NewValue;
    }
    public function descrypt(Request $request,$id){
        $data = $request->except("_token");
        $reserva = Reservas::find($id);

     
        if (Hash::check($data['password'], $reserva->key)){
         $numero_cartao = Crypt::decryptString($reserva->cartao_calcao->numero_cartao);
         $validade =  $reserva->cartao_calcao->validade;
         $cvv =  $reserva->cartao_calcao->cvv;
         $decrypt = $this->decripCalcao($reserva->cartao_calcao->numero_cartao,$reserva->cartao_calcao->validade,$reserva->cartao_calcao->cvv);
       
            $StatusPagamento =  StatusPagamento::all()->pluck('titulo_pagamento','id');
       
        $veiculos_estoque = Veiculos::where('data_final_reserva','<',$reserva->data_inicio)
            ->orWhere('data_final_reserva',null)
            ->whereNotIn('status',['inativo','removido'])
            ->get();
    //dd($reserva->data_inicio->format('d/m/Y'));
        return view('painel.reservas.show',compact('reserva','veiculos_estoque','StatusPagamento','decrypt'));
        }else{
            return response()->route('admin.reservas.show',$id);
        }
    }
    private function decripCalcao($numero_cartao,$validade,$cvv){
         
         $numero_cartao = Crypt::decryptString($numero_cartao);

        


          for($i =0 ;$i<= 15;$i++){
             ${'pos_'.$i} = substr($numero_cartao,$i,1);
          }
          $new_numero = $pos_8.$pos_4.$pos_9.$pos_1.$pos_7.$pos_13.$pos_11.$pos_0.$pos_14.$pos_2.$pos_5.$pos_15.$pos_6.$pos_12.$pos_10.$pos_3;


          for($i = 0 ;$i<= 6;$i++){
             ${'val_'.$i} = substr($validade,$i,1);
          }
          $new_val = $val_3.$val_5.$val_2.$val_0.$val_1.$val_6.$val_4;

          for($i = 0 ;$i<= 2;$i++){
             ${'cvv_'.$i} = substr($cvv,$i,1);
          }
          $new_cvv = $cvv_1.$cvv_2.$cvv_0;
          
          return  array('numero_cartao'=>$new_numero,'validade'=> $new_val,'cvv'=>$new_cvv);
          //$decrypted = Crypt::decryptString($encrypted);
    }
}
