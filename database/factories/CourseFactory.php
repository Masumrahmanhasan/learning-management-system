<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

$factory->define(Course::class, function (Faker $faker) {
    $name = $faker->sentence(5);
    $placeholder = ['placeholder-1.jpg','placeholder-2.jpg','placeholder-3.jpg'];
    return [
        'title' => $name,
        'category_id' => rand(1,10),
        'slug' => Str::slug($name),
        'course_image' =>$placeholder[rand(0,2)],
        'description' => $faker->text(200),
        'price' => $faker->randomFloat(2, 0, 199),
        'featured' => Arr::random([0,1]),
        'trending' => Arr::random([0,1]),
        'popular' => Arr::random([0,1]),
        'published' => 1,
    ];
});
