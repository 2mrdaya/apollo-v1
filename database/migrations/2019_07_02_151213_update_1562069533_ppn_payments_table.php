<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1562069533PpnPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ppn_payments', function (Blueprint $table) {
            
if (!Schema::hasColumn('ppn_payments', 'status')) {
                $table->enum('status', array('Ok', 'Late Intimation', 'Other'))->nullable();
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
        Schema::table('ppn_payments', function (Blueprint $table) {
            $table->dropColumn('status');
            
        });

    }
}
