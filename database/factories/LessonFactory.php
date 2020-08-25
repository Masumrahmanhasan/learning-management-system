<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lesson;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Lesson::class, function (Faker $faker) {
    $name = $faker->sentence(8);
    return [
        'title' => $name,
        'slug' => Str::slug($name),
        'short_text' => $faker->paragraph(),
        'full_text' => $faker->text(1000),
        'position' => rand(1, 10),
        'free_lesson' => 1,
        'published' => rand(0, 1),
    ];
});
