<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->define(\App\Models\Channel::class, function (Faker $faker) {
    return [
        "title" => $faker->title,
        "description" => "description",
        "urlImage" => $faker->url,
        "titleImage" => $faker->title,
        "linkImage" => $faker->url,
        "pubDate" => $faker->date,
        "generator"=> "generator",
        "link" => $faker->url,
        "userId"=> 1
    ];
});

$factory->define(\App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Item::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'desa' => $faker->url,        
        'desimg' => $faker->url,
        'desplaintext' => $faker->word,
        'pubDate' => $faker->date,
        'link' => $faker->url,
        'guid' => $faker->word,
        'slash' => $faker->word,     
        'channelId'=> 1
    ];
});
