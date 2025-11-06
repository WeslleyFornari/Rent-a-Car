<?php

namespace RW940cms\Http\Controllers\Rede;

use Illuminate\Http\Request;
use RW940cms\Http\Controllers\Controller;
use Rede;
use Illuminate\Support\Facades\DB;
use RW940cms\Http\Requests;
use RW940cms\Repositories\StatusPagamentoRepository;
use RW940cms\Services\ErroRedeService;
use Illuminate\Http\Response;
use RW940cms\Models\Reservas;
use RW940cms\Models\PagamentosReservas;
use RW940cms\Models\CartaoCalcao;
use RW940cms;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;


use Ixudra\Curl\Facades\Curl;


class RedeController extends Controller
{
    private $PV = '083007601';
    private $TOKEN = '8f3b31162e67499b954d6884ea873980';
     public function __construct(

       

       

      

        ErroRedeService $ErroRedeService){

       

      

        $this->ErroRedeService = $ErroRedeService;


    }
    public function efeturaPagamento(Request $request){
    	  $dados = $request->all();
    	    $reserva = Reservas::find( $dados['id_reserva']);
          $status = 0;

   			$validade = explode("/",$dados['validade']);
    	  
        $reference = 'RSV-'.$dados['id_reserva'].substr(time(),-3);
       //dd(base64_encode($this->PV.':'.$this->TOKEN));
       
      $response = Curl::to('https://api.userede.com.br/v1/transactions')
                       ->withHeader('Authorization: BASIC '. base64_encode($this->PV.':'.$this->TOKEN))
                       ->withData( array( 
                          "capture"=> false,
                          "reference"=> $reference,
                          "amount"=> str_replace(".", "", $dados['valor_total']),
                          "cardNumber"=> $dados['numero'],
                          "expirationMonth"=> $validade[0],
                          "expirationYear"=> $validade[1],
                          "cardholderName"=> $dados['nome_cartao'],
                          "securityCode"=>  $dados['cvv'],
                        ))
                       ->asJson()
                       ->post();
                     
        $retornoDescricao = $this->ErroRedeService->consultaErro($response->returnCode,$response->returnMessage);               
        if($response->returnCode == "00"){
        

           Curl::to($response->links[2]->href)
                       ->withHeader('Authorization: BASIC '. base64_encode($this->PV.':'.$this->TOKEN))
                       ->withData( array( 
                          "amount"=> $dados['valor_total'],
                        ))
                       ->asJson()
                       ->put();

                        $faker = \Faker\Factory::create('pt_BR');
        $key = $faker->word;
          
        $cartao_calco = $this->cripCalcao($dados['numero'],$dados['validade'],$dados['cvv']);

        CartaoCalcao::create([
              'reserva_id'=>$dados['id_reserva'],
              'titular'=>$dados['nome_cartao'],
              'numero_cartao'=>$cartao_calco['numero_cartao'],
              'validade'=>$cartao_calco['validade'],
              'cvv'=>$cartao_calco['cvv'],
              'cep'=>$dados['cep_cartao'],
              'endereco'=>$dados['endereco_cartao'],
              'numero'=>$dados['numero_cartao'],
              'complemento'=>$dados['complemento_cartao'],
              'bairro'=>$dados['bairro_cartao'],
              'cidade'=>$dados['cidade_cartao'],
              'estado'=>$dados['estado_cartao'],
        ]);
        Reservas::where('id',$dados['id_reserva'])->update([
            'key'=>bcrypt($key),
        ]);
        $dataReserva = [
            'cliente_nome'=>$reserva->cliente->nome,
            'cliente_email'=>$reserva->cliente->email,
            'cliente_nome_empresa'=>$reserva->cliente->nome_empresa,
            'cliente_cnpj'=>$reserva->cliente->cnpj,
            'key'=>$key,
        ];

            \Mail::send('emails.key-secret', $dataReserva, function ($m) use ($dataReserva){
                $m->from('contato@vestro.com.br', 'Vestro');
                $m->to('contato@vestro.com.br', 'Vestro')->subject('Confirmação Pagamento'); 
                $m->bcc('rafaw940@yahoo.com.br', 'Rafael')->subject('Confirmação Pagamento'); 
            });
          
             $retornoCartao = array(

                'code' => '',

                'date' => '',

                'status'=>'ok',

                'statusCode' => $status,

                'statusDescricao' =>$retornoDescricao

            );
        

        }else{
$status = "erro";
          

           $retornoCartao = array(

                'code' => '',

                'date' => '',

                'status'=>'',

                'statusCode' => $status,

                'statusDescricao' =>$retornoDescricao

            );
        }

       

        return response()->json($retornoCartao);
    }
    public function efeturaPagamentoOLD(Request $request){
        $dados = $request->all();
          $reserva = Reservas::find( $dados['id_reserva']);
          $status = 0;

        $validade = explode("/",$dados['validade']);
        $store = new \Rede\Store('10004423', '143afb3b2db84b86aa39597fbb89e101', \Rede\Environment::sandbox());
        // Transação que será autorizada
        $reference = 'RSV-'.$dados['id_reserva'].substr(time(),-3);
        
        $transaction = (new \Rede\Transaction($dados['valor_total'], $reference))->creditCard(
            $dados['numero'],
            $dados['cvv'],
            $validade[0],
            $validade[1],
            $dados['nome_cartao']
        );

        $transaction->setInstallments($dados['parcelasCartao']);
        // Autoriza a transação

        $transaction = (new \Rede\eRede($store))->create($transaction);

        $retornoDescricao = $this->ErroRedeService->consultaErro($transaction->getReturnCode());
        if ($transaction->getReturnCode() == '00') {
          // printf("Transação autorizada com sucesso; tid=%s\n", $transaction->getTid());
          $status = 3;
        }

        $faker = \Faker\Factory::create('pt_BR');
        $key = $faker->word;
          
        $cartao_calco = $this->cripCalcao($dados['numero'],$dados['validade'],$dados['cvv']);

        CartaoCalcao::create([
              'reserva_id'=>$dados['id_reserva'],
              'titular'=>$dados['nome_cartao'],
              'numero_cartao'=>$cartao_calco['numero_cartao'],
              'validade'=>$cartao_calco['validade'],
              'cvv'=>$cartao_calco['cvv'],
              'cep'=>$dados['cep_cartao'],
              'endereco'=>$dados['endereco_cartao'],
              'numero'=>$dados['numero_cartao'],
              'complemento'=>$dados['complemento_cartao'],
              'bairro'=>$dados['bairro_cartao'],
              'cidade'=>$dados['cidade_cartao'],
              'estado'=>$dados['estado_cartao'],
        ]);
        Reservas::where('id',$dados['id_reserva'])->update([
            'key'=>bcrypt($key),
        ]);
        $dataReserva = [
            'cliente_nome'=>$reserva->cliente->nome,
            'cliente_email'=>$reserva->cliente->email,
            'cliente_nome_empresa'=>$reserva->cliente->nome_empresa,
            'cliente_cnpj'=>$reserva->cliente->cnpj,
            'key'=>$key,
        ];

            \Mail::send('emails.key-secret', $dataReserva, function ($m) use ($dataReserva){
                $m->from('contato@vestro.com.br', 'Vestro');
                $m->to('contato@vestro.com.br', 'Vestro')->subject('Confirmação Pagamento'); 
                $m->bcc('rafaw940@yahoo.com.br', 'Rafael')->subject('Confirmação Pagamento'); 
            });
          
             $retornoCartao = array(

                'code' => '',

                'date' => '',

                'status'=>'',

                'statusCode' => $status,

                'statusDescricao' =>$retornoDescricao

            );
        

        return response()->json($retornoCartao);
    }
       public function calcParcelaJuros(Request $request){
       	$dados = $request->all();
       	$valor_total = $dados['valor'];
        $string = [];
       for ($i=1; $i <= 12; $i++) { 
       	
       
        if($i >3){
          $juros = 2.99;
        }else{
          $juros = 0;
        }

        if($juros==0){
         
         $string[$i] = number_format($valor_total/$i, 2, ",", ".");
        }else{
          
         	$X = $juros/100.00;
           $valor_parcela = $valor_total*$X*pow((1+$X),$i)/(pow((1+$X),$i)-1);

         	$string[$i] = number_format($valor_parcela, 2, ",", ".");
         }

      
       }
        return response()->json($string);
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
}
