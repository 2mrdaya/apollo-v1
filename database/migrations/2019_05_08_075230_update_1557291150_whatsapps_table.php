<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1557291150WhatsappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapps', function (Blueprint $table) {
            
if (!Schema::hasColumn('whatsapps', 'patient_name_msg')) {
                $table->string('patient_name_msg')->nullable();
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
            $table->dropColumn('patient_name_msg');
            
        });

    }
}
