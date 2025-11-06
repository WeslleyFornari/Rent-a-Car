<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\ConfiguracoesRepository;
use RW940cms\Models\Configuracoes;
use RW940cms\Validators\ConfiguracoesValidator;

/**
 * Class ConfiguracoesRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class ConfiguracoesRepositoryEloquent extends BaseRepository implements ConfiguracoesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Configuracoes::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
