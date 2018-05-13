<?php

namespace App\Model;

use App\Model\Endereco;
use App\Model\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    /**
     * Atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'sobrenome', 'telefone',
        'celular', 'documento', 'nascimento',
    ];

    /**
     * Atributos que não são atribuíveis em massa.
     *
     * @var array
     */
    protected $guarded = [
        'user_id',
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
     * Obtem o registro de usuário associado ao cliente.
     *
     * @return App\Model\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtem os registros de endereços associados ao cliente.
     *
     * @return App\Model\Cliente
     */
    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }
}
