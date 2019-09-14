<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d208b5767d9cRelationshipsToReferralDataFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('referral_data_finals', function(Blueprint $table) {
            if (!Schema::hasColumn('referral_data_finals', 'patient_id')) {
                $table->integer('patient_id')->unsigned()->nullable();
                $table->foreign('patient_id', '312494_5d208b52c78eb')->references('id')->on('patient_registrations')->onDelete('cascade');
                }
                if (!Schema::hasColumn('referral_data_finals', 'message_id')) {
                $table->integer('message_id')->unsigned()->nullable();
                $table->foreign('message_id', '312494_5d208b52e9c39')->references('id')->on('message_mappings')->onDelete('cascade');
                }
                if (!Schema::hasColumn('referral_data_finals', 'avip_id')) {
                $table->integer('avip_id')->unsigned()->nullable();
                $table->foreign('avip_id', '312494_5d208b53135c0')->references('id')->on('avips')->onDelete('cascade');
                }
                if (!Schema::hasColumn('referral_data_finals', 'ip_id')) {
                $table->integer('ip_id')->unsigned()->nullable();
                $table->foreign('ip_id', '312494_5d208b533517c')->references('id')->on('ips')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('referral_data_finals', function(Blueprint $table) {
            
        });
    }
}
