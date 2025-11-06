<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\StatusPagamentoRepository;
use RW940cms\Models\StatusPagamento;
use RW940cms\Validators\StatusPagamentoValidator;
use DB;
/**
 * Class StatusPagamentoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class StatusPagamentoRepositoryEloquent extends BaseRepository implements StatusPagamentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return StatusPagamento::class;
    }

   
   
   
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}?>
