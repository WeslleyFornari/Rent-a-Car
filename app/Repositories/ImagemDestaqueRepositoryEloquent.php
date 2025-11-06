<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\ImagemDestaqueRepository;
use RW940cms\Models\ImagemDestaque;
use RW940cms\Validators\ImagemDestaqueValidator;
use DB;
/**
 * Class ImagemDestaqueRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class ImagemDestaqueRepositoryEloquent extends BaseRepository implements ImagemDestaqueRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(){
        return ImagemDestaque::class;
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function updateWhere($col,$val, $data){

        DB::table('img_destaques')->where($col, $val) ->update($data);
    }
    public function delWhere($col,$id){
        
        DB::table('img_destaques')->where($col, $id)->delete();
    }
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
