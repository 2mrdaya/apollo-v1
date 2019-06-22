<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1559153894MessageMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('message_mappings')) {
            Schema::create('message_mappings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('message')->nullable();
                $table->string('source')->nullable();
                $table->string('patient_name')->nullable();
                $table->string('referrer_name')->nullable();
                $table->datetime('intimation_date_time')->nullable();
                $table->enum('channel', array('WhatsApp', 'Sms', 'Email', 'Other'))->nullable();
                
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
        Schema::dropIfExists('message_mappings');
    }
}
