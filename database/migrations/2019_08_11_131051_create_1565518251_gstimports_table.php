<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1565518251GstimportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('gstimports')) {
            Schema::create('gstimports', function (Blueprint $table) {
                $table->increments('id');
                $table->string('bill_no')->nullable();
                $table->decimal('gst_amout', 15, 2)->nullable();
                $table->string('booking_month')->nullable();
                $table->string('payment_month')->nullable();
                
                $table->timestamps();
                
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
        Schema::dropIfExists('gstimports');
    }
}
