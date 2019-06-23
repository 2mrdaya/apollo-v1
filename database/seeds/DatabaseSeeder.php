<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(IpSeed::class);
        $this->call(PatientRegistrationSeed::class);
        $this->call(RoleSeed::class);
        $this->call(SmsImportSeed::class);
        $this->call(SystemSettingSeed::class);
        $this->call(UserSeed::class);
        $this->call(UserActionSeed::class);
        $this->call(TestSeedPivot::class);

    }
}
