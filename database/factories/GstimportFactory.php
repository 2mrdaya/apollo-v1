<?php

$factory->define(App\Gstimport::class, function (Faker\Generator $faker) {
    return [
        "bill_no" => $faker->name,
        "gst_amout" => $faker->randomNumber(2),
        "booking_month" => $faker->name,
        "payment_month" => $faker->name,
    ];
});
