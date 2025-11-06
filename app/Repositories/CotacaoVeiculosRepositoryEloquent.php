<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\CotacaoVeiculosRepository;
use RW940cms\Models\CotacaoVeiculos;
use RW940cms\Validators\CategoriaValidator;

/**
 * Class CotacaoVeiculosRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class CotacaoVeiculosRepositoryEloquent extends BaseRepository implements CotacaoVeiculosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CotacaoVeiculos::class;
    }

   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
