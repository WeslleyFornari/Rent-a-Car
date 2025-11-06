<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\MateriaisRepository;
use RW940cms\Models\Materiais;
use RW940cms\Validators\MateriaisValidator;

/**
 * Class MateriaisRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class MateriaisRepositoryEloquent extends BaseRepository implements MateriaisRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $fieldSearchable = [
        'titulo' => 'like',
        'arquivo'=> 'like',
    ];
    public function model()
    {
        return Materiais::class;
    }

    
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
