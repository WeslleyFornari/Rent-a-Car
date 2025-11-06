<?php

namespace RW940cms\Http\Controllers\Painel;
use RW940cms\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RW940cms\Models\Media;
use RW940cms\Http\Requests;
use URL;
class MediaController extends Controller
{
	
	    public function index(Request $request,$folder = null){
	    	
	    	/*$absoluteFolderPath = $_SERVER['DOCUMENT_ROOT'] . '/img/parceiros/';

	   	 	$fnames = scandir($absoluteFolderPath);
	   	 	$arrayDir = [];
	   	 	$arrayFile = [];
	   	 	foreach ($fnames as $key => $value) {

	   	 		if(is_dir($absoluteFolderPath . $value)){
					if($value != '.' or $value != '..'){
						$arrayDir[] = $value;
					}
	   	 		}

	   	 		if(!is_dir($absoluteFolderPath . $value)){
	   	 			$ext = explode('.', $value);
	   	 			$ext = end($ext);
	   	 			$media = Media::create(['file'=>$value,'type'=>$ext,'folder_parent'=>'img/','folder'=>'parceiros/']);
	   	 		}

	   	 	}
	*/
	   	 	$folders = [];
			if(!$folder){
				$folder = "img";
			}
			//$folderAtual = $folder;
			$folderAtual = $folder.'/';
			$files = Media::where(['folder'=>$folderAtual])->orderBy('id','desc')->paginate(20);
			
			$folder_parent = "";
			if(isset($files[0]->folder_parent)){
				$folder_parent = $files[0]->folder_parent;
			}	
		$foldersAll = Media::select('folder')->where('folder','!=',$folderAtual)->groupBy('folder')->get();
			foreach ($foldersAll as $key => $value) {
				
					$folders[] = $value->folder;
				
			}
   	 	return view("painel.media.index",compact('files','folders','folderAtual','folder_parent'));
    }
    public function listaFiles(Request $request){
    	$data = $request->all();
    	$folderAtual = $data['folder'];

   		$files = Media::where(['folder'=>$folderAtual])->orderBy('id','desc')->paginate(20);
		return view("painel.media._lista-files",compact('files'));
    }
     public function moveFile(Request $request){
        $arrayFile = array();
        $data = $request->all();
        $files = $request->file;
      	$folder = $data['folder'];
      	$folder_parent = $data['folder_parent'];
        foreach($files as $file) {
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = str_slug($n,"-") .".".end($e) ;
            $fileName = time(). "-". $newName;
            $arrayFile[] = $fileName;
            $file->move($folder,$fileName);
            $media = Media::create(['file'=>$fileName,'type'=>end($e),'folder_parent'=>$folder_parent,'folder'=>$folder]);
        }


        return response()->json($arrayFile);
    }
    public function deleteFile(Request $request){
        $data = $request->all();
       foreach ($data['file'] as $key => $value) {
      	$file = Media::where(['id'=>$value])->first();

        Media::where(['id'=>$value])->delete();

        $del = unlink($file->folder_parent . $file->folder .$file->file);
        if($del){
            return response()->json(['status'=>'deletado']);
        }
            }
    }
    public function getFile(Request $request,$id){
      
     
        $file = Media::find($id);
        $file->fullpatch = URL::to('/')."/".$file->folder_parent.$file->folder.$file->file;
       
        return response()->json($file);
       
    }

	    public function popUp(Request $request,$folder = null){
	   	 	$folders = [];
			if(!$folder){
				$folder = "img";
			}
			$folderAtual = $folder.'/';
			$files = Media::where(['folder'=>$folderAtual])->orderBy('id','desc')->paginate(20);
			
			$folder_parent = "";
			if(isset($files[0]->folder_parent)){
				$folder_parent = $files[0]->folder_parent;
			}	
			$foldersAll = Media::select('folder')->where('folder','!=',$folderAtual)->groupBy('folder')->get();
			foreach ($foldersAll as $key => $value) {
				
					$folders[] = $value->folder;
				
			}
   	 		return view("painel.media.include_media",compact('files','folders','folderAtual','folder_parent'));
    	}
}
