<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1556717137IpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ips', function (Blueprint $table) {
            
if (!Schema::hasColumn('ips', 'tax_amount')) {
                $table->decimal('tax_amount', 15, 2)->nullable();
                }
if (!Schema::hasColumn('ips', 'total_bill_amount')) {
                $table->decimal('total_bill_amount', 15, 2)->nullable();
                }
if (!Schema::hasColumn('ips', 'tcs_tax')) {
                $table->decimal('tcs_tax', 15, 2)->nullable();
                }
if (!Schema::hasColumn('ips', 'discount_amount')) {
                $table->decimal('discount_amount', 15, 2)->nullable();
                }
if (!Schema::hasColumn('ips', 'doctor_name')) {
                $table->string('doctor_name')->nullable();
                }
if (!Schema::hasColumn('ips', 'speciality')) {
                $table->string('speciality')->nullable();
                }
if (!Schema::hasColumn('ips', 'surgical_package_name')) {
                $table->string('surgical_package_name')->nullable();
                }
if (!Schema::hasColumn('ips', 'total_pharmacy_amount')) {
                $table->decimal('total_pharmacy_amount', 15, 2)->nullable();
                }
if (!Schema::hasColumn('ips', 'pharmacy_amt')) {
                $table->decimal('pharmacy_amt', 15, 2)->nullable();
                }
if (!Schema::hasColumn('ips', 'total_consumables')) {
                $table->decimal('total_consumables', 15, 2)->nullable();
                }
if (!Schema::hasColumn('ips', 'bill_to')) {
                $table->string('bill_to')->nullable();
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
        Schema::table('ips', function (Blueprint $table) {
            $table->dropColumn('tax_amount');
            $table->dropColumn('total_bill_amount');
            $table->dropColumn('tcs_tax');
            $table->dropColumn('discount_amount');
            $table->dropColumn('doctor_name');
            $table->dropColumn('speciality');
            $table->dropColumn('surgical_package_name');
            $table->dropColumn('total_pharmacy_amount');
            $table->dropColumn('pharmacy_amt');
            $table->dropColumn('total_consumables');
            $table->dropColumn('bill_to');
            
        });

    }
}
