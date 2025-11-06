<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use RW940cms\Repositories\CongressosTemaInscricaoRepository;
use RW940cms\Models\CongressosTemaInscricao;
use RW940cms\Validators\CongressosInscricaoValidator;

/**
 * Class CongressosTemaInscricaoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class CongressosTemaInscricaoRepositoryEloquent extends BaseRepository implements CongressosTemaInscricaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */

   

    public function model()
    {
        return CongressosTemaInscricao::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
