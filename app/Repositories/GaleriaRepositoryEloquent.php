<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\GaleriaRepository;
use RW940cms\Models\Galerias;
use RW940cms\Validators\GaleriaValidator;
use DB;
/**
 * Class GaleriaRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class GaleriaRepositoryEloquent extends BaseRepository implements GaleriaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Galerias::class;
    }

   
   
    
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
