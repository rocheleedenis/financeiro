<?php

use Faker\Generator as Faker;

$factory->define(App\Conta::class, function (Faker $faker) {
    return [
        'tipo'      => 'CC', // conta corrente
        'saldo'     => 0,
        'descricao' => null,
        'user_id'   => function () {
            return create('App\User')->id;
        },
        'banco_id'  => function () {
            return create('App\Banco')->id;
        }
    ];
});
