<?php

$factory->define(App\SystemSetting::class, function (Faker\Generator $faker) {
    return [
        "code" => $faker->name,
        "description" => $faker->name,
        "value" => $faker->name,
    ];
});
