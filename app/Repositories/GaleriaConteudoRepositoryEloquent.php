<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\GaleriaConteudoRepository;
use RW940cms\Models\GaleriaConteudo;
use RW940cms\Validators\GaleriaConteudoValidator;
use DB;
/**
 * Class GaleriaConteudoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class GaleriaConteudoRepositoryEloquent extends BaseRepository implements GaleriaConteudoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return GaleriaConteudo::class;
    }

   
   
    
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
