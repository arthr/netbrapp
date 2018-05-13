<?php

namespace App\Model;

use App\Model\Assinatura;
use App\Model\Cliente;
use App\Model\Pagamento;
use App\Model\Plano;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

    /**
     * Atributos que não são atribuíveis em massa.
     *
     * @var array
     */
    protected $guarded = [
        'cliente_id', 'plano_id',
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
     * Obtem o registro de assinatura associado ao pedido.
     *
     * @return App\Model\Assinatura
     */
    public function assinatura()
    {
        return $this->hasOne(Assinatura::class);
    }

    /**
     * Obtem o registro de cliente associado ao pedido.
     *
     * @return App\Model\Cliente
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Obtem o registro de pagamento associado ao pedido.
     *
     * @return App\Model\Pagamento
     */
    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }

    /**
     * Obtem o registro de plano associado ao pedido.
     *
     * @return App\Model\Plano
     */
    public function plano()
    {
        return $this->belongsTo('plano');
    }

}
