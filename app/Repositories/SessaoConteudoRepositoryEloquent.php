<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\SessaoConteudoRepository;
use RW940cms\Models\SessaoConteudo;
use RW940cms\Validators\SessaoConteudoValidator;

use DB;
/**
 * Class SessaoConteudoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class SessaoConteudoRepositoryEloquent extends BaseRepository implements SessaoConteudoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    
    public function model()
    {
        return SessaoConteudo::class;
    }

   
  
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
   
    }
}
