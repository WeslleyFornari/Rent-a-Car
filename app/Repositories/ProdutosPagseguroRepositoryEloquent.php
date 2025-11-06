<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\ProdutosPagseguroRepository;
use RW940cms\Models\ProdutosPagseguro;
use RW940cms\Validators\ProdutosPagseguroValidator;
use DB;

/**
 * Class ProdutosPagseguroRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class ProdutosPagseguroRepositoryEloquent extends BaseRepository implements ProdutosPagseguroRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProdutosPagseguro::class;
    }

  
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function MostreSemanas()
    {
        $html = '';
        $semanas = array("DOM",'SEG','TER','QUA','QUI','SEX','SÁB');
        for( $i = 0; $i < 7; $i++ )
        $html .= "<th>".$semanas[$i]."</th>";
        return $html;
 }

 public function GetNumeroDias( $mes ){
    $numero_dias = array( 
        '01' => 31, '02' => 28, '03' => 31, '04' =>30, '05' => 31, '06' => 30,
        '07' => 31, '08' =>31, '09' => 30, '10' => 31, '11' => 30, '12' => 31
    );

    if (((date('Y') % 4) == 0 and (date('Y') % 100)!=0) or (date('Y') % 400)==0)
    {
        $numero_dias['02'] = 29;    // altera o numero de dias de fevereiro se o ano for bissexto
    }

    return $numero_dias[$mes];
}

public function GetNomeMes( $mes )
{
 $meses = array('01' => "Janeiro", '02' => "Fevereiro", '03' => "Março",
     '04' => "Abril",   '05' => "Maio",      '06' => "Junho",
     '07' => "Julho",   '08' => "Agosto",    '09' => "Setembro",
     '10' => "Outubro", '11' => "Novembro",  '12' => "Dezembro"
 );

 if( $mes >= 01 && $mes <= 12)
    return $meses[$mes];

return "Mês deconhecido";

}



public function MostreCalendario( $mes  )
{
    $html = '';
     /*$eventos = $this->model->where('status_ProdutosPagseguro','=','1')->get();
   
   $arrayEventos = array();
    foreach ($eventos as $key => $value) {
        $d = gmdate('d',strtotime($value->data_inicio_ProdutosPagseguro));
        $m = gmdate('m',strtotime($value->data_inicio_ProdutosPagseguro));
        if(array_key_exists($m,$arrayEventos)){

            $atual = array($arrayEventos[$m]);

            $arrayEventos[$m] = array_push($atual, $d);
        }else{
            $arrayEventos[$m] = $d;
        }
    }
*/
    

    $numero_dias = $this->GetNumeroDias( $mes );   // retorna o número de dias que tem o mês desejado
    $nome_mes = $this->GetNomeMes( $mes );
    $diacorrente = 0;   

    $diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 );  // função que descobre o dia da semana

    $html .= "<table width='100%' border = '0' cellspacing = '0' align = 'center'>";
    $html .= "<tr>";
    $html .= "<td colspan = 7><h3>".$nome_mes."</h3></td>";
    $html .= "</tr>";
    $html .= "<tr>";
       $html .= $this->MostreSemanas(); // função que mostra as semanas aqui
       $html .= "</tr>";
       for( $linha = 0; $linha < 6; $linha++ )
       {


           $html .= "<tr>";

           for( $coluna = 0; $coluna < 7; $coluna++ )
           {
            $html .= "<td width = 30 height = 26 ";

            if( ($diacorrente == ( date('d') - 1) && date('m') == $mes) )
            { 
               $html .= " id = 'dia_atual' ";
           }
           else
           {
             if(($diacorrente + 1) <= $numero_dias )
             {
                 if( $coluna < $diasemana && $linha == 0)
                 {
                    $html .= " id = 'dia_branco' ";
                }
                else
                {
                    $html .= " id = 'dia_comum' ";
                }
            }
            else
            {
                $html .= " ";
            }
        }
        $html .= " align = 'center' valign = 'center'>";


        /* TR$html .= IMPORTANTE: A PARTIR DESTE TR$html .= É MOSTRADO UM DIA DO CALENDÁRIO (MUITA ATENÇÃO NA HORA DA MANUTENÇÃO) */

        if( $diacorrente + 1 <= $numero_dias )
        {
         if( $coluna < $diasemana && $linha == 0)
         {
             $html .= " ";
         }  else
         {
                // $html .= "<input type = 'button' id = 'dia_comum' name = 'dia".($diacorrente+1)."'  value = '".++$diacorrente."' onclick = "acao(this.value)">";

           if(isset($arrayEventos[$mes]) && $arrayEventos[$mes] == $diacorrente+1){

               $html .= "<a href='#'  class='evento'>".++$diacorrente . "</a>";
           }else{
            $html .= ++$diacorrente;
        }
    }

}
else
{
    break;
}

/* FIM DO TR$html .= MUITO IMPORTANTE */



$html .= "</td>";
}
$html .= "</tr>";
}

$html .= "</table>";
 return $html;
}

public function MostreCalendarioCompleto($class = null)
{
    $html = '';
    $html .= "<div class='$class'  data-slick='{\"slidesToShow\": 1, \"slidesToScroll\": 1}'>";
    $cont = 1;


    for( $i = 1; $i <= 12; $i++ )
    {
        $html .= "<div>";
        $html .= $this->MostreCalendario(($cont < 10 ) ? "0".$cont : $cont );  
        $cont++;
        $html .= "</div>";
    }
    $html .= "</div>";
     return $html;
}
}
