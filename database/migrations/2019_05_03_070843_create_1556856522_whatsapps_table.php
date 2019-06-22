<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1556856522WhatsappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('whatsapps')) {
            Schema::create('whatsapps', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name_mobile')->nullable();
                $table->string('message')->nullable();
                $table->string('mobile')->nullable();
                $table->datetime('date_time')->nullable();
                
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
        Schema::dropIfExists('whatsapps');
    }
}
