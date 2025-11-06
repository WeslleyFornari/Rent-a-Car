<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Status extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'status';
    protected $fillable = [
    'id_status',
    'titulo_status'
   ];
}
