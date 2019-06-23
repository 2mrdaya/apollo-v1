<?php

use Illuminate\Database\Seeder;

class PatientRegistrationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'uhid' => '12321', 'patient_name' => 'safasdf', 'registration_date' => '2019-04-24 13:30:55', 'city' => null, 'country' => null, 'address' => null, 'mobile' => null, 'email_id' => null, 'operator_name' => null,],

        ];

        foreach ($items as $item) {
            \App\PatientRegistration::create($item);
        }
    }
}
