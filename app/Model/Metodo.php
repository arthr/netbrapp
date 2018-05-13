<?php

namespace App\Model;

use App\Model\DadosMetodo;
use App\Model\Pagamento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metodo extends Model
{
    use SoftDeletes;

    /**
     * Atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'desconto', 'ativo',
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
     * Obtem os registros de pagamentos associados ao metodo.
     *
     * @return App\Model\Pagamento
     */
    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }

    /**
     * Obtem o registro de dados do metodo associado ao metodo.
     *
     * @return App\Model\DadosMetodo
     */
    public function dados()
    {
        return $this->hasOne(DadosMetodo::class);
    }
}
