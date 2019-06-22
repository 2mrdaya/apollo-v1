<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5ceecdc0bfc18RelationshipsToMessageMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('message_mappings', function(Blueprint $table) {
            if (!Schema::hasColumn('message_mappings', 'uhid_id')) {
                $table->integer('uhid_id')->unsigned()->nullable();
                $table->foreign('uhid_id', '309584_5ceecceb470b6')->references('id')->on('patient_registrations')->onDelete('cascade');
                }
                if (!Schema::hasColumn('message_mappings', 'avid_id')) {
                $table->integer('avid_id')->unsigned()->nullable();
                $table->foreign('avid_id', '309584_5ceecceb67f69')->references('id')->on('avips')->onDelete('cascade');
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
        Schema::table('message_mappings', function(Blueprint $table) {
            
        });
    }
}
