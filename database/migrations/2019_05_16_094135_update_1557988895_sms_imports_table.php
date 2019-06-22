<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1557988895SmsImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_imports', function (Blueprint $table) {
            
if (!Schema::hasColumn('sms_imports', 'doctor_name')) {
                $table->string('doctor_name')->nullable();
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
            $table->dropColumn('doctor_name');
            
        });

    }
}
