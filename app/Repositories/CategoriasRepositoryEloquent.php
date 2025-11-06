<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\CategoriasRepository;
use RW940cms\Models\Categorias;
use RW940cms\Validators\CategoriaValidator;

/**
 * Class CategoriasRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class CategoriasRepositoryEloquent extends BaseRepository implements CategoriasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categorias::class;
    }

   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
