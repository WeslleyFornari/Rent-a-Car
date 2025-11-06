<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use RW940cms\Repositories\UserRepository;
use RW940cms\Models\FormContato;
use RW940cms\Validators\UserValidator;

/**
 * Class FormContatoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class FormContatoRepositoryEloquent extends BaseRepository implements FormContatoRepository

{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FormContato::class;
    }
     public function nextPage(){
         $Contatos = $this->model->paginate(10);
         $nextPage = $Contatos->currentPage() + 1;
         if($nextPage > $Contatos->lastPage()){
            $nextPage = $Contatos->currentPage();
         }
        return "?page=".$nextPage;
    }
    public function prevPage(){
         $Contatos = $this->model->paginate(10);

         $prevPage = $Contatos->currentPage() - 1;
         if($prevPage < 1){
            $prevPage = 1;
         }
         return "?page=".$prevPage;
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
