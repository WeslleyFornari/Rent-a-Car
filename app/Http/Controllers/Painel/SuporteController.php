<?php
namespace RW940cms\Http\Controllers\Painel;
use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Models\Configuracoes;
use \Input as Input;
use Mail;
class SuporteController extends Controller
{
   public function __construct(
     
      
    ){
       
       
    }
    public function index(){
        return view("painel.suporte.index");
    }

    public function enviarEmail(Request $request){
        $data = $request->all();
        $email =  Configuracoes::where(['parametro'=>'e-mail-contato'])->first()->value;
        $data['sendMail'] = strtolower($email);
        
        $enviado = \Mail::send('emails.suporte', $data, function($message) use ($data) {
          
            $message->from($data['sendMail'], $data['nome']);
            $message->to('rafaw940@yahoo.com.br', 'Rafael William')->subject('Suporte | '.$_ENV['SITE_NAME']);
        });
        if($enviado){
            return response()->json(['status'=>'enviado']);
        }else{
             return response()->json(['status'=>'erro']);
        }
    }

}
?>