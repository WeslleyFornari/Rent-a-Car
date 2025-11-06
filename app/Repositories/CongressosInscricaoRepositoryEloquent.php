<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use RW940cms\Repositories\CongressosInscricaoRepository;
use RW940cms\Models\CongressosInscricao;
use RW940cms\Validators\CongressosInscricaoValidator;

/**
 * Class CongressosInscricaoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class CongressosInscricaoRepositoryEloquent extends BaseRepository implements CongressosInscricaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */

  

    public function model()
    {
        return CongressosInscricao::class;
    }
    
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
