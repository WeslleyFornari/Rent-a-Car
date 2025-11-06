<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Materiais extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'materiais';
    protected $fillable = ['titulo','arquivo','tipo','somente_assinante','status','qtd_download'];
}


