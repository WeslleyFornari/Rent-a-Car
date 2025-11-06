<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use URL;

class Media extends Model
{
    
     protected $table = 'media';
  
    protected $fillable = ['id','file', 'alt','type','folder_parent','folder'];


    public function fullpatch(){
    	return URL::to('/')."/".$this->folder_parent.$this->folder.$this->file;
    }
}
