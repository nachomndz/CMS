<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Microcontenido;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Microcontenido::class, function (Faker $faker) {
    return [
        
        /*'tipo' => $faker->name,
        'titulo' => $faker->sentence(2, true),
        'subtitulo' => $faker->sentence(4, true),
        'texto' =>  $faker->text(200),//->mobileFormats, 
        'autor'=> $faker->numberBetween(1, 3),
        'comienza' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'caduca' => Str::random(10),

*/
    ];
});
