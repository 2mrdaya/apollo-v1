<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1562069294PpnPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ppn_payments', function (Blueprint $table) {
            
if (!Schema::hasColumn('ppn_payments', 'on_total_bill')) {
                $table->enum('on_total_bill', array('Yes', 'No'))->nullable();
                }
if (!Schema::hasColumn('ppn_payments', 'type')) {
                $table->enum('type', array('Percentage', 'Fixed'))->nullable();
                }
if (!Schema::hasColumn('ppn_payments', 'remarks')) {
                $table->text('remarks')->nullable();
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
            $table->dropColumn('on_total_bill');
            $table->dropColumn('type');
            $table->dropColumn('remarks');
            
        });

    }
}
