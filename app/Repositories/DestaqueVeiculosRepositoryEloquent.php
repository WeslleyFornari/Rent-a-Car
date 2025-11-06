<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\DestaqueVeiculosRepository;
use RW940cms\Models\DestaqueVeiculos;
use RW940cms\Validators\DestaqueVeiculosValidator;

/**
 * Class DestaqueVeiculosRepositoryEloquent.
 *
 * @package namespace RW940cms\Repositories;
 */
class DestaqueVeiculosRepositoryEloquent extends BaseRepository implements DestaqueVeiculosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DestaqueVeiculos::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
