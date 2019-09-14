<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1562567162ReferralDataFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('referral_data_finals', function (Blueprint $table) {
            if(Schema::hasColumn('referral_data_finals', 'message_id')) {
                $table->dropForeign('312494_5d208b52e9c39');
                $table->dropIndex('312494_5d208b52e9c39');
                $table->dropColumn('message_id');
            }
            if(Schema::hasColumn('referral_data_finals', 'patient_id')) {
                $table->dropForeign('312494_5d208b52c78eb');
                $table->dropIndex('312494_5d208b52c78eb');
                $table->dropColumn('patient_id');
            }
            if(Schema::hasColumn('referral_data_finals', 'avip_id')) {
                $table->dropForeign('312494_5d208b53135c0');
                $table->dropIndex('312494_5d208b53135c0');
                $table->dropColumn('avip_id');
            }
            if(Schema::hasColumn('referral_data_finals', 'ip_id')) {
                $table->dropForeign('312494_5d208b533517c');
                $table->dropIndex('312494_5d208b533517c');
                $table->dropColumn('ip_id');
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
        Schema::table('referral_data_finals', function (Blueprint $table) {
                        
        });

    }
}
