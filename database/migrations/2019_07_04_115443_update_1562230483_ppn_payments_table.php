<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1562230483PpnPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ppn_payments', function (Blueprint $table) {
            
if (!Schema::hasColumn('ppn_payments', 'total_bill')) {
                $table->decimal('total_bill', 15, 2)->nullable();
                }
if (!Schema::hasColumn('ppn_payments', 'total_pharmacy')) {
                $table->decimal('total_pharmacy', 15, 2)->nullable();
                }
if (!Schema::hasColumn('ppn_payments', 'total_consumable')) {
                $table->decimal('total_consumable', 15, 2)->nullable();
                }
if (!Schema::hasColumn('ppn_payments', 'rate_details')) {
                $table->string('rate_details')->nullable();
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
            $table->dropColumn('total_bill');
            $table->dropColumn('total_pharmacy');
            $table->dropColumn('total_consumable');
            $table->dropColumn('rate_details');
            
        });

    }
}
