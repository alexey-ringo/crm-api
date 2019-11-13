<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $txt = $faker->realText(rand(50, 1000));
    
    $data =  [
        'title' => $title,
        'text' => $txt,
        //'user_id' => (rand(1, 3) == 3) ? 1 : 2,
        'user_id' => rand(1, 3),
    ];
    
    return $data;
});
