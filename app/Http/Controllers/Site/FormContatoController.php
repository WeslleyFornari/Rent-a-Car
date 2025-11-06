<?php

namespace RW940cms\Http\Controllers\Site;

use Illuminate\Http\Request;
use RW940cms\Repositories\FormContatoRepository;
use RW940cms\Repositories\ConfiguracoesRepository;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Mail;
use RW940cms\Models\GruposVeiculos;

class FormContatoController extends Controller
{
   
    public function __construct(
        FormContatoRepository $formContatoRepository,
        ConfiguracoesRepository $configuracoesRepository
    ) {
        $this->formContatoRepository = $formContatoRepository;
        $this->configuracoesRepository = $configuracoesRepository;
    }
    public function Email(Request $request)
    {

        $data = $request->all();

        if ($data['g-recaptcha-response'] == "") {
            return "robot-detected";
        }


        $this->formContatoRepository->create($data);
        $email =  $this->configuracoesRepository->findWhere(['parametro'=>'email'])->first()->value;
        $data['sendMail'] = strtolower($email);

              
        Mail::send('emails.contato', $data, function ($m) use ($data) {
            $m->from('nao-responder@vestro.com.br', 'Vestro Locadora');
            $m->to($data['sendMail'], env('SITE_NAME'))->subject('Formulário de Contato');
            
        });
        
       //return redirect()->route('detalhes-imoveis', [$data['referencia']]);
        return "enviado";
    }
    public function Mensal(Request $request)
    {
        $data = $request->all();
        
        $grupo = GruposVeiculos::find($data['veiculo']);

        $email =  $this->configuracoesRepository->findWhere(['parametro'=>'email'])->first()->value;
        $data['sendMail'] = strtolower($email);
        $data['grupo']= $grupo->nome_grupo;

    
        Mail::send('emails.mensal', $data, function ($m) use ($data) {
            $m->from('send@dvelopers.com.br', 'Vestro Locadora');
            //$m->to($data['sendMail'], 'Vestro Locadora')->subject('Formulário - Locação Mensal');
            $m->to($data['sendMail'], 'Vestro Locadora')->subject('Formulário - Locação Mensal');
          
        });
        
       //return redirect()->route('detalhes-imoveis', [$data['referencia']]);
        return "enviado";
    }
}
