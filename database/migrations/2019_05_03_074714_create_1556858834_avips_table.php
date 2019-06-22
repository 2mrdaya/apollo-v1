<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1556858834AvipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('avips')) {
            Schema::create('avips', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('address_1')->nullable();
                $table->string('address_2')->nullable();
                $table->string('bank_name')->nullable();
                $table->string('bank_address')->nullable();
                $table->string('account_no')->nullable();
                $table->string('swift_code')->nullable();
                $table->string('iban_number')->nullable();
                $table->string('bank_code')->nullable();
                $table->string('correspondence_bank_name')->nullable();
                $table->string('correspondence_ac_no')->nullable();
                $table->string('corp_swift_code')->nullable();
                $table->string('ifsc_code')->nullable();
                $table->string('pan_number')->nullable();
                $table->string('oracle_code')->nullable();
                $table->string('rate_details')->nullable();
                $table->string('state')->nullable();
                $table->integer('pin_code')->nullable()->unsigned();
                
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
        Schema::dropIfExists('avips');
    }
}
