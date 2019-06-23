<?php

$factory->define(App\Opd::class, function (Faker\Generator $faker) {
    return [
        "bill_date" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "bill_no" => $faker->name,
        "uhid" => $faker->name,
        "patient_number" => $faker->name,
        "pname" => $faker->name,
        "bill_type" => $faker->name,
        "bill_amount" => $faker->randomNumber(2),
        "discount_amount" => $faker->randomNumber(2),
        "net_amount" => $faker->randomNumber(2),
    ];
});
