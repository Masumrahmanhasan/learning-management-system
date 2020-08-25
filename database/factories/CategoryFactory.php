<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->word;
    $icon = [
        'fab fa-accessible-icon',
        'fab fa-accusoft' ,
        'fas fa-address-book' ,
        'far fa-address-card' ,
        'fas fa-adjust',
        'fab fa-adn',
        'fab fa-adversal',
        'fab fa-affiliatetheme' ,
        'fab fa-algolia' ,
        'fas fa-allergies',
        'fab fa-amazon',
        'fab fa-amazon-pay',
        'fas fa-ambulance',

    ];
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'status' => 1,
        'icon' => Arr::random($icon)
    ];
});
