<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        //
        'user_id' => $faker->randomElement($users),
        'post_content' => $faker->paragraph(),
        'post_title' => $faker->sentence(),
        'post_status'=> 'publish',
        'post_name' => $faker->word(),
        'post_type' => 'article',
        'post_category'=> $faker->word(),
    ];
});
