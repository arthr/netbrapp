<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Verifica se o usuário faz parte de um grupo de acesso (Role::class)
     *
     */

    public function hasRole($role)
    {
        foreach ($this->roles as $k => $r) {
            if ($r->name == $role) {
                return true;
            }
        }
        return false;
    }

    /**
     * Retorna o grupo de acesso do usuário (Role::class)
     *
     */
    public function roles()
    {
        return $this->hasManyThrough('App\Models\Acl\Role', 'App\Models\Acl\UserRole', 'user_id', 'id', 'id', 'id');
    }
}
