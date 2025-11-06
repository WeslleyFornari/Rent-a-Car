<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\TipoMenuRepository;
use RW940cms\Models\TipoMenu;
use RW940cms\Validators\TipoMenuValidator;
use DB;
/**
 * Class TipoMenuRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class TipoMenuRepositoryEloquent extends BaseRepository implements TipoMenuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoMenu::class;
    }

   
   
   
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
