<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
class EspecializacaoNovoTestamento extends Model
{
    
    use TransformableTrait;
    protected $table = 'especializacao_novo_testamento';
    protected $fillable = [
        'user_id',
		"evangelhos_sinoticos",
		"obra_lucana_lucas_e_atos",
		"literatura_historica_segundo",
		"literatura_joanina_evangelho_e_epistolas",
		"literatura_paulina",
		"literatura_deutero_paulina",
		"cartas_pastorais",
		"literatura_apocaliptica",
		"hebreus",
		"literatura_apocrifa",
		"jesus_historico",
		"historia_das_origens_cristas"

];
    public function user(){
        return $this->hasOne(User::class,  'id','user_id');
    }
}
