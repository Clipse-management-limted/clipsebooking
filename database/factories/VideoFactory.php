<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence,
      'url' => $faker->imageUrl(600,400),
      'post_id' => $faker->numberBetween(1,105),
    ];
});
