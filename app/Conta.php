<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    const CONTA_CORRENTE = 'CC';
    const CONTA_POUPANCA = 'CP';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo',
        'nome',
        'saldo',
        'descricao',
        'banco_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['banco'];

    /**
     * Uma conta pertence a um banco.
     *
     * @return \Illuminate\Database\Eloquent\Relation\BelongsTo
     */
    public function banco()
    {
        return $this->belongsTo('App\Banco');
    }

    public function getTipoAttribute($value)
    {
        if ($value == 'CC') {
            return 'Conta corrente';
        } elseif ($value == 'CP') {
            return 'Conta poupança/Investimentos';
        } else {
            return $this->nome . '(Outros)';
        }
    }
}
