<?php

namespace RW940cms\Http\Controllers\Painel;

use Illuminate\Http\Request;
use RW940cms\Repositories\ConfiguracoesRepository;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Repositories\UserRepository;
use RW940cms\Http\Requests\UsersRequest;
use RW940cms\Criteria\StatusCriteria;
use Mail;
class UserController extends Controller
{
    public function __construct(
        ConfiguracoesRepository $configuracoesRepository,
        UserRepository $userRepository){
        $this->userRepository = $userRepository;
         $this->configuracoesRepository = $configuracoesRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = $this->userRepository->paginate();
       
        return view('painel.users.lista',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('painel.users.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $data = $request->all();
        $data['senha'] = $data['password'];
        $data['password'] = bcrypt($data['password']);
        $lastInsertedId = $this->userRepository->create($data)->id;

        $email =  $this->configuracoesRepository->findWhere(['parametro'=>'email'])->first()->value;
        if(!$email){
            $email = "nao-responder@vestro.com.br";
        }
        $data['sendMail'] = strtolower($email);
        $data['link'] = route('admin.index');
        $enviado = \Mail::send('emails.user-new', $data, function($message) use ($data) {
            $message->from($data['sendMail'], 'Vestro - Locação de Veículos');
            $message->to($data['email'], $data['name'])->subject('Novo Usuário | '.  'Vestro - Locação de Veículos');
        });
        


       return redirect()->route('admin.users.lista');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $usuario = $this->userRepository->find($id);
         return view('painel.users.edit',compact('usuario'));
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
        $data = $request->all();
        if(!empty($data['password'])){
           $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }
        $usuario = $this->userRepository->update($data,$id);
         return redirect()->route('admin.users.lista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       
       
        $this->userRepository->delete($id);
      
    }
}
