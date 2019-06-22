<?php

$factory->define(App\PatientRegistration::class, function (Faker\Generator $faker) {
    return [
        "uhid" => $faker->name,
        "patient_name" => $faker->name,
        "registration_date" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "city" => $faker->name,
        "country" => $faker->name,
        "address" => $faker->name,
        "mobile" => $faker->name,
        "email_id" => $faker->name,
        "operator_name" => $faker->name,
    ];
});
