<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1562413906ReferralDataFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('referral_data_finals', function (Blueprint $table) {
            if(Schema::hasColumn('referral_data_finals', 'date_time_of_int')) {
                $table->dropColumn('date_time_of_int');
            }
            if(Schema::hasColumn('referral_data_finals', 'executive')) {
                $table->dropColumn('executive');
            }
            if(Schema::hasColumn('referral_data_finals', 'patient_name')) {
                $table->dropColumn('patient_name');
            }
            if(Schema::hasColumn('referral_data_finals', 'date_time_of_reg')) {
                $table->dropColumn('date_time_of_reg');
            }
            if(Schema::hasColumn('referral_data_finals', 'bill_no')) {
                $table->dropColumn('bill_no');
            }
            if(Schema::hasColumn('referral_data_finals', 'admission_time')) {
                $table->dropColumn('admission_time');
            }
            if(Schema::hasColumn('referral_data_finals', 'date_of_discharged')) {
                $table->dropColumn('date_of_discharged');
            }
            if(Schema::hasColumn('referral_data_finals', 'procedure_name')) {
                $table->dropColumn('procedure_name');
            }
            if(Schema::hasColumn('referral_data_finals', 'total_bill_amount')) {
                $table->dropColumn('total_bill_amount');
            }
            if(Schema::hasColumn('referral_data_finals', 'net_amount')) {
                $table->dropColumn('net_amount');
            }
            if(Schema::hasColumn('referral_data_finals', 'treating_consultant')) {
                $table->dropColumn('treating_consultant');
            }
            if(Schema::hasColumn('referral_data_finals', 'department')) {
                $table->dropColumn('department');
            }
            if(Schema::hasColumn('referral_data_finals', 'msg_date_time')) {
                $table->dropColumn('msg_date_time');
            }
            if(Schema::hasColumn('referral_data_finals', 'consumable')) {
                $table->dropColumn('consumable');
            }
            if(Schema::hasColumn('referral_data_finals', 'ward_pharmacy')) {
                $table->dropColumn('ward_pharmacy');
            }
            
        });
Schema::table('referral_data_finals', function (Blueprint $table) {
            
if (!Schema::hasColumn('referral_data_finals', 'doi_as_per_whats_app')) {
                $table->datetime('doi_as_per_whats_app')->nullable();
                }
if (!Schema::hasColumn('referral_data_finals', 'doi_as_per_sw')) {
                $table->datetime('doi_as_per_sw')->nullable();
                }
if (!Schema::hasColumn('referral_data_finals', 'pateint_name_msg')) {
                $table->string('pateint_name_msg')->nullable();
                }
if (!Schema::hasColumn('referral_data_finals', 'avip_name_msg')) {
                $table->string('avip_name_msg')->nullable();
                }
if (!Schema::hasColumn('referral_data_finals', 'approve')) {
                $table->tinyInteger('approve')->nullable()->default('1');
                }
if (!Schema::hasColumn('referral_data_finals', 'status')) {
                $table->enum('status', array('Ok', 'LateIntimation', 'Reject', 'CarryForward', 'RepeatAdmission', 'Other'))->nullable();
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
            $table->dropColumn('doi_as_per_whats_app');
            $table->dropColumn('doi_as_per_sw');
            $table->dropColumn('pateint_name_msg');
            $table->dropColumn('avip_name_msg');
            $table->dropColumn('approve');
            $table->dropColumn('status');
            
        });
Schema::table('referral_data_finals', function (Blueprint $table) {
                        $table->string('date_time_of_int')->nullable();
                $table->string('executive')->nullable();
                $table->string('patient_name')->nullable();
                $table->datetime('date_time_of_reg')->nullable();
                $table->string('bill_no')->nullable();
                $table->datetime('admission_time')->nullable();
                $table->datetime('date_of_discharged')->nullable();
                $table->string('procedure_name')->nullable();
                $table->decimal('total_bill_amount', 15, 2)->nullable();
                $table->decimal('net_amount', 15, 2)->nullable();
                $table->string('treating_consultant')->nullable();
                $table->string('department')->nullable();
                $table->datetime('msg_date_time')->nullable();
                $table->decimal('consumable', 15, 2)->nullable();
                $table->decimal('ward_pharmacy', 15, 2)->nullable();
                
        });

    }
}
