<?php

use Illuminate\Database\Seeder;

class IpSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'uhid' => null, 'bill_date' => '', 'ip_no' => null, 'patient_name' => null, 'country' => null, 'state' => null, 'city' => null, 'bill_no' => null, 'customer_name' => null, 'total_service_amount' => '12331312.23', 'tax_amount' => null, 'total_bill_amount' => null, 'tcs_tax' => null, 'discount_amount' => null, 'doctor_name' => null, 'speciality' => null, 'surgical_package_name' => null, 'total_pharmacy_amount' => null, 'pharmacy_amt' => null, 'total_consumables' => null, 'bill_to' => null,],

        ];

        foreach ($items as $item) {
            \App\Ip::create($item);
        }
    }
}
