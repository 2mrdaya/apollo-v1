<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1556215212PatientRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('patient_registrations')) {
            Schema::create('patient_registrations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('uhid')->nullable();
                $table->string('patient_name')->nullable();
                $table->datetime('registration_date')->nullable();
                $table->string('county')->nullable();
                $table->string('city')->nullable();
                $table->string('address')->nullable();
                $table->string('mobile')->nullable();
                $table->string('email_id')->nullable();
                $table->string('operator_name')->nullable();
                
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
        Schema::dropIfExists('patient_registrations');
    }
}
