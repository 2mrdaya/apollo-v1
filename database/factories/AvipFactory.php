<?php

$factory->define(App\Avip::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "address_1" => $faker->name,
        "address_2" => $faker->name,
        "bank_name" => $faker->name,
        "bank_address" => $faker->name,
        "account_no" => $faker->name,
        "swift_code" => $faker->name,
        "iban_number" => $faker->name,
        "bank_code" => $faker->name,
        "correspondence_bank_name" => $faker->name,
        "correspondence_ac_no" => $faker->name,
        "corp_swift_code" => $faker->name,
        "ifsc_code" => $faker->name,
        "pan_number" => $faker->name,
        "oracle_code" => $faker->name,
        "rate_details" => $faker->name,
        "state" => $faker->name,
        "pin_code" => $faker->randomNumber(2),
    ];
});
