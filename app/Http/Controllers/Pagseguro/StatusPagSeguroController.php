<?php
namespace RW940cms\Http\Controllers\Pagseguro;

use Illuminate\Http\Request;



use RW940cms\Repositories\StatusPagamentoRepository;
use RW940cms\Services\ErroPagseuroService;
use RW940cms\Models\Menu;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use Canducci\ZipCode\Facades\ZipCode;
use Input;
use DateTime;
use DB;
use Mail;
use Hash;
class StatusPagseguroController extends Controller{
  
     public function __construct(
        
        StatusPagamentoRepository $statusPagamentoRepository,
        ErroPagseuroService $ErroPagseuroService){
        
        $this->statusPagamentoRepository = $statusPagamentoRepository;
        $this->ErroPagseuroService = $ErroPagseuroService;
       
    }
   
   

     public function status(Request $request){
     	
     
     	if($request->input('notificationType') && $request->input('notificationType') == 'transaction'){
			 //Todo resto do código iremos inserir aqui.
			 // publicado
     	
     		
			 $email = env('PAGSEGURO_EMAIL');
			 $token = env('PAGSEGURO_TOKEN');
			 $url = env('PAGSEGURO_URL_NOTIFICACAO') . $_POST['notificationCode'] . '?email=' . $email . '&token=' . $token;

			  $curl = curl_init($url);
			  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			  $transaction= curl_exec($curl);
			  curl_close($curl);

			if($transaction == 'Unauthorized'){
			  //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
			  exit;//Mantenha essa linha
			}

			$transaction = simplexml_load_string($transaction);

		    $transaction->status;
		    $transaction->reference;

		    $sender = json_decode(json_encode($transaction->sender),TRUE);
		 
		    $status 			= $transaction->status;
		    $tk 				= str_replace("#", '', $transaction->reference);
		    $pedido = $this->pedidosRepository->update(['status_pagamento'=>$status], $tk);
		   	if($status == "3"){	   		
		   		$data['sendMail'] = $sender['email'];
		   		$data['sendNome'] = $sender['name'];
      			$data['convites'] = $pedido->convites->all();
      			$data['status'] = $pedido->status->titulo_pagamento;
      			$data['id'] = $pedido->id;


		       Mail::send('emails.comprovante', $data, function ($m) use ($data){
		            $m->from(env('MAIL_USERNAME'), env('SITE_NAME'));
		            $m->to($data['sendMail'], $data['sendNome'])->subject('Convites - Churrasco dia dos Pais - Fim de Tarde'); 
		            $m->bcc('rafaw940@yahoo.com.br', 'Rafael')->subject('Convites - Churrasco dia dos Pais - Fim de Tarde'); 
		        });
		   	}
		  
		  
		  

		    
		   
		   
		}
     }
    
    public function EnviarComprovante($id){
    		$email = env('PAGSEGURO_EMAIL');
			$token = env('PAGSEGURO_TOKEN');

			 Mail::send('emails.comprovante', $data, function ($m) use ($data){
		            $m->from(env('MAIL_USERNAME'), env('SITE_NAME'));
		           
		            $m->to('rafaw940@yahoo.com.br', 'Rafael')->subject('Convites - Churrasco dia dos Pais - Fim de Tarde'); 
		        });
			  $pedido = $this->pedidosRepository->find($id);
			 		
			 $url = env('PAGSEGURO_URL_TRANSACTIONS') ."/". $pedido->cod_pagseguro . '?email=' . $email . '&token=' . $token;

			  $curl = curl_init($url);
			  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			  $transaction= curl_exec($curl);
			  curl_close($curl);

			if($transaction == 'Unauthorized'){
			  //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
			  exit;//Mantenha essa linha
			}

			$transaction = simplexml_load_string($transaction);

			if(!$transaction->transactions->transaction){
				exit;
			}
			$transaction = $transaction->transactions->transaction;
			
		    $transaction->status;
		    $transaction->reference;


		    $status 			= $transaction->status;
		    $tk 				= $transaction->reference;
		  
		  
		  	$tk 				= str_replace("#", '', $transaction->reference);
		    $pedido = $this->pedidosRepository->update(['status_pagamento'=>$status], $tk);
		   	if($status == "3" || $status == "3"  ){	   		
		   		$data['sendMail'] = 'rafaw940@yahoo.com.br';
		   		//$data['sendMail'] = $sender['email'];
		   		$data['sendNome'] = 'rafael';
		   		//$data['sendNome'] = $sender['name'];

      			$data['convites'] = $pedido->convites->all();
      			$data['status'] = $pedido->status->titulo_pagamento;
      			$data['id'] = $pedido->id;


		       Mail::send('emails.comprovante', $data, function ($m) use ($data){
		            $m->from(env('MAIL_USERNAME'), env('SITE_NAME'));
		            $m->to($data['sendMail'], $data['sendNome'])->subject('Convites - Churrasco dia dos Pais - Fim de Tarde'); 
		            $m->bcc('rafaw940@yahoo.com.br', 'Rafael')->subject('Convites - Churrasco dia dos Pais - Fim de Tarde'); 
		        });
		   	}
		   

    }
    
}
