<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5ccbbed205538RelationshipsToWhatsappTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapps', function(Blueprint $table) {
            if (!Schema::hasColumn('whatsapps', 'uhid_id')) {
                $table->integer('uhid_id')->unsigned()->nullable();
                $table->foreign('uhid_id', '300011_5ccbbece29ad9')->references('id')->on('patient_registrations')->onDelete('cascade');
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
        Schema::table('whatsapps', function(Blueprint $table) {
            
        });
    }
}
