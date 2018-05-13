<?php

namespace App\Model;

use App\Model\Cliente;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $guard_name = 'web';

    /**
     * Atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * Atributos que serão ocultos da Collection.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Obtem o registro de cliente associado ao usuário.
     *
     * @return App\Model\Cliente
     */
    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    /**
     * Verifica se o usuário é um cliente.
     */
    public function isCliente()
    {
        return !is_null($this->cliente);
    }
}
