<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d11c26bb233cRelationshipsToPpnPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ppn_payments', function(Blueprint $table) {
            if (!Schema::hasColumn('ppn_payments', 'patientid_id')) {
                $table->integer('patientid_id')->unsigned()->nullable();
                $table->foreign('patientid_id', '318298_5d11c26743919')->references('id')->on('ips')->onDelete('cascade');
                }
                if (!Schema::hasColumn('ppn_payments', 'avipid_id')) {
                $table->integer('avipid_id')->unsigned()->nullable();
                $table->foreign('avipid_id', '318298_5d11c267665d1')->references('id')->on('avips')->onDelete('cascade');
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
        Schema::table('ppn_payments', function(Blueprint $table) {
            
        });
    }
}
