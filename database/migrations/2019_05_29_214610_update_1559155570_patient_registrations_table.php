<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1559155570PatientRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_registrations', function (Blueprint $table) {
            if(Schema::hasColumn('patient_registrations', 'county')) {
                $table->dropColumn('county');
            }
            
        });
Schema::table('patient_registrations', function (Blueprint $table) {
            
if (!Schema::hasColumn('patient_registrations', 'country')) {
                $table->string('country')->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_registrations', function (Blueprint $table) {
            $table->dropColumn('country');
            
        });
Schema::table('patient_registrations', function (Blueprint $table) {
                        $table->string('county')->nullable();
                
        });

    }
}
