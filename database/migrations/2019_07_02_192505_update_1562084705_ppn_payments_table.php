<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1562084705PpnPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ppn_payments', function (Blueprint $table) {
            
if (!Schema::hasColumn('ppn_payments', 'eligible_bill_amount')) {
                $table->integer('eligible_bill_amount')->nullable()->unsigned();
                }
if (!Schema::hasColumn('ppn_payments', 'percentage')) {
                $table->double('percentage', 4, 2)->nullable();
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
            $table->dropColumn('eligible_bill_amount');
            $table->dropColumn('percentage');
            
        });

    }
}
