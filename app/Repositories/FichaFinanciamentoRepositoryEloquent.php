<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\FichaFinanciamentoRepository;
use RW940cms\Models\FichaFinanciamento;
use RW940cms\Validators\CategoriaValidator;

/**
 * Class FichaFinanciamentoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class FichaFinanciamentoRepositoryEloquent extends BaseRepository implements FichaFinanciamentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FichaFinanciamento::class;
    }

   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}?>