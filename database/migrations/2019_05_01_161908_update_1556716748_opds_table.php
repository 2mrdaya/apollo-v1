<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1556716748OpdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opds', function (Blueprint $table) {
            if(Schema::hasColumn('opds', 'bill_amt')) {
                $table->dropColumn('bill_amt');
            }
            if(Schema::hasColumn('opds', 'discount_amt')) {
                $table->dropColumn('discount_amt');
            }
            if(Schema::hasColumn('opds', 'net_amt')) {
                $table->dropColumn('net_amt');
            }
            
        });
Schema::table('opds', function (Blueprint $table) {
            
if (!Schema::hasColumn('opds', 'bill_amount')) {
                $table->decimal('bill_amount', 15, 2)->nullable();
                }
if (!Schema::hasColumn('opds', 'discount_amount')) {
                $table->decimal('discount_amount', 15, 2)->nullable();
                }
if (!Schema::hasColumn('opds', 'net_amount')) {
                $table->decimal('net_amount', 15, 2)->nullable();
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
        Schema::table('opds', function (Blueprint $table) {
            $table->dropColumn('bill_amount');
            $table->dropColumn('discount_amount');
            $table->dropColumn('net_amount');
            
        });
Schema::table('opds', function (Blueprint $table) {
                        $table->integer('bill_amt')->nullable()->unsigned();
                $table->integer('discount_amt')->nullable();
                $table->integer('net_amt')->nullable()->unsigned();
                
        });

    }
}
