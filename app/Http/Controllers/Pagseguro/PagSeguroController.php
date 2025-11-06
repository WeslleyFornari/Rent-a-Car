<?php
namespace RW940cms\Http\Controllers\Pagseguro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Repositories\StatusPagamentoRepository;
use RW940cms\Services\ErroPagseuroService;
use Illuminate\Http\Response;
use RW940cms\Models\Reservas;
use RW940cms\Models\PagamentosReservas;
use RW940cms\Models\CartaoCalcao;
use RW940cms;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;


class PagSeguroController extends Controller{

    private $PAGSEGURO_SANDBOX=1;
    private $PAGSEGURO_URL_SESSION = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions";
    private $PAGSEGURO_URL_TRANSACTIONS="https://ws.sandbox.pagseguro.uol.com.br/v2/transactions";
    private $PAGSEGURO_URL_NOTIFICACAO="https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/";
    private $PAGSEGURO_URL_CHECKOUT="https://ws.sandbox.pagseguro.uol.com.br/v2/checkout";
    private $PAGSEGURO_URL_PAYMENT="https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html";
    private $PAGSEGURO_EMAIL="rafaw940@yahoo.com.br";
    private $PAGSEGURO_TOKEN="3BD06286D6304CB9A10E257F60449B93";
    private $PAGSEGURO_NOTIFICATION="";

     /*private $PAGSEGURO_URL_SESSION="https://ws.pagseguro.uol.com.br/v2/sessions";
     private $PAGSEGURO_URL_TRANSACTIONS="https://ws.pagseguro.uol.com.br/v2/transactions";
     private $PAGSEGURO_URL_NOTIFICACAO="https://ws.pagseguro.uol.com.br/v2/transactions/notifications/";
     private $PAGSEGURO_URL_CHECKOUT="https://ws.pagseguro.uol.com.br/v2/checkout";
     private $PAGSEGURO_URL_PAYMENT="https://pagseguro.uol.com.br/v2/checkout/payment.html";
     private $PAGSEGURO_EMAIL="fimdetarde.eventos@bol.com.br";
     private $PAGSEGURO_TOKEN="015317B77A18489CB790A86C1CD6A452";
     private $PAGSEGURO_NOTIFICATION="";*/

    public function __construct(

       

       

        StatusPagamentoRepository $statusPagamentoRepository,

        ErroPagseuroService $ErroPagseuroService){

       

        $this->statusPagamentoRepository = $statusPagamentoRepository;

        $this->ErroPagseuroService = $ErroPagseuroService;


    }
     public function iniciaPagamentoAction() { //gera o código de sessão obrigatório para gerar identificador (hash)

    //$id = (string) $this->params ()->fromRoute( 'confirma', null );

    //$data['email'] = $_ENV['PAGSEGURO_EMAIL'];

    $data['token'] = $this->PAGSEGURO_TOKEN;

    //$_SERVER['REMOTE_ADDR']
    $emailPagseguro = $this->PAGSEGURO_EMAIL;

    $data = http_build_query($data);
    $url =  $this->PAGSEGURO_URL_SESSION;
    $headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1');

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    

    curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl,CURLOPT_HTTPHEADER, $headers );
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true );
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    //curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $xml = curl_exec($curl);
    curl_close($curl);

    $xml= simplexml_load_string($xml);
    $idSessao = $xml->id;
    return $idSessao;
  }

    public function iniciaPagamentoAction_Old() { //gera o código de sessão obrigatório para gerar identificador (hash)
 //$id = (string) $this->params ()->fromRoute( 'confirma', null );
    //$data['email'] = $_ENV['PAGSEGURO_EMAIL'];
    $data['token'] =$this->PAGSEGURO_TOKEN;
    //$_SERVER['REMOTE_ADDR']
    $emailPagseguro = $this->PAGSEGURO_EMAIL;


    $data = http_build_query($data);

    //$url = 'PAGSEGURO_URL_SESSION=';



   
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions/?email=rafaw940%40yahoo.com.br&token=3BD06286D6304CB9A10E257F60449B93",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
    "email: rafaw940@yahoo.com.br",
    "postman-token: cd6c8f37-d25e-8d80-3630-e4f1588ec3cd",
    "token: B1EAD027ABAB940114634FB77D32E501"
  ),
));

$response = curl_exec($curl);

$xml= simplexml_load_string($response);

$err = curl_error($curl);

    curl_close($curl);

        if ($err) {
          return "cURL Error #:" . $err;
        } else {
          return $xml->id;
        }
  

  }

  public function efetuaPagamentoBoleto(Request $request) {

        $dados = $request->all();


        $data['token'] = $this->PAGSEGURO_TOKEN;

        $data['receiverEmail'] = $this->PAGSEGURO_EMAIL;



        $data['paymentMode'] = 'default';

        $data['senderHash'] = $dados['hash']; //gerado via javascript

        $data['paymentMethod'] = 'boleto';

       

        $data['senderName'] = utf8_decode($dados['nome_cartao']);

        $tel_pagador = preg_replace("([^0-9])","",$dados['telefone_pagador']);

        

        $data['senderAreaCode'] = substr($tel_pagador,0,2);

        $data['senderPhone'] = substr($tel_pagador,2);

        $data['senderEmail'] = $dados['email_pagador'];

       

        $doc_pagador = preg_replace("([^0-9])","",$dados['doc_pagador']);



        $data['senderCPF'] = $doc_pagador;

        

        $data['currency'] = 'BRL';

       

        

  

        

      

  



        //dd($data);

         $data['shippingAddressRequired'] = 'false';

         $data['reference'] = "#".$pedido->id;

                //$_SERVER['REMOTE_ADDR']

        $emailPagseguro = $this->PAGSEGURO_EMAIL;



        $data = http_build_query($data);



        $url =  $this->PAGSEGURO_URL_TRANSACTIONS;





        $curl = curl_init();



        $headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1');



        curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);

        curl_setopt($curl, CURLOPT_POST, true);

        curl_setopt( $curl,CURLOPT_HTTPHEADER, $headers );

        curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        //curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        curl_setopt($curl, CURLOPT_HEADER, false);

        $xml = curl_exec($curl);



        curl_close($curl);



        $xml= simplexml_load_string($xml);





        //echo $xml -> paymentLink;

        $boletoLink =  $xml->paymentLink;

        $code =  json_decode(json_encode($xml->code));

        $date =  $xml->date;

        $statusCode =  $xml->status;

        //aqui eu ja trato o xml e pego o dado que eu quero, vc pode dar um var_dump no $xml e ver qual dado quer

        $statusDescricao = $this->statusPagamentoRepository->findWhere(['cod_pagseguro'=> $statusCode])->first();

         if($xml->error){

             $erroDescricao = $this->ErroPagseuroService->consultaErro($xml->error->code);

             $retornoBoleto = array(

                

                'statusCode' => 'erro',

                'statusDescricao' => $erroDescricao,

                'code' => $code

            );

         }else{



        $retornoBoleto = array(

                'paymentLink' => $boletoLink,

                'date' => $date,

                'code' => $code,

                'status'=>$statusCode,

                'statusCode' => $statusDescricao->cod_pagseguro,

                'statusDescricao' => $statusDescricao->descricao_pagamento

        );

        }

        $dados['retorno_xml'] = $retornoBoleto;



        foreach ($code as $key => $value) {

            $code = $value;

        }

         

       $this->pedidosRepository->update(['status_pagamento'=>$statusCode,'cod_pagseguro'=>$code],$pedido->id);



        return $retornoBoleto;



    }



    public function efetuaPagamentoCartao(Request $request) {

        $dados = $request->all();


        $reserva = Reservas::find( $dados['id_reserva']);

        $data['token'] = $this->PAGSEGURO_TOKEN;

        $data['receiverEmail'] = $this->PAGSEGURO_EMAIL;

        $data['paymentMode'] = 'default';

        $data['senderHash'] = $dados['hash']; //gerado via javascript

        $data['creditCardToken'] = $dados['tokenPagamentoCartao']; //gerado via javascript

        $data['paymentMethod'] = 'creditCard';

        $id_reserva = $dados['id_reserva'];

        $data['senderName'] = $dados['nome_cartao'];
        $tel_pagador = preg_replace("([^0-9])","",$dados['telefone_pagador']);
        $data['senderAreaCode'] = substr($tel_pagador,0,2);
        $data['senderPhone'] = substr($tel_pagador,2);
        if($this->PAGSEGURO_SANDBOX == 1){
            $data['senderEmail'] = explode("@",$dados['email_pagador'])[0] . '@sandbox.pagseguro.com.br';
        }else{

        }
        $doc_pagador = preg_replace("([^0-9])","",$dados['cpf_cartao']);
        $data['senderCPF'] = $doc_pagador;
        $data['currency'] = 'BRL';

        

        $count = 1;


        $data['reference'] = "#".$id_reserva;
        $emailPagseguro = $this->PAGSEGURO_EMAIL;

        $data['installmentQuantity'] = $dados['parcelasCartao'];
        $data['installmentValue'] = $dados['valorParcelas']; //valor da parcela
        $data['creditCardHolderName'] = $dados['nome_cartao']; //nome do titular
        $data['creditCardHolderCPF'] =  preg_replace("([^0-9])","",$dados['cpf_cartao']);
        $data['creditCardHolderBirthDate'] = $dados['data_nascimento_pagador'];
        $data['creditCardHolderAreaCode'] = substr($tel_pagador,0,2);
        $data['creditCardHolderPhone'] = substr($tel_pagador,2);
        $data['shippingAddressRequired'] = 'false';
        $data['billingAddressStreet'] = $dados['endereco_cartao'];
        $data['billingAddressNumber'] = $dados['numero_cartao'];
        $data['billingAddressDistrict'] = $dados['bairro_cartao'];
        $data['billingAddressPostalCode'] = $dados['cep_cartao'];

        $data['billingAddressCity'] = $dados['cidade_cartao'];

        $data['billingAddressState'] = $dados['estado_cartao'];

        $data['billingAddressCountry'] = 'Brasil';



        $data['itemId1'] = $reserva->id;
        $data['itemQuantity1'] = 1;
        $data['itemDescription1'] = utf8_decode("Grupo " .$reserva->grupo_veiculo->sigla_grupo . " - ".$reserva->grupo_veiculo->nome_grupo);
        $data['itemAmount1'] = $reserva->valor;



        $faker = \Faker\Factory::create('pt_BR');
        $key = $faker->word;
          
        $cartao_calco = $this->cripCalcao($data['numero'],$data['validade'],$data['cvv']);

        CartaoCalcao::create([
              'reserva_id'=>$dados['id_reserva'],
              'titular'=>$data['nome_cartao'],
              'numero_cartao'=>$cartao_calco['numero_cartao'],
              'validade'=>$cartao_calco['validade'],
              'cvv'=>$cartao_calco['cvv'],
              'cep'=>$data['cep_cartao'],
              'endereco'=>$data['endereco_cartao'],
              'numero'=>$data['numero_cartao'],
              'complemento'=>$data['complemento_cartao'],
              'bairro'=>$data['bairro_cartao'],
              'cidade'=>$data['cidade_cartao'],
              'estado'=>$data['estado_cartao'],
        ]);
        Reservas::where('id',$data['id_reserva'])->update([
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
        $data = http_build_query($data);

        $url = $this->PAGSEGURO_URL_TRANSACTIONS;





        $curl = curl_init();



        $headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1');



        curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);

        curl_setopt($curl, CURLOPT_POST, true);

        curl_setopt( $curl,CURLOPT_HTTPHEADER, $headers );

        curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        curl_setopt($curl, CURLOPT_HEADER, false);

        $xml = curl_exec($curl);



        curl_close($curl);



        $xml = simplexml_load_string($xml);


             
               
                 
             


        if($xml->error){

            
                foreach ($xml->error as $key => $value) {
                       
                             $retornoCartao[] = array(
                                'statusCode' => 'erro',

                                'statusDescricao' => $this->ErroPagseuroService->consultaErro($value->code),
                            );
                }

      

        }else{





        $code =  $xml->code;

        $date =  $xml->date;



        $code =  json_decode(json_encode($xml->code));

        $statusCode =  $xml->status;



        $statusDescricao = $this->statusPagamentoRepository->findWhere(['cod_pagseguro'=> $statusCode])->first();

        //aqui eu ja trato o xml e pego o dado que eu quero, vc pode dar um var_dump no $xml e ver qual dado quer



        $retornoCartao = array(

                'code' => $code,

                'date' => $date,

                'status'=>$statusCode,

                'statusCode' => $statusDescricao->cod_pagseguro,

                'statusDescricao' => $statusDescricao->descricao_pagamento

        );

       

        foreach ($code as $key => $value) {

            $code = $value;

        }

        $dados['retorno_xml'] = $retornoCartao;

                    Reservas::where('id',$id_reserva)->update(['status'=>$statusCode]);
            $dataLiberacao = new Carbon($xml->escrowEndDate);
                  
            PagamentosReservas::create([
                'id_reserva'=>$id_reserva,
                'tipo_pagamento'=>'cartao',
                'token_pagseguro'=>$code,
                'status_pagamento'=>$statusCode,
                'valor_liquido'=>$xml->netAmount,
                'taxa_pagseguro'=>$xml->feeAmount,
                'data_valor_disponivel'=>$dataLiberacao->format('d/m/Y')
              
            ]);

 }
        return response()->json($retornoCartao);



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
?>