<?php

$factory->define(App\Ip::class, function (Faker\Generator $faker) {
    return [
        "uhid" => $faker->name,
        "bill_date" => $faker->date("Y-m-d", $max = 'now'),
        "ip_no" => $faker->name,
        "patient_name" => $faker->name,
        "country" => $faker->name,
        "state" => $faker->name,
        "city" => $faker->name,
        "bill_no" => $faker->name,
        "customer_name" => $faker->name,
        "total_service_amount" => $faker->randomNumber(2),
        "tax_amount" => $faker->randomNumber(2),
        "total_bill_amount" => $faker->randomNumber(2),
        "tcs_tax" => $faker->randomNumber(2),
        "discount_amount" => $faker->randomNumber(2),
        "doctor_name" => $faker->name,
        "speciality" => $faker->name,
        "surgical_package_name" => $faker->name,
        "total_pharmacy_amount" => $faker->randomNumber(2),
        "pharmacy_amt" => $faker->randomNumber(2),
        "total_consumables" => $faker->randomNumber(2),
        "bill_to" => $faker->name,
        "admission_date" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "discharge_date" => $faker->name,
    ];
});
