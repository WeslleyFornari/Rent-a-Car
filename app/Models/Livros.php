<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Livros extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'livros';
    protected $fillable = [
    'titulo_livro',
    'slug_livro',
    'id_categoria_livro',
    'valor',
    'editora_livro',
    'introducao_livro',
    'onde_comprar',
    'destaque',
    'foto_capa',
    'autor',
    'isbn',
    'formato',
    'paginas',
    'edicao',
    'ano_publicacao',
    'status',
    'tradutor'];

    public function categoria(){
        return $this->belongsTo(CategoriaLivros::class,'id_categoria_livro','id');
    }
    public function status(){
        return $this->belongsTo(Status::class,'status','id_status');
    }
}
