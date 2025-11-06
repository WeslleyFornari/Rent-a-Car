<?php

namespace RW940cms\Http\Controllers\Site;

use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Models\Veiculos;
use RW940cms\Models\GruposVeiculos;
use RW940cms\Models\Opcionais;
use RW940cms\Models\OpcionaisGrupos;
use RW940cms\Models\Clientes;
use RW940cms\Models\Condutores;
use RW940cms\Models\Reservas;
use RW940cms\Models\CartaoCalcao;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\Crypt;

use URL;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Input;

class ReservaController extends Controller{


    public function clienteStore(Request $request){
       $data = $request->except('_token');
       $data['cliente']['data_cnh'] = $this->dateEn($data['cliente']['data_cnh']);
 
       if($data['id_cliente'] != ""){
        $id_reserva = $data['id_reserva'];
        $id_cliente = $data['id_cliente'];
          unset($data['id_reserva']);
          unset($data['id_cliente']);
          
          Clientes::where('id',$id_cliente)->update($data['cliente']);
          $arrayRetorno = ['status'=>'ok','cliente'=>$id_cliente,'reserva'=>$id_reserva];
       }else{
          $cliente  = Clientes::create($data['cliente']);   
          if($cliente){
            $reservaDados = array(
            'diarias'=>$data['diarias'],
            'data_inicio'=>$this->dateEn($data['data_inicio']),
            'hora_inicio'=>$data['hora_inicio'],
            'data_termino'=>$this->dateEn($data['data_termino']),
            'hora_termino'=>$data['hora_termino'],
            'id_grupo_veiculos'=>$data['grupo_id'],
            'valor'=>$data['valor'],
            'id_cliente'=>$cliente->id
          );
           
            $reserva = Reservas::create($reservaDados);
            $arrayRetorno = ['status'=>'ok','cliente'=>$cliente->id,'reserva'=>$reserva->id];
          }else{
            $arrayRetorno = ['status'=>'erro'];
          }
        }
        return response()->json($arrayRetorno);
    } 
    public function condutorStore(Request $request){
       $data = $request->except('_token');
       $data['data_cnh'] = $this->dateEn($data['data_cnh']);
        $condutor  = Condutores::create($data);

        if($condutor){
          Reservas::where('id',$data['id_reserva'])->update(['id_condutor'=>$condutor->id]);
          $arrayRetorno = ['status'=>'ok','condutor'=>$condutor->id];
        }else{
          $arrayRetorno = ['status'=>'erro'];
        }
        $reserva = Reservas::find($data['id_reserva']);
        
        $dataReserva = [
          'reserva_status'=>$reserva->status,
          'reserva_data_inicio'=>$reserva->data_inicio->format('d/m/Y'),
          'reserva_hora_inicio'=>date('H:i',strtotime($reserva->hora_inicio)),
          'reserva_data_termino'=>$reserva->data_termino->format('d/m/Y'),
          'reserva_hora_termino'=>date('H:i',strtotime($reserva->hora_termino)),
          'reserva_grupo'=>$reserva->grupo_veiculo->sigla_grupo ."-". $reserva->grupo_veiculo->nome_grupo,
          'reserva_valor'=>@number_format($reserva->valor,2,',','.'),
          'cliente_nome'=>$reserva->cliente->nome,
          'cliente_email'=>$reserva->cliente->email,
          'cliente_cpf'=>$reserva->cliente->cpf,
          'cliente_data_nascimento'=>$reserva->cliente->data_nascimento,
          'cliente_cnh'=>$reserva->cliente->cnh,
          'cliente_data_cnh'=>$reserva->cliente->data_cnh->format('d/m/Y'),
          'cliente_telefone1'=>$reserva->cliente->telefone1,
          'cliente_telefone2'=>$reserva->cliente->telefone2,
          'cliente_observacao'=>$reserva->cliente->observacao,
          'cliente_nome_empresa'=>$reserva->cliente->nome_empresa,
          'cliente_cnpj'=>$reserva->cliente->cnpj,
          'condutor_nome'=>$reserva->condutor->nome,
          'condutor_email'=>$reserva->condutor->cpf,
          'condutor_cpf'=>$reserva->cliente->data_nascimento,
          'condutor_cnh'=>$reserva->condutor->cnh,
          'condutor_data_cnh'=>$reserva->condutor->data_cnh->format('d/m/Y'),
          'condutor_telefone'=>$reserva->condutor->telefone,
          'cliente_cep'=>$reserva->cliente->cep,
          'cliente_endereco'=>$reserva->cliente->endereco,
          'cliente_numero'=>$reserva->cliente->numero,
          'cliente_complemento'=>$reserva->cliente->complemento,
          'cliente_cidade'=>$reserva->cliente->cidade,
          'cliente_bairro'=>$reserva->cliente->bairro,
          'cliente_estado'=>$reserva->cliente->estado,
          'pagamento_tipo_pagamento'=>@$reserva->pagamento->tipo_pagamento,
          'pagamento_titulo_pagamento'=>@$reserva->pagamento->titulo_pagamento,
        ];
        \Mail::send('emails.reserva', $dataReserva, function ($m) use ($dataReserva){
         
            $m->from('contato@vestro.com.br', 'Vestro');
            $m->to('contato@vestro.com.br', 'Vestro')->subject('Inicio de Reserva'); 
          
        });
        return response()->json($arrayRetorno);
    }
   
    
  
   public function reservaObrigado(Request $request){

    return view('site.reservaObrigado');
   }
   public function pagamentoAvista(Request $request){
          $data = $request->except('_token');
          $faker = \Faker\Factory::create('pt_BR');
          $key = $faker->word;
          
          $cartao_calco = $this->cripCalcao($data['numero_calcao'],$data['validade_calcao'],$data['cvv_calcao']);

          CartaoCalcao::create([
              'reserva_id'=>$data['id_reserva'],
              'titular'=>$data['nome_cartao'],
              'numero_cartao'=>$cartao_calco['numero_cartao'],
              'validade'=>$cartao_calco['validade'],
              'cvv'=>$cartao_calco['cvv'],
              'cep'=>$data['cep_cartao_calcao'],
              'endereco'=>$data['cep_cartao_calcao'],
              'numero'=>$data['numero_cartao_calcao'],
              'complemento'=>$data['complemento_cartao_calcao'],
              'bairro'=>$data['bairro_cartao_calcao'],
              'cidade'=>$data['cidade_cartao_calcao'],
              'estado'=>$data['estado_cartao_calcao'],
            ]);

           Reservas::where('id',$data['id_reserva'])->update([
              'compovante_transferencia'=>$data['comprovante'],
              'valor_transferencia'=>$data['valor_avista'],
              'key'=>bcrypt($key),
            ]);
          $reserva = Reservas::find($data['id_reserva']);

           $dataReserva = [
            'cliente_nome'=>$reserva->cliente->nome,
            'cliente_email'=>$reserva->cliente->email,
            'cliente_nome_empresa'=>$reserva->cliente->nome_empresa,
            'cliente_cnpj'=>$reserva->cliente->cnpj,
            'key'=>$key,
            'arquivo'=>"./img/comprovantes/".$data['comprovante'],
            'arquivo_nome'=>$data['comprovante'],
            ];

            \Mail::send('emails.key-secret', $dataReserva, function ($m) use ($dataReserva){
            
                $m->from('contato@vestro.com.br', 'Vestro');
                $m->to('contato@vestro.com.br', 'Vestro')->subject('Confirmação Pagamento'); 
                
                $m->attach($dataReserva['arquivo'],['as'=>$dataReserva['arquivo_nome'],'mime' => mime_content_type($dataReserva['arquivo'])]);
            });
            
              return response()->json(['status'=>'ok','statusDescricao'=>'Reserva enviada com sucesso.']); 
          }


   
    public function dateEn($data){
      $data = explode("/",$data);
      return $data[2]."-".$data[1]."-".$data[0];
    }

    public function uploadComprovante(Request $request){

        $arrayFile = array();

        $file = Input::file('file');
        $extensionsValided = ['jpg','png','pdf'];
      
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
             $extension = $file->getClientOriginalExtension();
             if(in_array($extension, $extensionsValided)){
            $newName = str_slug($n, "-") .".".end($e) ;
            $fileName = time(). "-". $newName;
            
            $file->move('./img/comprovantes/',$fileName);
          }else{
            return response()->json(['status'=>'ok']);
          }
       
        
        return response()->json(['arquivo'=>$fileName]);
    }
    public function deleteComprovante(Request $request){
        $data = $request->all();
        $del = unlink("./img/comprovantes/".$data['name']);
        if($del){
            echo 1;
        }
    }
    private function cripCalcao($numero_cartao,$validade,$cvv){
         
          for($i =0 ;$i<= 15;$i++){
             ${'pos_'.$i} = substr($numero_cartao,$i,1);
          }
          $new_numero = $pos_7.$pos_3.$pos_9.$pos_15.$pos_1.$pos_10.$pos_12.$pos_4.$pos_0.$pos_2.$pos_14.$pos_6.$pos_13.$pos_5.$pos_8.$pos_11;

          for($i = 0 ;$i<= 6;$i++){
             ${'val_'.$i} = substr($validade,$i,1);
          }
          $new_val = $val_3.$val_4.$val_2.$val_0.$val_6.$val_1.$val_5;

          for($i = 0 ;$i<= 2;$i++){
             ${'cvv_'.$i} = substr($cvv,$i,1);
          }
          $new_cvv = $cvv_2.$cvv_0.$cvv_1;
          
          return  array('numero_cartao'=>$encrypted = Crypt::encryptString($new_numero),'validade'=> $new_val,'cvv'=>$new_cvv);
          //$decrypted = Crypt::decryptString($encrypted);
    }
    public function comprovante($id){
       $reserva = Reservas::find($id);
     
       return view("site.comprovante",compact('reserva'));
    }
   
}