<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\CadastroAssociadoRepository;
use RW940cms\Models\CadastroAssociado;
use RW940cms\Validators\CadastroAssociadoValidator;

/**
 * Class CadastroAssociadoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class CadastroAssociadoRepositoryEloquent extends BaseRepository implements CadastroAssociadoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
  
    
    public function model()
    {
        return CadastroAssociado::class;
    }

    
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
