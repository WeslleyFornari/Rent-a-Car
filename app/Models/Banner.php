<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Banner extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'banners';

    protected $fillable = [    
    'nome',
    'link',
    'media_desktop',
    'media_mobile',
    'ordem',
    'status',
    'created_at',
    'updated_at',
    ];
}

