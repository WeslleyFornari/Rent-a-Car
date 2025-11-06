<?php

namespace RW940cms\Http\Controllers\Painel;

use Illuminate\Http\Request;
use DB;
use RW940cms\Repositories\ConteudoRepository;
use RW940cms\Repositories\CategoriasRepository;
use RW940cms\Repositories\ImagemDestaqueRepository;
use RW940cms\Repositories\SessaoConteudoRepository;

use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use RW940cms\Criteria\WhereNoticiasCriteria;
use \Input as Input;

class CategoriasController extends Controller
{
    
    public function __construct(
        ConteudoRepository $conteudoRepository,
        CategoriasRepository $categoriasRepository,
        ImagemDestaqueRepository $imagemDestaqueRepository,
        SessaoConteudoRepository $sessaoconteudoRepository){
         $this->conteudoRepository = $conteudoRepository;
         $this->categoriasRepository = $categoriasRepository;
         $this->imagemDestaqueRepository = $imagemDestaqueRepository;
         $this->sessaoconteudoRepository = $sessaoconteudoRepository;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function lista(Request $request,$tipo){
        $sessao = $this->sessaoconteudoRepository->findWhere(['slug_sessao'=>$tipo])->first()->id;
       
        $categorias = $this->categoriasRepository->scopeQuery(function($query) use ($sessao){
                    return $query->where('sessao_id','=',$sessao)->where('parent_id','=','0');
                     })->all();
        
        return view("painel.categorias.lista",compact('categorias','nivel','sessao','tipo'));
    }
    public function editar(Request $request,$id){
        $tipo = $request->tipo;
        $sessao = $this->sessaoconteudoRepository->findWhere(['slug_sessao'=>$tipo])->first()->id;

        $categoria = $this->categoriasRepository->find($id);
        $categorias = $this->categoriasRepository->scopeQuery(function($query) use ($sessao){
                    return $query->where('sessao_id','=',$sessao)->where('parent_id','=','0');
                     })->all();
        return view("painel.categorias.lista",compact('categoria','categorias','tipo','sessao'));
    }
   
    public function novo(){

        $categorias = $this->categoriasRepository->scopeQuery(function($query){
                    return $query->where('status','=',1);
                     })->pluck('nome_categoria','id');

        return view("painel.categorias.novo",compact('categorias'));
    }
    public function store(Request $request){
        $data = $request->all();

        $sessao = $data['sessao_id'];
        $tipo = $this->sessaoconteudoRepository->find($sessao)->slug_sessao;

        
        $data['slug_categoria'] = str_slug($data['nome_categoria'], "-");       
        $this->categoriasRepository->create($data);
        return redirect()->route('admin.categorias.lista',['tipo'=>$tipo]);   
    }
    public function update(Request $request,$id){
        $data = $request->all();    
        $data['slug_categoria'] = str_slug($data['nome_categoria'], "-"); 
        $this->categoriasRepository->update($data,$id);

        $sessao = $data['sessao_id'];
        
         $tipo = $this->sessaoconteudoRepository->find($sessao)->slug_sessao;
        return redirect()->route('admin.categorias.lista',['tipo'=>$tipo]);   
    }
    public function delete($id,$tipo){
        $product = $this->categoriasRepository->delete($id);
       
        return redirect()->route('admin.categorias.lista',['tipo'=>$tipo]);   
    }
    public function move(Request $request){
        $arrayFile = array();
        $files = Input::file('file');
        foreach($files as $file) {
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = str_slug($n, "-") .".".end($e) ;
            $fileName = time(). "-". $newName;
            $arrayFile[] = $fileName;
            $file->move('img_categorias',$fileName);
        }
        return response()->json($arrayFile);
    }
    public function deleteFoto(Request $request){
        $data = $request->all();
        $del = unlink("./img_categorias/".$data['name']);
        if($del){
            echo 1;
        }
    }
   
    
}
