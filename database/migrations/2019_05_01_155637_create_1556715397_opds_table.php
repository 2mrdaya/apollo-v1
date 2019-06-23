<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1556715397OpdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('opds')) {
            Schema::create('opds', function (Blueprint $table) {
                $table->increments('id');
                $table->datetime('bill_date')->nullable();
                $table->string('bill_no')->nullable();
                $table->string('uhid')->nullable();
                $table->string('patient_number')->nullable();
                $table->string('pname')->nullable();
                $table->string('bill_type')->nullable();
                $table->integer('bill_amt')->nullable()->unsigned();
                $table->integer('discount_amt')->nullable();
                $table->integer('net_amt')->nullable()->unsigned();
                
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
        Schema::dropIfExists('opds');
    }
}
