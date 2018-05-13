<?php

namespace App\Model;

use App\Model\Metodo;
use App\Model\Pedido;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagamento extends Model
{
    use SoftDeletes;

    /**
     * Atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'valor',
    ];

    /**
     * Atributos que não são atribuíveis em massa.
     *
     * @var array
     */
    protected $guarded = [
        'pedido_id', 'metodo_id',
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
     * Obtem o registro de metodo associado ao pagamento.
     *
     * @return App\Model\Metodo
     */
    public function metodo()
    {
        return $this->belongsTo(Metodo::class);
    }

    /**
     * Obtem o registro de pedido associado ao pagamento.
     *
     * @return App\Model\Pedido
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

}
