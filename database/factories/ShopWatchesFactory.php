<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\ShopWatches::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    $description = $faker->text(500);
    $producer = $faker->word();
    $createdAt = $faker->dateTimeBetween('-2 months',
    '-1 days');
    
    $data = [
        'category_id' => rand(1,6),
        'title' => $title,
        'slug' => Str::slug($title),
        'description' => $description,
        'producer' => $producer,
        'image_URI' => (rand(0, 1) == 1 ? 'images\w1.jpg' : 'images\w2.jpg'),
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
    return $data;
});
