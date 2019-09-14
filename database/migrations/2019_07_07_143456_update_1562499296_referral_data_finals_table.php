<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1562499296ReferralDataFinalsTable extends Migration
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
