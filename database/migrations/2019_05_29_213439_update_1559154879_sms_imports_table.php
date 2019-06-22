<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1559154879SmsImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_imports', function (Blueprint $table) {
            if(Schema::hasColumn('sms_imports', 'message')) {
                $table->dropColumn('message');
            }
            if(Schema::hasColumn('sms_imports', 'mobile')) {
                $table->dropColumn('mobile');
            }
            if(Schema::hasColumn('sms_imports', 'doctor_name')) {
                $table->dropColumn('doctor_name');
            }
            if(Schema::hasColumn('sms_imports', 'sms_date_time')) {
                $table->dropColumn('sms_date_time');
            }
            if(Schema::hasColumn('sms_imports', 'uhid_id')) {
                $table->dropForeign('297012_5cc58d048619e');
                $table->dropIndex('297012_5cc58d048619e');
                $table->dropColumn('uhid_id');
            }
            if(Schema::hasColumn('sms_imports', 'avid_id')) {
                $table->dropForeign('297012_5cdd05a0e0cf0');
                $table->dropIndex('297012_5cdd05a0e0cf0');
                $table->dropColumn('avid_id');
            }
            
        });
Schema::table('sms_imports', function (Blueprint $table) {
            
if (!Schema::hasColumn('sms_imports', 'source')) {
                $table->string('source')->nullable();
                }
if (!Schema::hasColumn('sms_imports', 'message')) {
                $table->string('message')->nullable();
                }
if (!Schema::hasColumn('sms_imports', 'intimation_date_time')) {
                $table->datetime('intimation_date_time')->nullable();
                }
if (!Schema::hasColumn('sms_imports', 'referrer_name')) {
                $table->string('referrer_name')->nullable();
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
            $table->dropColumn('source');
            $table->dropColumn('message');
            $table->dropColumn('intimation_date_time');
            $table->dropColumn('referrer_name');
            
        });
Schema::table('sms_imports', function (Blueprint $table) {
                        $table->string('message')->nullable();
                $table->string('mobile')->nullable();
                $table->string('doctor_name')->nullable();
                $table->datetime('sms_date_time')->nullable();
                
        });

    }
}
