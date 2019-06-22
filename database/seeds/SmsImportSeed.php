<?php

use Illuminate\Database\Seeder;

class SmsImportSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'source' => null, 'message' => null, 'intimation_date_time' => '', 'patient_name' => null, 'referrer_name' => null,],
            ['id' => 2, 'source' => null, 'message' => null, 'intimation_date_time' => '', 'patient_name' => null, 'referrer_name' => null,],

        ];

        foreach ($items as $item) {
            \App\SmsImport::create($item);
        }
    }
}
