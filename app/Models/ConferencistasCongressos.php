<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ConferencistasCongressos extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'conferencistas_congresso';
    protected $fillable = [
			'congresso_id',
			'conferencista_id',
			
			];


	public function conferencista(){
	        return $this->belongsTo(Conferencistas::class);
	}
}


