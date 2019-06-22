<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1557117424ReferralDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('referral_datas')) {
            Schema::create('referral_datas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('month')->nullable();
                $table->string('date_time_of_int')->nullable();
                $table->string('executive')->nullable();
                $table->string('area')->nullable();
                $table->string('patient_name')->nullable();
                $table->string('uhid')->nullable();
                $table->datetime('date_time_of_reg')->nullable();
                $table->string('ip_no')->nullable();
                $table->string('bill_no')->nullable();
                $table->datetime('admission_time')->nullable();
                $table->datetime('date_of_discharged')->nullable();
                $table->string('procedure_name')->nullable();
                $table->string('dr_name_aic')->nullable();
                $table->decimal('total_bill_amount', 15, 2)->nullable();
                $table->decimal('net_amount', 15, 2)->nullable();
                $table->decimal('aic_fee', 15, 2)->nullable();
                $table->decimal('fee_percent', 15, 2)->nullable();
                $table->string('treating_consultant')->nullable();
                $table->string('department')->nullable();
                $table->string('pan_no')->nullable();
                $table->string('remarks')->nullable();
                $table->string('message')->nullable();
                $table->datetime('msg_date_time')->nullable();
                $table->decimal('consumable', 15, 2)->nullable();
                $table->decimal('ward_pharmacy', 15, 2)->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral_datas');
    }
}
