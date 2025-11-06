<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\FaturamentoRepository;
use RW940cms\Models\Faturamento;
use RW940cms\Validators\FaturamentoValidator;

/**
 * Class FaturamentoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class FaturamentoRepositoryEloquent extends BaseRepository implements FaturamentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Faturamento::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
