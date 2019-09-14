<?php

$factory->define(App\PpnPayment::class, function (Faker\Generator $faker) {
    return [
        "month" => $faker->name,
        "patientid_id" => factory('App\Ip')->create(),
        "avipid_id" => factory('App\Avip')->create(),
        "mapping_id" => factory('App\MessageMapping')->create(),
        "total_bill" => $faker->randomNumber(2),
        "total_pharmacy" => $faker->randomNumber(2),
        "total_consumable" => $faker->randomNumber(2),
        "rate_details" => $faker->name,
        "on_total_bill" => collect(["Yes","No",])->random(),
        "type" => collect(["Percentage","Fixed",])->random(),
        "eligible_bill_amount" => $faker->randomNumber(2),
        "percentage" => $faker->randomFloat(2, 1, 100),
        "amount" => $faker->randomNumber(2),
        "status" => collect(["Ok","Late Intimation","Other",])->random(),
        "remarks" => $faker->name,
    ];
});
