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
        'post_status'=> $faker->boolean,
        'post_type' => 'article',
        'image' => $faker->image(),
    ];
});
