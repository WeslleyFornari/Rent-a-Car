<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\SearchRepository;
use DB;
/**
 * Class SearchRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class SearchRepositoryEloquent extends BaseRepository implements SearchRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
  

    public function pesquisar($array,$termo){

        foreach ($array as $key => $value) {
            foreach ($value as $k => $v) {
               $resultado[] = DB::table($key)->where($v, 'like', '%'.$termo)->get();
            }
           
        }
        return $resultado; 
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
