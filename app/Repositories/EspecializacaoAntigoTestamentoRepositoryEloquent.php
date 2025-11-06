<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\EspecializacaoAntigoTestamentoRepository;
use RW940cms\Models\EspecializacaoAntigoTestamento;
use RW940cms\Validators\EspecializacaoAntigoTestamentoValidator;

/**
 * Class EspecializacaoAntigoTestamentoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class EspecializacaoAntigoTestamentoRepositoryEloquent extends BaseRepository implements EspecializacaoAntigoTestamentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EspecializacaoAntigoTestamento::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
