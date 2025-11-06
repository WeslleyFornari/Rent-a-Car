<?php
namespace RW940cms\Http\Controllers\Painel;
use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Repositories\FichaFinanciamentoRepository;
use Excel;
use RW940cms\Models\FichaFinanciamento;
use RW940cms\Models\CotacaoVeiculos;
class ExportarController extends Controller
{
	public function __construct(FichaFinanciamentoRepository $fichaFinanciamentoRepository){
        $this->fichaFinanciamentoRepository = $fichaFinanciamentoRepository;
    }
   public function exportarFinanciamentos(){
   	ob_end_clean(); //importante para evitar erros de arquivos com espaços em branco
   	$data = FichaFinanciamento::get()->toArray();
		return \Excel::create('fichas_financiamento', function($excel) use ($data) {
			$excel->sheet('sheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data, null, 'A1', true);
	        });
		})->export('xls');
   }
   public function exportarCotacoes(){
   	ob_end_clean();//importante para evitar erros de arquivos com espaços em branco
   	$data = CotacaoVeiculos::get()->toArray();
		return \Excel::create('Cotação Veículos', function($excel) use ($data) {
			$excel->sheet('sheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data, null, 'A1', true);
	        });
		})->export('xls');
   }
}?>