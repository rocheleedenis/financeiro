<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContasTest extends TestCase
{
    /**
     * @test
     */
    public function usuario_lista_contas()
    {
        $this->signIn();

        $conta = create('App\Conta', ['user_id' => auth()->id()]);

        $this->get(route('contas.index'))
            ->assertStatus(200)
            ->assertSee($conta->nome);
    }

    /**
     * @test
     */
    public function usuario_cadastra_conta()
    {
        $this->signIn();

        $conta = make('App\Conta');

        $this->postJson(route('contas.store'), $conta->toArray())
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function usuario_edita_conta()
    {
        $this->signIn();

        $conta = create('App\Conta');

        $conta->saldo = 'R$ 10,00';

        $this->patchJson(route('contas.update', $conta), $conta->toArray())
            ->assertStatus(200);

        $this->assertEquals('1000', $conta->fresh()->saldo);
    }
}
