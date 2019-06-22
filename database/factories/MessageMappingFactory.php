<?php

$factory->define(App\MessageMapping::class, function (Faker\Generator $faker) {
    return [
        "channel" => collect(["WhatsApp","Sms","Email","Other",])->random(),
        "message" => $faker->name,
        "source" => $faker->name,
        "patient_name" => $faker->name,
        "referrer_name" => $faker->name,
        "intimation_date_time" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "uhid_id" => factory('App\PatientRegistration')->create(),
        "avip_id" => factory('App\Avip')->create(),
    ];
});
