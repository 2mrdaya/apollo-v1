<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5ceed5699f16aRelationshipsToMessageMappingTable extends Migration
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
                if (!Schema::hasColumn('message_mappings', 'avip_id')) {
                $table->integer('avip_id')->unsigned()->nullable();
                $table->foreign('avip_id', '309584_5ceed5658363c')->references('id')->on('avips')->onDelete('cascade');
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
