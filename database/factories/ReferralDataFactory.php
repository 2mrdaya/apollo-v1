<?php

$factory->define(App\ReferralData::class, function (Faker\Generator $faker) {
    return [
        "month" => $faker->name,
        "date_time_of_int" => $faker->name,
        "executive" => $faker->name,
        "area" => $faker->name,
        "patient_name" => $faker->name,
        "uhid" => $faker->name,
        "date_time_of_reg" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "ip_no" => $faker->name,
        "bill_no" => $faker->name,
        "admission_time" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "date_of_discharged" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "procedure_name" => $faker->name,
        "dr_name_aic" => $faker->name,
        "total_bill_amount" => $faker->randomNumber(2),
        "net_amount" => $faker->randomNumber(2),
        "aic_fee" => $faker->randomNumber(2),
        "fee_percent" => $faker->randomNumber(2),
        "treating_consultant" => $faker->name,
        "department" => $faker->name,
        "pan_no" => $faker->name,
        "remarks" => $faker->name,
        "message" => $faker->name,
        "msg_date_time" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "consumable" => $faker->randomNumber(2),
        "ward_pharmacy" => $faker->randomNumber(2),
    ];
});
