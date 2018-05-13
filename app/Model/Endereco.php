<?php

namespace App\Model;

use App\Model\Cliente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use SoftDeletes;

    /**
     * Atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'endereco', 'numero', 'complemento',
        'bairro', 'cidade', 'estado',
        'cep', 'tipo',
    ];

    /**
     * Atributos que não são atribuíveis em massa.
     *
     * @var array
     */
    protected $guarded = [
        'cliente_id',
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
     * Obtem o registro de cliente associado ao endereco.
     *
     * @return App\Model\Cliente
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
