<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1565519637IpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ips', function (Blueprint $table) {
            
if (!Schema::hasColumn('ips', 'admission_date')) {
                $table->datetime('admission_date')->nullable();
                }
if (!Schema::hasColumn('ips', 'discharge_date')) {
                $table->string('discharge_date')->nullable();
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
        Schema::table('ips', function (Blueprint $table) {
            $table->dropColumn('admission_date');
            $table->dropColumn('discharge_date');
            
        });

    }
}
