<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\VeiculosRepository;
use RW940cms\Models\Veiculos;
use RW940cms\Validators\VeiculosValidator;

use DB;
/**
 * Class VeiculosRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class VeiculosRepositoryEloquent extends BaseRepository implements VeiculosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
   
     protected $fieldSearchable = [
        'titulo' => 'like',
        'codigo'=> '=',
        'placa'=> 'like',
        'marca'=> 'like',
        'modelo_versao'=> 'like',
    ];

    public function model()
    {
        return Veiculos::class;
    }

   
  
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
   
    }
}
