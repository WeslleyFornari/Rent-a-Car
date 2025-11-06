<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\EspecializacaoNovoTestamentoRepository;
use RW940cms\Models\EspecializacaoNovoTestamento;
use RW940cms\Validators\EspecializacaoNovoTestamentoValidator;

/**
 * Class EspecializacaoNovoTestamentoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class EspecializacaoNovoTestamentoRepositoryEloquent extends BaseRepository implements EspecializacaoNovoTestamentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EspecializacaoNovoTestamento::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
