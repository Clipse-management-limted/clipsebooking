<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
      'description' => $faker->sentence,
      'url' => $faker->imageUrl(600,400),
      'post_id' => $faker->numberBetween(1,105),
      'featured' => $faker->randomElement([true,false]),
    ];
});
