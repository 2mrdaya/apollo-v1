<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1562567775ReferralDataFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('referral_data_finals', function (Blueprint $table) {
            if(Schema::hasColumn('referral_data_finals', 'message')) {
                $table->dropColumn('message');
            }
            
        });
Schema::table('referral_data_finals', function (Blueprint $table) {
            
if (!Schema::hasColumn('referral_data_finals', 'msg_desc')) {
                $table->string('msg_desc')->nullable();
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
            $table->dropColumn('msg_desc');
            
        });
Schema::table('referral_data_finals', function (Blueprint $table) {
                        $table->string('message')->nullable();
                
        });

    }
}
