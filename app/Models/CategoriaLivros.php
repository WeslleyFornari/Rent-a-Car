<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CategoriaLivros extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'categoria_livros';
    protected $fillable = [
    'id_categoria_livros',
    'nome_categoria_livros',
    'slug_categoria_livros',
    'categoria_pai_livros',
    'status'

   ];
}
