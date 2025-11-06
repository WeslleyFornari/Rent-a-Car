<?php
namespace RW940cms\Http\Controllers\Painel;
use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Models\Banner;
use RW940cms\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input as Input;
use DB;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lista()
    {
        $banners = Banner::get();
        return view("painel.banners.lista", compact('banners'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function novo()
    {
       return view("painel.banners.novo");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
       
        $total = Banner::count();
        Banner::create([
            'nome'=>$data['nome'],
            'link'=>$data['link'],
            'media_desktop'=>$data['media_desktop'],
            'media_mobile'=>$data['media_mobile'],
            'ordem'=>$total,
            'status'=>$data['status'],
        ]);
        $banner =  DB::getPdo()->lastInsertId();
        return response()->json(['erro'=>0,'msg'=>'Banner Cadastrado cum sucesso!']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
         $banner = Banner::find($id);
         return view("painel.banners.editar",compact('banner'));
    }
/**

     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
   
        Banner::where('id', $id)->update($data);
        return response()->json([
            'erro' => 0,
            'msg' => 'Atualização realizada com sucesso',
        ]);
    }

    public function order(Request $request){
        $data = $request->except('_token');
      
        foreach($data['ordem'] as $key => $val){
            if($val == ""){
                $val = $key;
            }
            Banner::where('id', $key)->update(['ordem'=>$val]);
            
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::where('id', $id)->delete();
    }
    public function moveImg(Request $request){
        $arrayFile = array();
        $file =  $request->file('file');
    
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = Str::slug($n, "-") .".".end($e) ;
            $fileName = time(). "-". $newName;
            $arrayFile[] = $fileName;
            $file->move('./img/banners/',$fileName);
            //$arrayFile['infor'] = list($width, $height, $type, $attr) = getimagesize('./img/banners/'.$fileName);

 
        return response()->json($arrayFile);
    }
    public function deleteImg(Request $request){
        $data = $request->all();
       
        $del = @unlink("./img/banners/".$data['name']);
        if($del){
            Banner::where($data['collum'],$data['name'])->update([$data['collum'] => null]);
            echo 1;
        }
    }
}