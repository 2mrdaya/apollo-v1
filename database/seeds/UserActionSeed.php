<?php

use Illuminate\Database\Seeder;

class UserActionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'user_id' => 1, 'action' => 'created', 'action_model' => 'sms_imports', 'action_id' => 1,],
            ['id' => 2, 'user_id' => 1, 'action' => 'created', 'action_model' => 'patient_registrations', 'action_id' => 1,],
            ['id' => 3, 'user_id' => 1, 'action' => 'created', 'action_model' => 'tests', 'action_id' => 2,],
            ['id' => 4, 'user_id' => 1, 'action' => 'created', 'action_model' => 'tests', 'action_id' => 3,],
            ['id' => 5, 'user_id' => 1, 'action' => 'created', 'action_model' => 'tests', 'action_id' => 4,],
            ['id' => 6, 'user_id' => 1, 'action' => 'created', 'action_model' => 'sms_imports', 'action_id' => 2,],
            ['id' => 7, 'user_id' => 1, 'action' => 'updated', 'action_model' => 'patient_registrations', 'action_id' => 1,],
            ['id' => 8, 'user_id' => 1, 'action' => 'created', 'action_model' => 'ips', 'action_id' => 1,],
            ['id' => 9, 'user_id' => 1, 'action' => 'created', 'action_model' => 'system_settings', 'action_id' => 1,],

        ];

        foreach ($items as $item) {
            \App\UserAction::create($item);
        }
    }
}
