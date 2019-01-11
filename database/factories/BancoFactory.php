<?php

use Faker\Generator as Faker;

$factory->define(App\Banco::class, function (Faker $faker) {
    return [
        'nome'  => $faker->word,
        'logo'  => 'bb.png'
    ];
});
