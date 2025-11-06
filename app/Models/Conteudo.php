<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model 
{

    protected $table = 'conteudo';
    protected $fillable = ['titulo_conteudo','slug_conteudo','sessao_id','categoria_id','destaque','texto','img_destaque','status'];

    public function categoria(){
        return $this->belongsTo(Categorias::class);
    }
    public function img_destaque(){
        return $this->hasOne(ImagemDestaque::class);
    }
    public function sessao(){
        return $this->belongsTo(Sessao::class);
    }
    
     public function getUpdatedAtAttribute($value)
    {
      return  gmdate('d/m/Y | H:i:s',strtotime($value));
    }
    public function Blocos(){
        return $this->belongsTo(Categorias::class);
    }
     
}
