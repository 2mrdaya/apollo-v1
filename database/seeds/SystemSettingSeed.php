<?php

use Illuminate\Database\Seeder;

class SystemSettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'code' => 'PATIENT_SEARCH_DAYS', 'description' => 'PATIENT_SEARCH_DAYS', 'value' => '10',],

        ];

        foreach ($items as $item) {
            \App\SystemSetting::create($item);
        }
    }
}
