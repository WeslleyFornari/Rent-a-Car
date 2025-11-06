<?php
/*
     Código escrito por Talianderson Dias
     em caso de dúvidas, mande um email para talianderson.web@gmail.com
*/
function MostreSemanas()
{
	$semanas = array("DOM",'SEG','TER','QUA','QUI','SEX','SÁB');
	for( $i = 0; $i < 7; $i++ )
	 echo "<th>".$semanas[$i]."</th>";
}
 
function GetNumeroDias( $mes ){
	$numero_dias = array( 
			'01' => 31, '02' => 28, '03' => 31, '04' =>30, '05' => 31, '06' => 30,
			'07' => 31, '08' =>31, '09' => 30, '10' => 31, '11' => 30, '12' => 31
	);
 
	if (((date('Y') % 4) == 0 and (date('Y') % 100)!=0) or (date('Y') % 400)==0)
	{
	    $numero_dias['02'] = 29;	// altera o numero de dias de fevereiro se o ano for bissexto
	}
 
	return $numero_dias[$mes];
}
 
function GetNomeMes( $mes )
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
 
 
 
function MostreCalendario( $mes  )
{
 	$arrayEventos = array("01"=>22,"02"=>"28","03"=>"12","04"=>"15","05"=>"15","06"=>"15","07"=>"15","08"=>"","09"=>"15","10"=>"1");

	$numero_dias = GetNumeroDias( $mes );	// retorna o número de dias que tem o mês desejado
	$nome_mes = GetNomeMes( $mes );
	$diacorrente = 0;	
 
	$diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 );	// função que descobre o dia da semana
 
	echo "<table width='100%' border = '0' cellspacing = '0' align = 'center'>";
	 echo "<tr>";
         echo "<td colspan = 7><h3>".$nome_mes."</h3></td>";
	 echo "</tr>";
	 echo "<tr>";
	   MostreSemanas();	// função que mostra as semanas aqui
	 echo "</tr>";
	for( $linha = 0; $linha < 6; $linha++ )
	{
 
 
	   echo "<tr>";
 
	   for( $coluna = 0; $coluna < 7; $coluna++ )
	   {
		echo "<td width = 30 height = 26 ";
 
		  if( ($diacorrente == ( date('d') - 1) && date('m') == $mes) )
		  {	
			   echo " id = 'dia_atual' ";
		  }
		  else
		  {
			     if(($diacorrente + 1) <= $numero_dias )
			     {
			         if( $coluna < $diasemana && $linha == 0)
				 {
					echo " id = 'dia_branco' ";
				 }
				 else
				 {
				  	echo " id = 'dia_comum' ";
				 }
			     }
			     else
			     {
				echo " ";
			     }
		  }
		echo " align = 'center' valign = 'center'>";
 
 
		   /* TRECHO IMPORTANTE: A PARTIR DESTE TRECHO É MOSTRADO UM DIA DO CALENDÁRIO (MUITA ATENÇÃO NA HORA DA MANUTENÇÃO) */
 
		      if( $diacorrente + 1 <= $numero_dias )
		      {
			 if( $coluna < $diasemana && $linha == 0)
			 {
			  	 echo " ";
			 }
			 else
			 {
			  	// echo "<input type = 'button' id = 'dia_comum' name = 'dia".($diacorrente+1)."'  value = '".++$diacorrente."' onclick = "acao(this.value)">";
				   if(isset($arrayEventos[$mes]) && $arrayEventos[$mes] == $diacorrente+1){

				   echo "<a href =?mes=$mes&dia=".($diacorrente+1)." class='evento'>".++$diacorrente . "</a>";
				  }else{
				  	echo ++$diacorrente;
				  }
			 }
		      }
		      else
		      {
			break;
		      }
 
		   /* FIM DO TRECHO MUITO IMPORTANTE */
 
 
 
		echo "</td>";
	   }
	   echo "</tr>";
	}
 
	echo "</table>";
}
 
function MostreCalendarioCompleto($class = null)
{
		$mesAtual = date("M");
	    echo "<div class='$class'  data-slick='{\"slidesToShow\": 1, \"slidesToScroll\": 1}'>";
	    $cont = 1;


		for( $i = 1; $i <= 12; $i++ )
		{
		  	echo "<div>";
			MostreCalendario(($cont < 10 ) ? "0".$cont : $cont );  
		    $cont++;
		  	echo "</div>";
	   }
	   echo "</div>";
}
 
//MostreCalendario('05');
//MostreCalendarioCompleto();