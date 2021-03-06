<?php

namespace App\Http\Requests;

use App\Conta;
use Illuminate\Foundation\Http\FormRequest;

class RequestConta extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * Salva no banco uma nova conta.
     *
     * @return \App\Conta
     */
    public function persists()
    {
        return Conta::forceCreate([
            'user_id'  => auth()->id(),
            'saldo'    => preg_replace('/\D/', '', $this->saldo),
            'banco_id' => $this->banco_id,
            'nome'     => $this->nome,
            'tipo'     => $this->tipo
        ]);
    }

    /**
     * Atualiza uma conta existente.
     *
     * @return \App\Conta
     */
    public function update()
    {
        $conta = Conta::find($this->id);

        $conta->fill([
            'saldo'    => $this->saldo ? preg_replace('/\D/', '', $this->saldo) : 0,
            'banco_id' => $this->banco_id,
            'nome'     => $this->nome
        ]);

        $conta->save();
    }
}
