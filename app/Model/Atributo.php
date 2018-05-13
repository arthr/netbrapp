<?php

namespace App\Model;

use App\Model\Plano;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atributo extends Model
{
    use SoftDeletes;
    
    /**
     * Atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'descricao', 'ativo',
    ];

    /**
     * Atributos que não são atribuíveis em massa.
     *
     * @var array
     */
    protected $guarded = [
        'plano_id',
    ];

    /**
     * Atributos que devem ser transformados em datas.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * Obtem o registro de plano associado ao atributo.
     * 
     * @return App\Model\Plano
     */
    public function plano() {
        return $this->belongsTo(Plano::class);
    }
}
