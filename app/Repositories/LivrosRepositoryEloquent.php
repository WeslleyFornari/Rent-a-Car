<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\LivrosRepository;
use RW940cms\Models\Livros;
use RW940cms\Validators\LivrosValidator;
use DB;
/**
 * Class LivrosRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class LivrosRepositoryEloquent extends BaseRepository implements LivrosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $fieldSearchable = [
        'titulo_livro' => 'like',
        'introducao_livro'=> 'like',
    ];

    public function model()
    {
        return Livros::class;
    }

     public function updateWhere($col,$val, $data){

        DB::table('livros')->where($col, $val)->update($data);
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
