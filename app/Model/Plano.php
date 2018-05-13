<?php

namespace App\Model;

use App\Model\Assinatura;
use App\Model\Atributo;
use App\Model\Pedido;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plano extends Model
{
    use SoftDeletes;

    /**
     * Atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'descricao', 'valor',
        'velocidde', 'ativo',
    ];

    /**
     * Atributos que devem ser transformados em datas.
     *
     * @var array
     */
    protected $dates = [
        'validade', 'deleted_at',
    ];

    /**
     * Obtem os registros de atributos relacionados ao plano.
     *
     * @return App\Model\Atributo
     */
    public function atributos()
    {
        return $this->hasMany(Atributo::class);
    }

    /**
     * Obtem os registros de assinaturas associadas ao plano.
     *
     * @return App\Model\Assinatura
     */
    public function assinaturas()
    {
        return $this->hasMany(Assinatura::class);
    }

    /**
     * Obtem os registro de pedidos associados ao plano.
     *
     * @return App\Model\Pedido
     */
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
