<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1556212076SmsImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_imports', function (Blueprint $table) {
            if(Schema::hasColumn('sms_imports', 'msg_date_time')) {
                $table->dropColumn('msg_date_time');
            }
            
        });
Schema::table('sms_imports', function (Blueprint $table) {
            
if (!Schema::hasColumn('sms_imports', 'sms_date_time')) {
                $table->datetime('sms_date_time')->nullable();
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
        Schema::table('sms_imports', function (Blueprint $table) {
            $table->dropColumn('sms_date_time');
            
        });
Schema::table('sms_imports', function (Blueprint $table) {
                        $table->date('msg_date_time')->nullable();
                
        });

    }
}
