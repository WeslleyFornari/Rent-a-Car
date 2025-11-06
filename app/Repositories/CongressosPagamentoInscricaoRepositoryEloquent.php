<?php

namespace RW940cms\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use RW940cms\Repositories\CongressosPagamentoInscricaoRepository;
use RW940cms\Models\CongressosPagamentoInscricao;
use RW940cms\Validators\CongressosPagamentoInscricaoValidator;

/**
 * Class CongressosPagamentoInscricaoRepositoryEloquent
 * @package namespace RW940cms\Repositories;
 */
class CongressosPagamentoInscricaoRepositoryEloquent extends BaseRepository implements CongressosPagamentoInscricaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */

    protected $fieldSearchable = [
        'name' => 'like',
        'email'=> 'like',
    ];

    public function model()
    {
        return CongressosPagamentoInscricao::class;
    }
    public function valorCongresso($token){
        
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
