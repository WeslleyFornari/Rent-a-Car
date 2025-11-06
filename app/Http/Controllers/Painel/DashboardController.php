<?php

namespace RW940cms\Http\Controllers\Painel;

use Illuminate\Http\Request;
use DB;
use RW940cms\Models\Menu;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Repositories\UserRepository;
use RW940cms\Repositories\CadastroAssociadoRepository;
use RW940cms\Models\Reservas;
use RW940cms\Models\Veiculos;
use Carbon\Carbon;
class DashboardController extends Controller
{
 
    public function __construct( 
        UserRepository $userRepository,
        CadastroAssociadoRepository $cadastroAssociadoRepository
        ){
        $this->userRepository = $userRepository;
        $this->cadastroAssociadoRepository = $cadastroAssociadoRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
            

        return view("painel.dashboard.index",compact('reservas'));
    }
}
