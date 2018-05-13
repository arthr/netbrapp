<?php

namespace App\Model;

use App\Model\Metodo;
use Illuminate\Database\Eloquent\Model;

class DadosMetodo extends Model
{
    /**
     * Atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'tipo', 'banco', 'agencia',
        'conta', 'cedente', 'juros',
        'juros_taxa', 'parcelas', 'tarifa',
        'debito_automatico', 'recorrente', 'frequencia',
        'descricao', 'observacao', 'token', 'refresh_token',
    ];

    /**
     * Atributos que não são atribuíveis em massa.
     *
     * @var array
     */
    protected $guarded = [
        'metodo_id',
    ];

    /**
     * Obtem o registro de metodo associado ao dado de metodo.
     *
     * @return App\Model\Metodo
     */
    public function metodo()
    {
        return $this->belongsTo(Metodo::class);
    }

}
