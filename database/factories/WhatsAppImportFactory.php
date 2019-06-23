<?php

$factory->define(App\WhatsAppImport::class, function (Faker\Generator $faker) {
    return [
        "source" => $faker->name,
        "message" => $faker->name,
        "intimation_date_time" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "patient_name" => $faker->name,
        "referrer_name" => $faker->name,
    ];
});
