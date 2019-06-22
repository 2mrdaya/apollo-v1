<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5cdd05a3e47f3RelationshipsToSmsImportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_imports', function(Blueprint $table) {
            if (!Schema::hasColumn('sms_imports', 'uhid_id')) {
                $table->integer('uhid_id')->unsigned()->nullable();
                $table->foreign('uhid_id', '297012_5cc58d048619e')->references('id')->on('patient_registrations')->onDelete('cascade');
                }
                if (!Schema::hasColumn('sms_imports', 'avid_id')) {
                $table->integer('avid_id')->unsigned()->nullable();
                $table->foreign('avid_id', '297012_5cdd05a0e0cf0')->references('id')->on('avips')->onDelete('cascade');
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
        Schema::table('sms_imports', function(Blueprint $table) {
            
        });
    }
}
