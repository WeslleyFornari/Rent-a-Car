<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\ConteudoRepository;
use RW940cms\Models\Conteudo;
use RW940cms\Validators\ConteudoValidator;

use DB;
/**
 * Class ConteudoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class ConteudoRepositoryEloquent extends BaseRepository implements ConteudoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $fieldSearchable = [
        'titulo_conteudo' => 'like',
        'texto'=> 'like',
    ];
    public function model()
    {
        return Conteudo::class;
    }

   
    public function updateWhere($col,$val, $data){

        DB::table('conteudo')->where($col, $val) ->update($data);
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
   
    }
}
