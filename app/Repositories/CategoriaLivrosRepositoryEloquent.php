<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\CategoriaLivrosRepository;
use RW940cms\Models\CategoriaLivros;
use RW940cms\Validators\CategoriaLivrosValidator;

/**
 * Class CategoriaLivrosRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class CategoriaLivrosRepositoryEloquent extends BaseRepository implements CategoriaLivrosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoriaLivros::class;
    }

   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
