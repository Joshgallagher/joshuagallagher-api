<?php

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => $password ?: $password = app('hash')->make('secret'),
    ];
});

$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
    $title = $faker->sentence(rand(4, 6));
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'slug' => str_slug($title),
        'title' => $title,
        'teaser' => $faker->paragraph(rand(2, 4)),
        'body' => $faker->text(rand(200, 400)),
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
    ];
});
