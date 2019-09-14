<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1562079877PpnPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ppn_payments', function (Blueprint $table) {
            
if (!Schema::hasColumn('ppn_payments', 'amount')) {
                $table->integer('amount')->nullable()->unsigned();
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
            $table->dropColumn('amount');
            
        });

    }
}
