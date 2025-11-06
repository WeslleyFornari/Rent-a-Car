<?php

namespace RW940cms\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;

use RW940cms\Models\Reservas;
use Carbon\Carbon;
use \utilphp\util;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function __construct(){     
     	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo'); 
    }
    public function index()
    {
    	 setlocale(LC_TIME, 'America/Sao_Paulo');

    	Carbon::setLocale('pt_BR');
           $reservas = Reservas::limit(5)->orderBy('id','desc')->get();
           $date_start = Carbon::now()->subMonths(6)->format('Y-m-d');
           $date_end = Carbon::now()->format('Y-m-d');
    
         $ReservasMeses = Reservas::where('status','confirmada')->whereBetween('created_at', [$date_start, $date_end])->get();

        $ReservasVeiculos = DB::table('reservas')
        ->select('*', DB::raw('count(*) as total'))
        ->join('veiculos', 'reservas.id_veiculo', '=', 'veiculos.id')
        ->where('reservas.status','confirmada')
        ->groupBy('id_veiculo')->where('id_veiculo',"!=",null)->get();


        $ReservasGrupos= DB::table('reservas')
        ->select('*', DB::raw('count(*) as total'))
        ->join('grupos_veiculos', 'reservas.id_grupo_veiculos', '=', 'grupos_veiculos.id')
        ->where('reservas.status','confirmada')
        ->groupBy('id_grupo_veiculos')->where('id_grupo_veiculos',"!=",null)->get();

        return view("painel.dashboard.index",compact('reservas','ReservasMeses','ReservasVeiculos','ReservasGrupos'));
    }

    
}
