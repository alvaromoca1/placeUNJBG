<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Discotecas;
use Faker\Generator as Faker;

$factory->define(Discotecas::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'direccion' => $faker->word,
        'telefono' => $faker->word,
        'descripcion' => $faker->word,
        'images' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
