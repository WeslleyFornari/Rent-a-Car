<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
class EspecializacaoAntigoTestamento extends Model
{
    use TransformableTrait;
    protected $table = 'especializacao_antigo_testamento';
    protected $fillable = [
        'user_id',
		"pentateuco",
		"obra_historica_deuteronomista",
		"literatura_historica_primeiro",
		"literatura_sapiencial",
		"literatura_poetica",
		"literatura_profetica",
		"literatura_apocaliptica",
		"literatura_apocrifa",
		"lingua_hebraica_biblica",
		"septuaginta",
		"historia_de_israel_e_oriente_medio_antigo"

];
    public function user(){
        return $this->hasOne(User::class,  'id','user_id');
    }
   
}
