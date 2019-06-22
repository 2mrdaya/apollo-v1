<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1559155305EmailImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('email_imports')) {
            Schema::create('email_imports', function (Blueprint $table) {
                $table->increments('id');
                $table->string('source')->nullable();
                $table->string('message')->nullable();
                $table->datetime('intimation_date_time')->nullable();
                $table->string('patient_name')->nullable();
                $table->string('referrer_name')->nullable();
                
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
        Schema::dropIfExists('email_imports');
    }
}
