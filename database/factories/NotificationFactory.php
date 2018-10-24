<?php

use App\Model\Notice;
use Faker\Generator as Faker;

$factory->define(Notice::class, function (Faker $faker) {
    return [
        'title'=>$faker->text(50),
        'category'=>$faker->text(10),
        'notification'=>$faker->text(250)
    ];
});
