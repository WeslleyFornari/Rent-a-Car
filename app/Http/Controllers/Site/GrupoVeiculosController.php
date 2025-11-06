<?php

namespace RW940cms\Http\Controllers\Site;

use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Models\Veiculos;
use RW940cms\Models\GruposVeiculos;
use RW940cms\Models\Opcionais;
use RW940cms\Models\OpcionaisGrupos;
use RW940cms\Models\Configuracoes;
use RW940cms\Models\Clientes;
use RW940cms\Models\Reservas;
use RW940cms\Models\Promocoes;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use \Input as Input;
use Faker\Generator as Faker;
use Mail;
class GrupoVeiculosController extends Controller
{

    public function index(Request $request,$status = null){
        $grupos = GruposVeiculos::where('status','=','ativo')->orderby('sigla_grupo','asc')->get();


        return view('site.veiculos',compact('grupos'));
    }
   
    public function search(Request $request){
      $data = $request->except('_token');
      $grupos = GruposVeiculos::where('status','=','ativo')->orderby('sigla_grupo','asc')->get();
      $tres_vezes = null;
      $dez_vezes = null;
      $valorPeriodo = null;
      $valorDiaria = null;
      $grupo = null;
      $valores = null;
      $valorPeriodoParcelado = null;
      $promocao = null;
      $desconto = null;
      $valorDescontoAvista = null;
      $taxaAdministrativa = null;
      if(!isset($data['data_termino'])){

        $data['data_inicio'] = Carbon::now()->format('d/m/Y');
        $data['hora_inicio'] = '08:00';
        $data['data_termino'] = Carbon::now()->addDays(2)->format('d/m/Y');
        $data['hora_termino'] = '16:00';
      }

      if(!$data['hora_inicio']){
         $data['hora_inicio'] = '08:00';
      }
      if(!$data['hora_termino']){
         $data['hora_termino'] = '16:00';
      }
      $date1 = Carbon::createFromFormat('Y-m-d', $this->dateEn($data['data_termino']));
      $date2 = Carbon::createFromFormat('Y-m-d', $this->dateEn($data['data_inicio']));

      $diarias = $date2->diffInDays($date1);

       if($diarias >= 25){
            return redirect()->route('alugue.mensal',['dataInicio'=>$date2->format('Y-m-d'), 'dataTermino'=>$date1->format('Y-m-d'),'avisoMensal'=>'1']);
          }
      if(isset($data['grupo_id'])){

          $grupo = GruposVeiculos::find($data['grupo_id']);
 
          $date1 = Carbon::createFromFormat('Y-m-d', $this->dateEn($data['data_termino']));
          $date2 = Carbon::createFromFormat('Y-m-d', $this->dateEn($data['data_inicio']));

      
        


          $diarias = $date2->diffInDays($date1);

         
         
          $valorDiaria = $grupo->valorDiaria($grupo->id,$date2->format('Y-m-d'),$diarias);
          $desconto = Promocoes::where('grupo_veiculos_id',$grupo->id)->where('de_diaria','<=',$diarias)->where('ate_diaria','>=',$diarias)->first();
          $promocao = Promocoes::where('grupo_veiculos_id',$grupo->id)->where('de_diaria','>=',$diarias)->first();
          if($desconto){
            //$desconto->valor_desconto = ($desconto->desconto / 100) * $valorDiaria;
            //$valorDesconto = $valorDesconto * $valorDiaria ;
            //$valorDiaria = $valorDiaria - $desconto->valor_desconto;
          }
        
          $valorPeriodo = $diarias * $valorDiaria;
         
        
          $grupo->total_taxa = 0;
          $grupo->valor_final = 0;
          $valores['total_taxa'] = 0;
          $valores['valor_final'] = 0;

           if(isset($grupo->adicionais)){
            
            foreach ($grupo->adicionais as $key => $value) {
                $value->adicional_periodo = $value->valor*$diarias;
              $valores['total_taxa'] += $value->valor*$diarias;

              }
          }
         
          $valores['valor_final'] = $valorPeriodo +  $valores['total_taxa'];
          if($desconto){
            
            $desconto->valor_desconto = ($desconto->desconto / 100) * ($valorDiaria * $diarias);

            $valores['valor_final'] = $valores['valor_final']  - $desconto->valor_desconto;
            //$valorDesconto = $valorDesconto * $valorDiaria ;
            //$valorDiaria = $valorDiaria - $desconto->valor_desconto;
          }

          $valores['valor_final_dez_vezes'] = $this->calcParcelaJuros($valores['valor_final'],10);
          $descontoAvista = Configuracoes::where('parametro','desconto-avista')->first()->value;

          $valorDescontoAvista = $descontoAvista/100;
          $valorDescontoAvista =  $valores['valor_final'] * $valorDescontoAvista;
          $valorDescontoAvista =  ceil($valores['valor_final'] - $valorDescontoAvista);

            
          $taxaAdministrativa = Configuracoes::where('parametro','taxa-administrativa')->first()->value;
          $taxaAdministrativa = $taxaAdministrativa / 100;
          $taxaAdministrativa =  $valores['valor_final'] * $taxaAdministrativa;
          $valores['valor_final'] =  ceil($valores['valor_final'] + $taxaAdministrativa);
      }


    
      return view('site.veiculos',compact('grupos','diarias','data','tres_vezes','dez_vezes','valorPeriodo','valorDiaria','grupo','valores','valorPeriodoParcelado','promocao','desconto','valorDescontoAvista','taxaAdministrativa'));
    }




    public function selectGrupo(Request $request){
        $data = $request->except('_token');
        $qtdDiasPromocao = 0;
        $tres_vezes = null;
      $dez_vezes = null;
      $valorPeriodo = null;
      $valorDiaria = null;
      $grupo = null;
      $valores = null;
      $valorPeriodoParcelado = null;
      $promocao = null;
      $desconto = null;
      $valorDescontoAvista = null;
      $taxaAdministrativa = null;

         if(!isset($data['data_termino'])){

          $data['data_inicio'] = Carbon::now()->format('d/m/Y');
          $data['hora_inicio'] = '08:00';
          $data['data_termino'] = Carbon::now()->addDays(2)->format('d/m/Y');
          $data['hora_termino'] = '16:00';
        }

      if(!$data['hora_inicio']){
         $data['hora_inicio'] = '08:00';
      }
      if(!$data['hora_termino']){
         $data['hora_termino'] = '16:00';
      }
      
        $grupo = GruposVeiculos::find($data['grupo_id']);

       
        if(isset($data['data_inicio'])){
          $date1 = Carbon::createFromFormat('Y-m-d', $this->dateEn($data['data_termino']));
          $date2 = Carbon::createFromFormat('Y-m-d', $this->dateEn($data['data_inicio']));

          
// Tolerancia de 4 Horas

        $hora_inicio = DateTime::createFromFormat('H:i', $data['hora_inicio']);
        $hora_termino = DateTime::createFromFormat('H:i', $data['hora_termino']);

        $diferenca = $hora_inicio->diff($hora_termino);
        $horas = $diferenca->h .'.'.$diferenca->i;

        if ($horas > 4) {

            $diarias = ($date2->diffInDays($date1)) + 1 ;

        } else {
            $diarias = $date2->diffInDays($date1);
        }

          $valorDiaria = $grupo->valor_padrao;
         
          $desconto = Promocoes::where('grupo_veiculos_id',$grupo->id)->where('de_diaria','<=',$diarias)->where('ate_diaria','>=',$diarias)->first();
          $promocao = Promocoes::where('grupo_veiculos_id',$grupo->id)->where('de_diaria','<=',$diarias)->where('ate_diaria','<=',$diarias)->first();
        
           $valorPeriodo = $diarias * $valorDiaria;
         

          
          $valores['total_taxa'] = 0;
          $valores['valor_final'] = 0;

           if(isset($grupo->adicionais)){
            
            foreach ($grupo->adicionais as $key => $value) {
              $value->adicional_periodo = $value->valor*$diarias;
            
             
              $valores['total_taxa'] += $value->valor*$diarias;

            }
          }
          $valores['valor_final'] = $valorPeriodo +  $valores['total_taxa'];
          if($desconto){
            
           $desconto->valor_desconto = ($desconto->desconto / 100) * ($valorDiaria * $diarias);

           $valores['valor_final'] = $valores['valor_final']  - round($desconto->valor_desconto,2);
            //$valorDesconto = $valorDesconto * $valorDiaria ;
            //$valorDiaria = $valorDiaria - $desconto->valor_desconto;
          }

          $valores['valor_final_dez_vezes'] = $this->calcParcelaJuros($valores['valor_final'],10);

          $descontoAvista         = Configuracoes::where('parametro','desconto-avista')->first()->value;
          $valorDescontoAvista    = $descontoAvista/100;
          $valorDescontoAvista    =  $valores['valor_final'] * $valorDescontoAvista;
          $valorDescontoAvista    =  ceil($valores['valor_final'] - $valorDescontoAvista);
          
          $taxaAdministrativa     = Configuracoes::where('parametro','taxa-administrativa')->first()->value;
          $taxaAdministrativa     = $taxaAdministrativa / 100;
        
          $taxaAdministrativa     =  $valores['valor_final'] * $taxaAdministrativa;
          $valores['valor_final'] =  ceil($valores['valor_final'] + $taxaAdministrativa);
          
      }
      if($promocao){
        $qtdDiasPromocao = $promocao->de_diaria - $diarias;
    
        }
      $dataNew = new Carbon($this->dateEn($data['data_termino']));
      $dataNew =  $dataNew->addDays($qtdDiasPromocao)->format('d/m/Y');

        return view('site.include._grupo_selected',compact('grupo','diarias','data','tres_vezes','dez_vezes','valorPeriodo','valorDiaria','valores','valorPeriodoParcelado','valorDescontoAvista','desconto','promocao','dataNew','taxaAdministrativa'));
    }








    public function reserva(Request $request){
        $data = $request->except('_token');
        $grupo = GruposVeiculos::find($data['grupo_id']);

          $diarias = $data['diarias'];
          $valorDiaria = $grupo->valor_padrao;
        
          $desconto = Promocoes::where('grupo_veiculos_id',$grupo->id)->where('de_diaria','<=',$diarias)->where('ate_diaria','>=',$diarias)->first();
          $promocao = Promocoes::where('grupo_veiculos_id',$grupo->id)->where('de_diaria','>=',$diarias)->first();
          /*if($desconto){
            $desconto->valor_desconto = ($desconto->desconto / 100) * $valorDiaria;
            //$valorDesconto = $valorDesconto * $valorDiaria ;
            $valorDiaria = $valorDiaria - $desconto->valor_desconto;
          }*/
           $valorPeriodo = $diarias * $valorDiaria;
          $tres_vezes = $this->calcParcelaJuros($valorPeriodo,3);
          $dez_vezes = $this->calcParcelaJuros($valorPeriodo,10);
          $valorPeriodoParcelado = $this->valorPeriodoParcelado($tres_vezes,3)['formated'];
          $grupo->total_taxa = 0;
          $grupo->valor_final = 0;
          $valores['total_taxa'] = 0;
          $valores['valor_final'] = 0;

         

           if(isset($grupo->adicionais)){
            
            foreach ($grupo->adicionais as $key => $value) {
                $value->adicional_periodo = $value->valor*$diarias;
              $valores['total_taxa'] += $value->valor*$diarias;

              }
          }
            $valores['valor_final'] = $valorPeriodo +  $valores['total_taxa'];
            if($desconto){
              
              $desconto->valor_desconto = ($desconto->desconto / 100) * ($valorDiaria * $diarias);

              $valores['valor_final'] = $valores['valor_final']  - $desconto->valor_desconto;
              //$valorDesconto = $valorDesconto * $valorDiaria ;
              //$valorDiaria = $valorDiaria - $desconto->valor_desconto;
            }
          //$valores['valor_final'] = $this->valorPeriodoParcelado($tres_vezes,3)['pure'] +  $valores['total_taxa'];
         

          $valores['valor_final_dez_vezes'] = $this->calcParcelaJuros($valores['valor_final'],10);

          $descontoAvista         = Configuracoes::where('parametro','desconto-avista')->first()->value;
          $valorDescontoAvista    = $descontoAvista/100;
          $valorDescontoAvista    =  $valores['valor_final'] * $valorDescontoAvista;
          $valorDescontoAvista    =  ceil($valores['valor_final'] - $valorDescontoAvista);
          
          $taxaAdministrativa     = Configuracoes::where('parametro','taxa-administrativa')->first()->value;
          $taxaAdministrativa     = $taxaAdministrativa / 100;
        
          $taxaAdministrativa     =  $valores['valor_final'] * $taxaAdministrativa;
          $valores['valor_final'] =  ceil($valores['valor_final'] + $taxaAdministrativa);


           $cliente  = Clientes::create($data['cliente']);   
          if($cliente){
            $reservaDados = array(
            'diarias'=>$data['diarias'],
            'data_inicio'=>$this->dateEn($data['data_inicio']),
            'hora_inicio'=>$data['hora_inicio'],
            'data_termino'=>$this->dateEn($data['data_termino']),
            'hora_termino'=>$data['hora_termino'],
            'id_grupo_veiculos'=>$data['grupo_id'],
            'valor'=>$data['valor'],
            'id_cliente'=>$cliente->id
          );
           
            $reserva = Reservas::create($reservaDados);
             $dataReserva = [
                      'reserva_status'=>$reserva->status,
                      'reserva_data_inicio'=>$reserva->data_inicio->format('d/m/Y'),
                      'reserva_hora_inicio'=>date('H:i',strtotime($reserva->hora_inicio)),
                      'reserva_data_termino'=>$reserva->data_termino->format('d/m/Y'),
                      'reserva_hora_termino'=>date('H:i',strtotime($reserva->hora_termino)),
                      'reserva_grupo'=>$reserva->grupo_veiculo->sigla_grupo ."-". $reserva->grupo_veiculo->nome_grupo,
                      'reserva_valor'=>@number_format($reserva->valor,2,',','.'),
                      'cliente_nome'=>$reserva->cliente->nome,
                      'cliente_cpf'=>$reserva->cliente->cpf,
                      'cliente_telefone2'=>$reserva->cliente->telefone2,
                    ];
        
            \Mail::send('emails.pre-reserva', $dataReserva, function ($m) use ($dataReserva){
             
                $m->from('contato@vestro.com.br', 'Vestro');
                $m->to('contato@vestro.com.br', 'Vestro')->subject('Pré-Reserva'); 
                $m->bcc('rafaw940@yahoo.com.br', 'Rafael')->subject('Pré-Reserva'); 
            });

          }
         
      return view('site.dados_reserva',compact('data','grupo','valorPeriodo','diarias','valores','tres_vezes','valorPeriodoParcelado','valorDescontoAvista','desconto','promocao','reserva','valorDiaria'));
    }
    public function dateEn($data){
      $data = explode("/",$data);
      return $data[2]."-".$data[1]."-".$data[0];
    }
    public function dateBr($data){
      $data = explode("-",$data);
      return $data[2]."/".$data[1]."/".$data[0];
    }
   public function valorPeriodoParcelado($valor,$parcelas){
      $valor = str_replace(".", "", $valor);
      $valor = str_replace(",", ".", $valor);
      $pure = $valor * $parcelas;
      $formated = number_format($pure, 2, ",", ".");
      return array('pure'=>$pure, 'formated'=>$formated);
   }
   public function calcParcelaJuros($valor_total,$parcelas){
        if($parcelas >1){
          $juros = 2.99;
        }else{
          $juros = 0;
        }

        if($juros==0){
          $string =number_format($valor_total/$parcelas, 2, ",", ".");
          return  $string;
        }else{
          
         $I = $juros/100.00;
           $valor_parcela = $valor_total*$I*pow((1+$I),$parcelas)/(pow((1+$I),$parcelas)-1);

         $string = number_format($valor_parcela, 2, ",", ".");
         return  $string;
       }
    }

}
