<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\UnidadesRepository;
use RW940cms\Models\Unidades;
use RW940cms\Validators\UnidadesValidator;

use DB;
/**
 * Class UnidadesRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class UnidadesRepositoryEloquent extends BaseRepository implements UnidadesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $fieldSearchable = [
        'titulo' => 'like',
        'conteudo'=> 'like',
    ];
    public function model()
    {
        return Unidades::class;
    }

   
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
   
    }
}
