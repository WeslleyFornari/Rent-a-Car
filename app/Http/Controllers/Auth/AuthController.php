<?php

namespace RW940cms\Http\Controllers\Auth;
use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\User;
use Validator;
use RW940cms\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectPath = 'minha-conta';
    protected $loginPath = 'cadastro';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
       

    }
    public function login(Request $request)
       {
      
          //Validate inputs

    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|min:3'
    ]);

    if($validator->fails()){
        return redirect($this->loginPath())
            ->withInput($request->all())
            ->withErrors($validator);
    }

    //Input is valid, now check credentials

    $credentials = $this->getCredentials($request);

    if (Auth::attempt($credentials, $request->has('remember'))) {
        return redirect()->intended($this->redirectPath());
    }

    //Username and password are incorrect, redirect with error message

    return redirect($this->loginPath())
        ->withInput($request->all())
        ->withErrors('Login ou Senha Inválidos');

    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
}
