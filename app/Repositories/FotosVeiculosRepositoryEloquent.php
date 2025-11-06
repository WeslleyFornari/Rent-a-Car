<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\FotosVeiculosRepository;
use RW940cms\Models\FotosVeiculos;
use RW940cms\Validators\FotosVeiculosValidator;
use DB;
/**
 * Class FotosVeiculosRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class FotosVeiculosRepositoryEloquent extends BaseRepository implements FotosVeiculosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(){
        return FotosVeiculos::class;
    }
   
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
