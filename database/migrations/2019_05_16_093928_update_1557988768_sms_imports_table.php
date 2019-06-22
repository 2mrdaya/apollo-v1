<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1557988768SmsImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_imports', function (Blueprint $table) {
            if(Schema::hasColumn('sms_imports', 'patient_name_sms')) {
                $table->dropColumn('patient_name_sms');
            }
            
        });
Schema::table('sms_imports', function (Blueprint $table) {
            
if (!Schema::hasColumn('sms_imports', 'patient_name')) {
                $table->string('patient_name')->nullable();
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
        Schema::table('sms_imports', function (Blueprint $table) {
            $table->dropColumn('patient_name');
            
        });
Schema::table('sms_imports', function (Blueprint $table) {
                        $table->string('patient_name_sms')->nullable();
                
        });

    }
}
