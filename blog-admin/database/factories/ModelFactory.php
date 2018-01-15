<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    //这里需要返回一个数组
    return [
        'article_id' => rand(1, 10),
        'content' => $faker->sentence(3),
        'user_email' => rand(1000000, 99999999) . '@qq.com'
    ];
});
