<?php

$factory->define(App\ReferralDataFinal::class, function (Faker\Generator $faker) {
    return [
        "month" => $faker->name,
        "msg_desc" => $faker->name,
        "doi_as_per_whats_app" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "doi_as_per_sw" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "area" => $faker->name,
        "uhid" => $faker->name,
        "ip_no" => $faker->name,
        "dr_name_aic" => $faker->name,
        "fee_percent" => $faker->randomNumber(2),
        "aic_fee" => $faker->randomNumber(2),
        "pan_no" => $faker->name,
        "pateint_name_msg" => $faker->name,
        "avip_name_msg" => $faker->name,
        "remarks" => $faker->name,
        "approve" => 1,
        "status" => collect(["Ok","LateIntimation","Reject","CarryForward","RepeatAdmission","Other",])->random(),
        "ip_id" => factory('App\Ip')->create(),
        "message_id" => factory('App\MessageMapping')->create(),
        "patient_id" => factory('App\PatientRegistration')->create(),
        "avip_id" => factory('App\Avip')->create(),
    ];
});
