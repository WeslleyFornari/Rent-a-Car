<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\FormacaoAssociadoRepository;
use RW940cms\Models\FormacaoAssociado;
use RW940cms\Validators\FormacaoAssociadoValidator;

/**
 * Class FormacaoAssociadoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class FormacaoAssociadoRepositoryEloquent extends BaseRepository implements FormacaoAssociadoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FormacaoAssociado::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
