<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\RegionaisRepository;
use RW940cms\Models\Regionais;
use RW940cms\Validators\RegionaisValidator;

/**
 * Class RegionaisRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class RegionaisRepositoryEloquent extends BaseRepository implements RegionaisRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Regionais::class;
    }

   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
