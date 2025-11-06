<?php

namespace RW940cms\Http\Controllers\Auth;

use RW940cms\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use RW940cms\Repositories\MenuRepository;
class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
   

    public function __construct( MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->middleware('guest');
    } 
    public function getEmail()
    {
        $menu = $this->menuRepository->menu();
        $menuRodape = $this->menuRepository->menuRodape();
        return view('auth.password',compact('menu','menuRodape'));
    }
}
