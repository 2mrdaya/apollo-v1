<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1556716544IpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('ips')) {
            Schema::create('ips', function (Blueprint $table) {
                $table->increments('id');
                $table->string('uhid')->nullable();
                $table->date('bill_date')->nullable();
                $table->string('ip_no')->nullable();
                $table->string('patient_name')->nullable();
                $table->string('country')->nullable();
                $table->string('state')->nullable();
                $table->string('city')->nullable();
                $table->string('bill_no')->nullable();
                $table->string('customer_name')->nullable();
                $table->decimal('total_service_amount', 15, 2)->nullable();
                
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
        Schema::dropIfExists('ips');
    }
}
