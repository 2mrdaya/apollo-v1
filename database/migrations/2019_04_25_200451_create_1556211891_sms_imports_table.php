<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1556211891SmsImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('sms_imports')) {
            Schema::create('sms_imports', function (Blueprint $table) {
                $table->increments('id');
                $table->string('message')->nullable();
                $table->string('mobile')->nullable();
                $table->date('msg_date_time')->nullable();
                
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
        Schema::dropIfExists('sms_imports');
    }
}
