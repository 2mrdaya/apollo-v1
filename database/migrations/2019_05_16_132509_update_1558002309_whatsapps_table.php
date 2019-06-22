<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1558002309WhatsappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapps', function (Blueprint $table) {
            if(Schema::hasColumn('whatsapps', 'patient_name_msg')) {
                $table->dropColumn('patient_name_msg');
            }
            
        });
Schema::table('whatsapps', function (Blueprint $table) {
            
if (!Schema::hasColumn('whatsapps', 'patient_name')) {
                $table->string('patient_name')->nullable();
                }
if (!Schema::hasColumn('whatsapps', 'doctor_name')) {
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
        Schema::table('whatsapps', function (Blueprint $table) {
            $table->dropColumn('patient_name');
            $table->dropColumn('doctor_name');
            
        });
Schema::table('whatsapps', function (Blueprint $table) {
                        $table->string('patient_name_msg')->nullable();
                
        });

    }
}
