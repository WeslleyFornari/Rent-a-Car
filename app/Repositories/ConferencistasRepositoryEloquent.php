<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\ConferencistasRepository;
use RW940cms\Models\Conferencistas;
use RW940cms\Validators\ConferencistasValidator;

/**
 * Class ConferencistasRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class ConferencistasRepositoryEloquent extends BaseRepository implements ConferencistasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Conferencistas::class;
    }

   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
