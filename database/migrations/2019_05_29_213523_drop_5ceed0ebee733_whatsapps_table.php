<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5ceed0ebee733WhatsappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('whatsapps');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('whatsapps')) {
            Schema::create('whatsapps', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name_mobile')->nullable();
                $table->string('message')->nullable();
                $table->string('mobile')->nullable();
                $table->datetime('date_time')->nullable();
                $table->string('patient_name')->nullable();
                $table->string('doctor_name')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

            $table->index(['deleted_at']);
            });
        }
    }
}
