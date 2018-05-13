<?php

namespace App\Model;

use App\Model\Cliente;
use App\Model\Pedido;
use App\Model\Plano;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assinatura extends Model
{
    use SoftDeletes;

    /**
     * Atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'inicio', 'final', 'ativo', 'inicio', 'final',
    ];

    /**
     * Atributos que não são atribuíveis em massa.
     *
     * @var array
     */
    protected $guarded = [
        'cliente_id', 'plano_id', 'pedido_id',
    ];

    /**
     * Atributos que devem ser transformados em datas.
     *
     * @var array
     */
    protected $dates = [
        'inicio', 'final', 'deleted_at',
    ];

    /**
     * Obtem o registro de cliente associado a assinatura.
     *
     * @return App\Model\Cliente
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Obtem o registro de pedido associado a assinatura.
     *
     * @return App\Model\Pedido
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    /**
     * Obtem o registro de plano associado a assinatura.
     *
     * @return App\Model\Plano
     */
    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }
}
