<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DadosMetodo extends Model
{
    /**
     * The attributes that are mass assignable.
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
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'metodo_id',
    ];

}
