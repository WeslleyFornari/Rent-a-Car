<?php

namespace RW940cms\Http\Controllers\Painel;

use Illuminate\Http\Request;
use DB;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Repositories\ConteudoRepository;
use RW940cms\Repositories\ImagemDestaqueRepository;
use RW940cms\Repositories\GaleriaRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use RW940cms\Criteria\WherePaginasCriteria;
use RW940cms\Criteria\WhereServicosCriteria;
use RW940cms\Repositories\CategoriasRepository;
use \Input as Input;
class PaginasController extends Controller
{
    
      public function __construct(
        ConteudoRepository $conteudoRepository,
        CategoriasRepository $categoriasRepository,
        ImagemDestaqueRepository $imagemDestaqueRepository,
        GaleriaRepository $galeriaRepository
    ){
         $this->conteudoRepository = $conteudoRepository;
         $this->categoriasRepository = $categoriasRepository;
         $this->imagemDestaqueRepository = $imagemDestaqueRepository;
         $this->galeriaRepository = $galeriaRepository;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function lista(){
        $paginas = $this->conteudoRepository->pushCriteria(WherePaginasCriteria::class)->paginate();
          
        return view("painel.paginas.lista",compact('paginas'));
    }
    public function servicosLista(){
        $paginas = $this->conteudoRepository->pushCriteria(WhereServicosCriteria::class)->paginate();
          
        return view("painel.paginas.lista-servicos",compact('paginas'));
    }
    public function novo(){
        
        $categorias = $this->categoriasRepository->findWhere(['sessao_id'=>'1'])->pluck('nome_categoria','id');
       
        return view("painel.paginas.novo",compact('categorias'));
    }
     public function storePaginas(Request $request){
        $data = $request->all();
       
        $data['slug_conteudo'] = str_slug($data['titulo_conteudo'], "-");       
        $this->conteudoRepository->create($data);
        $idConteudo = DB::getPdo()->lastInsertId();
        $data['conteudo_id'] = $idConteudo;
        
        $style = "";
         $arquivo = "";
         $mostrar_artigo = "";
        
             if(isset($data['alinhamento'])){
            $arquivo = $data['arquivo'];
            
            if($data['alinhamento'] == "nenhum"){
                $style = "float:none;margin-bottom:15px;width: 100%;height: auto;";
            }
            if($data['alinhamento'] == "left"){
                $style = "float:left;margin-bottom:15px;margin-right:15px;";
            }
            if($data['alinhamento'] == "right"){
                $style = "float:right;margin-bottom:15px;margin-left:15px;";
            }
         
            unset($data['alinhamento']);
        }
        if(isset($data['mostrar_artigo'])){
            $mostrar_artigo = $data['mostrar_artigo'];
        }
        $imgData = ['conteudo_id'=>$idConteudo];
        $imgDataVal = ['arquivo'=>$arquivo,'style'=> $style,'mostrar_artigo'=>$mostrar_artigo];
       if(isset($data['arquivo'])){
            $this->imagemDestaqueRepository->updateOrCreate($imgData,$imgDataVal);
        }
        return redirect()->route('admin.paginas.novo');   
    }
    public function editar(Request $request,$id){
        $conteudo = $this->conteudoRepository->find($id);
        if(isset($conteudo->img_destaque)){
        $style = explode(";",$conteudo->img_destaque->style); 
        $conteudo['alinhamento'] = str_replace("float:", "", $style[0]);
        }
       
        $categorias = $this->categoriasRepository->pluck('nome_categoria','id');
        $galeria =  $this->galeriaRepository->orderBy('ordem','asc')->findWhere(['conteudo_id'=>$id]);
       
        return view("painel.paginas.editar",compact('conteudo','categorias','galeria'));
    }
    public function quemSomos()
    {
        $conteudo = $this->conteudoRepository->findWhere(['slug_conteudo'=>'quem-somos'])->first();  
        return view("painel.paginas.quem-somos",compact('conteudo'));
    }
   
   
   

    public function updatePaginas(Request $request, $id){
        $data = $request->all();
       
        $redirect = $data['redirect'];
        unset($data['_token']);
        unset($data['redirect']);

        $data['slug_conteudo'] = str_slug($data['titulo_conteudo'], "-");
        $this->conteudoRepository->update($data,$id);
        $style = "";
        $arquivo = "";
        $mostrar_artigo = "";
        if(isset($data['alinhamento'])){

            $arquivo = $data['arquivo'];
            
            if($data['alinhamento'] == "nenhum"){
                $style = "float:none;margin-bottom:15px;width: 100%;height: auto;";
            }
            if($data['alinhamento'] == "left"){
                $style = "float:left;margin-bottom:15px;margin-right:15px;";
            }
            if($data['alinhamento'] == "right"){
                $style = "float:right;margin-bottom:15px;margin-left:15px;";
            }
         
            unset($data['alinhamento']);
        }
        if(isset($data['mostrar_artigo'])){
            $mostrar_artigo = $data['mostrar_artigo'];
        }
        if(isset($data['fotos']) && !empty($data['fotos'])){
            $fotos = $data['fotos'];
            unset($data['fotos']); 
        }else{
             $fotos = null;
        }
        if($fotos){
             DB::table('galeria')->where('conteudo_id', '=', $id)->delete();
        foreach ($fotos as $key => $value) {
                    DB::table('galeria')->insert(['conteudo_id' => $id, 'foto' => $value,'ordem'=>$data['ordem'][$key]]);  
            }
        }
        $imgData = ['conteudo_id'=>$id];
        $imgDataVal = ['arquivo'=>$arquivo,'style'=> $style,'mostrar_artigo'=>$mostrar_artigo];
          if(isset($data['arquivo'])){
        $this->imagemDestaqueRepository->updateOrCreate($imgData,$imgDataVal);
        }
        return redirect($redirect); 
    }
    public function moveGaleria(Request $request){
        $arrayFile = array();
        $files = Input::file('file');
        foreach($files as $file) {
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = str_slug($n,"-") .".".end($e) ;
            $fileName = time(). "-". $newName;
            $arrayFile[] = $fileName;
            $file->move('img/galeria',$fileName);
        }
        return response()->json($arrayFile);
    }
    public function deleteGaleria(Request $request){
        $data = $request->all();
        DB::table('galeria')->where('foto', '=', $data['name'])->delete();

        $del = unlink("img/galeria/".$data['name']);
        if($del){
            return response()->json(['status'=>'deletado']);
        }
    }
     public function moveImgDestaque(Request $request){

        $arrayFile = array();

        $files = Input::file('file');
      
        foreach($files as $file) {
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = str_slug($n, "-") .".".end($e) ;
            $fileName = time(). "-". $newName;
            $arrayFile[] = $fileName;
            $file->move('./img/',$fileName);
        }
        
        return response()->json($arrayFile);
    }
    public function deleteImgDestaque(Request $request){
        $data = $request->all();
        $del = unlink("./img/".$data['name']);
        if($del){
            echo 1;
        }
    }


    public function delete($id) {
        $this->imagemDestaqueRepository->deleteWhere(['conteudo_id'=>$id]);

        $this->galeriaRepository->deleteWhere(['conteudo_id'=>$id]);
      
        $this->conteudoRepository->delete($id);
    }
    
}?>