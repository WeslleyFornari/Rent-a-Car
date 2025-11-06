<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\CongressosRepository;
use RW940cms\Models\Congressos;
use RW940cms\Validators\CongressosValidator;

/**
 * Class CongressosRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class CongressosRepositoryEloquent extends BaseRepository implements CongressosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Congressos::class;
    }
   
   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
