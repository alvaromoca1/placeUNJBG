<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Restaurantes;
use Faker\Generator as Faker;

$factory->define(Restaurantes::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'direccion' => $faker->word,
        'telefono' => $faker->word,
        'imges' => $faker->text,
        'descripcion' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
