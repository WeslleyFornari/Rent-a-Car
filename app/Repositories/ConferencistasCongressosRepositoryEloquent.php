<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\ConferencistasCongressosRepository;
use RW940cms\Models\ConferencistasCongressos;
use RW940cms\Validators\ConferencistasCongressosValidator;

/**
 * Class ConferencistasCongressosRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class ConferencistasCongressosRepositoryEloquent extends BaseRepository implements ConferencistasCongressosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ConferencistasCongressos::class;
    }

   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
